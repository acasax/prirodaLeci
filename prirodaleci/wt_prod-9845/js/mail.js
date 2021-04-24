$(document).ready(function() {

    const $registerForm = $('#form')
    let validator = void(0)

    if ($registerForm.length) {
        validator = $registerForm.validate({
            rules: {
                name: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                },
                napomena: {
                    required: false,
                },
                product: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Unesite Vaše ime.'
                },
                lastname: {
                    required: 'Unesite Vaše prezime.',
                },
                email: {
                    required: 'Unesite Vaš email.',
                    email: 'Vaša email adresa nije validna'
                },
                phone: {
                    required: 'Unesite Vaš broj telefona.'
                },
                product: {
                    required: 'Izaberite proizvod.'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'php_vendors/sendemail.php',
                    method: 'POST',
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;
                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "ERROR",
                                text: str,
                                timer: 2500,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "SUCCESS",
                                    text: str,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    type: "success",

                                },
                                function(isConfirm) {
                                    $(location).attr('href', 'index.php');
                                }
                            );
                        }

                    }
                })
            }
        })
    }

    const $registerForm1 = $('#form1')
        //let validator = void(0)

    if ($registerForm1.length) {
        validator = $registerForm1.validate({
            rules: {
                name: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                },
                napomena: {
                    required: false,
                },
                product: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Unesite Vaše ime.'
                },
                lastname: {
                    required: 'Unesite Vaše prezime.',
                },
                email: {
                    required: 'Unesite Vaš email.',
                    email: 'Vaša email adresa nije validna'
                },
                phone: {
                    required: 'Unesite Vaš broj telefona.'
                },
                product: {
                    required: 'Izaberite proizvod.'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'php_vendors/sendemail.php',
                    method: 'POST',
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;
                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "ERROR",
                                text: str,
                                timer: 2500,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "SUCCESS",
                                    text: str,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    type: "success",

                                },
                                function(isConfirm) {
                                    $(location).attr('href', 'index.php');
                                }
                            );
                        }

                    }
                })
            }
        })
    }

    //Subscribe email sender
    const $subForm = $('#subscription')
        //let validator = void(0)

    if ($subForm.length) {
        validator = $subForm.validate({
            rules: {
                subemail: {
                    required: true,
                    email: true
                }
            },
            messages: {
                subemail: {
                    required: 'Please enter your e-mail address.',
                    email: 'Your e-mail address is not valid'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'php_vendors/sendemailsubscribe.php',
                    method: 'POST',
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;
                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "ERROR",
                                text: str,
                                timer: 2500,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "SUCCESS",
                                    text: str,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    type: "success",

                                },
                                function(isConfirm) {
                                    $(location).attr('href', 'index.php');
                                }
                            );
                        }

                    }
                })
            }
        })
    }

    //Subscribe email sender
    const $subForm_sr = $('#subscription_sr')
        //let validator = void(0)

    if ($subForm_sr.length) {
        validator = $subForm_sr.validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: 'Please enter your e-mail address.',
                    email: 'Your e-mail address is not valid'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: '../php_vendors/sendemailsubscribe_sr.php',
                    method: 'POST',
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let objResp = JSON.parse(data);
                        let str = objResp.type;
                        if (str === 'ERROR') {
                            str = objResp.data;
                            swal({
                                title: "ERROR",
                                text: str,
                                timer: 2500,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "SUCCESS",
                                    text: str,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    type: "success",

                                },
                                function(isConfirm) {
                                    $(location).attr('href', 'index.php');
                                }
                            );
                        }

                    }
                })
            }
        })
    }
});