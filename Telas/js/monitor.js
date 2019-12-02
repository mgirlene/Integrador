(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    $('#formCM').ready(function () {
        $('#formCM').validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 3
                },
                matricula: {
                    required: true,
                    minlength: 3
                },
                curso: {
                    required: true
                },
                disciplina: {
                    required: true
                },
                senha: {
                    required: true
                },
                confSenha: {
                    required: true,
                    equalTo: "#senha"
                }
            },
            messages: {
                nome: {
                    required: "O campo nome é obrigatório.",
                    minlength: "O campo nome deve conter no mínimo 3 caracteres."
                },
                matricula: {
                    required: "O campo nome é obrigatório.",
                    minlength: "O campo nome deve conter no mínimo 3 caracteres."
                },
                curso: {
                    required: "O campo curso é obrigatório."
                },
                disciplina: {
                    required: "O campo disciplina é obrigatório."
                },
                senha: {
                    required: "O campo senha é obrigatório."
                },
                confSenha: {
                    required: "O campo confirmação de senha é obrigatório.",
                    equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
                }
            }
    });
});

})(jQuery);