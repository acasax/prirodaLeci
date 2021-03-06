$(document).ready(function() {

    $('#add_button').click(function() {
        $('#order_form')[0].reset();
        $('.modal-title').text("Insert");
        $('#image').val("");
        $('#imagelabel').text("");
        $('#txt_text').text("");
        $('#action').val("Dodaj");
        $('#operation').val("Dodaj");
    });

    let dataTable = $('#order_data').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "order": [],
        "ajax": {
            url: "product_func/order_function.php",
            type: "POST"
        },
        "columnDefs": [{
            "targets": [0, 3, 4],
            "orderable": true,
        }, ],
        "lengthMenu": [5, 10, 15, 20],
        "language": {
            "lengthMenu": "Prikaži _MENU_ narudžbina",
            "zeroRecords": "Nema narudžbina",
            "info": "Prikaži stranu _PAGE_ od _PAGES_",
            "infoEmpty": "Nema dostupnih podataka",
            "infoFiltered": "(Show _MAX_ of all image)",
            "loadingRecords": "Učitavanje...",
            "processing": "Obrada",
            "search": "Pretraga:",
            "paginate": {
                "first": "Prva",
                "last": "Poslednja",
                "next": ">",
                "previous": "<"
            },
        },

    });

    const $orderForm = $('#order_form')
    let validator = void(0)

    if ($orderForm.length) {
        validator = $orderForm.validate({
            rules: {
                txt_title: {
                    required: true,
                },
                txt_text: {
                    required: true,
                },
                image: {
                    required: true
                }

            },
            messages: {
                txt_title: {
                    required: 'Insert title',
                },
                txt_text: {
                    required: 'Insert text',
                },
                image: {
                    required: "Chose file"
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: "product_func/order_func.php",
                    method: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    xhrFields: {
                        withCredentials: true
                    },
                    crossDomain: true,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;

                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "Error",
                                text: str,
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            $('#order_form')[0].reset();
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                title: "Success",
                                text: str,
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "success"
                            });
                            $('#order_form')[0].reset();
                            $('#exampleModalCenter').modal('hide');
                            dataTable.ajax.reload();
                        }

                    }
                })
            }
        })
    }


    $(document).on('click', '#dismiss-modal, button[data-dismiss="modal"]', function() {
        validator.resetForm();
    })


    $(document).on('click', '.update', function() {
        let order_id = $(this).attr("id");
        $.ajax({
            url: "product_func/order_fetch_single.php",
            method: "POST",
            data: { order_id: order_id },
            dataType: "json",
            success: function(data) {
                $('#order_form')[0].reset();
                $('#exampleModalCenter').modal('show');
                $('#id').val(data.id);
                $('#order_NAME').val(data.order_NAME);
                $('#order_LASTNAME').val(data.order_LASTNAME);
                $('.modal-title').text("Izmena");
                $('#order_ADDRESS').val(data.order_ADDRESS);
                $('#order_ZIP').val(data.order_ZIP);
                $('#order_TIME').val(data.order_TIME);
                $('#order_PHONE').val(data.order_PHONE);
                $('#order_EMAIL').val(data.order_EMAIL);
                $('#order_STATUS').val(data.order_STATUS);
                $('#order_NOTE').val(data.order_NOTE);
                $('#order_ITEM').val(data.order_ITEM);
                $('#order_QUANTITY').val(data.order_QUANTITY);
                $('#action').val("Promeni");
                $('#operation').val("Promeni");
            }
        })
    });



    $(document).on('click', '.delete', function() {
        let order_id = $(this).attr("id");
        swal({
            title: "Da li ste sigurni da želite da obrišete narudžbinu?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: "product_func/order_delete.php",
                method: "POST",
                data: { order_id: order_id },
                success: function(data) {
                    let objResp = JSON.parse(data);
                    let str = objResp.type;
                    if (str === 'OK') {
                        swal({
                            title: "Success",
                            text: str,
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success"
                        });
                        dataTable.ajax.reload();
                    }
                }
            })

        })
    });

    $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus();
    });

});