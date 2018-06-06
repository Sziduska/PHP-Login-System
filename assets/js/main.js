$(document)
    //FOR REGISTER 
    .on("submit", "form.js-register", function (event) {
        event.preventDefault();

        var _form = $(this);
        var _error = $(".js-error", _form);
        var dataObj = {
            email: $("input[type='email']", _form).val(),
            password: $("input[type='password']", _form).val()
        };

        //Validating email and password length
        if (dataObj.email.length < 6) {
            _error
                .text("Please enter a valid email address!")
                .show();
            return false;
        } else if (dataObj.password.length < 11) {
            _error
                .text("Please enter a passphrase that is at least 11 characters long!")
                .show();
            return false;
        }

        //Assuming the code gets this far, we can start the ajax process
        _error.hide();

        $.ajax({
                type: 'POST',
                url: '/Section16_Login_Registration/php_login_course/ajax/register.php',
                data: dataObj,
                dataType: 'json',
                async: true
            })
            .done(function ajaxDone(data) {
                if (data.redirect !== undefined) {
                    window.location = data.redirect;
                } else if (data.error !== undefined) {
                    _error
                        .html(data.error)
                        .show();
                }
            })
            .fail(function ajaxFailed(e) {

            })
            .always(function ajaxAlwaysDoThis(data) {

            })

        return false;
    })
    //FOR LOGIN
    .on("submit", "form.js-login", function (event) {
        event.preventDefault();

        var _form = $(this);
        var _error = $(".js-error", _form);
        var dataObj = {
            email: $("input[type='email']", _form).val(),
            password: $("input[type='password']", _form).val()
        };

        //Validating email and password length
        if (dataObj.email.length < 6) {
            _error
                .text("Please enter a valid email address!")
                .show();
            return false;
        } else if (dataObj.password.length < 11) {
            _error
                .text("Please enter a passphrase that is at least 11 characters long!")
                .show();
            return false;
        }

        //Assuming the code gets this far, we can start the ajax process
        _error.hide();

        $.ajax({
                type: 'POST',
                url: '/Section16_Login_Registration/php_login_course/ajax/login.php',
                data: dataObj,
                dataType: 'json',
                async: true
            })
            .done(function ajaxDone(data) {
                if (data.redirect !== undefined) {
                    window.location = data.redirect;
                } else if (data.error !== undefined) {
                    _error
                        .text(data.error)
                        .show();
                }
            })
            .fail(function ajaxFailed(e) {

            })
            .always(function ajaxAlwaysDoThis(data) {

            })

        return false;
    })
