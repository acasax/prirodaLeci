grecaptcha.ready(() => {
    grecaptcha.execute('6LcA-KoaAAAAAEQM7Goe4_Rb8T3sut1L5Ep2IBpB')
        .then((token) => {
            recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
});