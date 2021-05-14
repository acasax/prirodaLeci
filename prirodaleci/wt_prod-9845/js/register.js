$(document).ready(function() {

    const $registerForm = $('#reg_form')
    let validator = void(0)

    if ($registerForm.length) {
        validator = $registerForm.validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 25
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    maxlength: 25
                },
                rep_password: {
                    required: true,
                    minlength: 3,
                    maxlength: 25
                }
            },
            messages: {
                username: {
                    required: 'Unesite Vaše korisničko ime.',
                    minlength: 'Korisničko ime mora biti duže od 3 karaktera.',
                    maxlength: 'Korisničko ime mora biti kraće od 25 karaktera.'
                },
                email: {
                    required: 'Unesite Vašu e-mail adresu.',
                    email: 'Vaš e-mail nije validan'
                },
                password: {
                    required: 'Unesite Vašu šifru.',
                    minlength: 'Šifra mora biti duže od 3 karaktera.',
                    maxlength: 'Šifra mora biti kraće od 25 karaktera.'
                },
                rep_password: {
                    required: 'Potvrdite Vašu šifru.',
                    minlength: 'Šifra mora biti duže od 3 karaktera.',
                    maxlength: 'Šifra mora biti kraće od 25 karaktera.'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'phpvendors/controller/register_controller.php',
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
                                title: "Greška",
                                text: str,
                                //timer: 2500,
                                showCancelButton: false,
                                showConfirmButton: true,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "Uspešno",
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

    const $loginForm = $('#login_form')
    let validatorL = void(0)

    if ($loginForm.length) {
        validatorL = $loginForm.validate({
            rules: {

                username: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {

                username: {
                    required: 'Unesite Vaš username.',
                },
                password: {
                    required: 'Unesite Vašu šifru.',
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'controller/login_controller.php',
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
                                title: "Greška",
                                text: str,
                                timer: 4000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "Uspešno",
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

    const $recoverForm = $('#recover-form')
    let validatorR = void(0)

    if ($recoverForm.length) {
        validatorR = $recoverForm.validate({
            rules: {

                email: {
                    required: true,
                    email: true
                }
            },
            messages: {

                email: {
                    required: 'Unesite Vašu e-mail adresu.',
                    email: 'Vaš e-mail nije validan'
                }
            },
            submitHandler: function submitHandler(form) {
                event.preventDefault();
                $.ajax({
                    url: 'back-assets/loginsys/services/recover_service.php',
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
                                title: "Greška",
                                text: str,
                                timer: 4000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "error"
                            });
                            return;
                        }

                        if (str === 'OK') {
                            str = objResp.data;
                            swal({
                                    title: "Uspešno",
                                    text: str,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    type: "success",

                                },
                                function(isConfirm) {
                                    $(location).attr('href', 'login.php');
                                }
                            );

                        }

                    }
                })
            }
        })
    }



});