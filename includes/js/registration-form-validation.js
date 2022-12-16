$(document).ready(function () {

    function trim_data(field_data) {
        let data = field_data.trim();
        return data;
    }

    $('button.registration_submit_btn').on('click', () => {
        $("#registration_form>input").each(function (event) {
            let selector_id = $(this).attr('id');
            let field_value = $(this).val();
            validation_message(selector_id, field_value);
        });
    });

    
    $("input#original_password").focusin(function(){
        $('input#confirm_password').attr('disabled',false);
        $('.enter-original-password').remove();
        $("button.registration_submit_btn").attr('disabled',false).css('text-decoration','none');
    });

    $("input#confirm_password").on("keyup",function(){
        let password1 = trim_data($("input#original_password").val());
        let password2 = trim_data($("input#confirm_password").val());

        if(!password1.length){
            $('input#original_password').after("<span class='enter-original-password'>Please create password first<span>");
            $('input#confirm_password').val("").attr('disabled',true);
            $("button.registration_submit_btn").attr('disabled',true).css('text-decoration','line-through');
        }

        else if(password1.length){
            $('input#confirm_password').attr('disabled',false);
            if(password1 == password2 && password2.length == password1.length){
                $(".passwords-exceed-label").remove();
                $("input#confirm_password").after("<span class='passwords-check-label' id='passwords-match'>Passwords match</span>");
                $("button.registration_submit_btn").attr('disabled',false).css('text-decoration','none');
            }
            else if(password1 != password2 && password2.length == password1.length){
                $(".passwords-exceed-label").remove();
                $("input#confirm_password").after("<span class='passwords-check-label' id='passwords-mismatch'>Passwords do not match</span>");
                $("button.registration_submit_btn").attr('disabled',true).css('text-decoration','line-through');
            }
            else if(password2.length > password1.length){
                $('#passwords-match').remove();
                $('#passwords-mismatch').remove();
                $('.passwords-exceed-label').remove();
                $("input#confirm_password").after("<span class='passwords-exceed-label'>Password length exceeded</span>");
                $("button.registration_submit_btn").attr('disabled',true).css('text-decoration','line-through');
            }
            else if(password2.length < password1.length){
                $(".passwords-check-label").remove();
                $("button.registration_submit_btn").attr('disabled',false).css('text-decoration','none');
            }
        }
    });

   function validation_message(selector_id, field_value) {
        if (!field_value) {
            selector_id = '#'.concat(selector_id);
            $(selector_id).fadeIn(2000).after("<span class='required-label'>Required</span>");
            setTimeout(() => {
                $('.required-label').remove();
            }, 2000);
            event.preventDefault();
        }
    }
})