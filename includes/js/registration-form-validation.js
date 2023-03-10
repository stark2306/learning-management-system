$(document).ready(function () {

    /*
        description: function to sanitize the input field data
        @param (string) field_data
        @return (string) data
    */
    function trim_data(field_data) {
        let data = field_data.trim();
        return data;
    }
   
    /**
     * description: show validation message for username, email, and contact fields after processing the data through show_validations() function
     * @param (string) selector_in_focus, (bool) exist_status 
     * @return (void)
     */
    function show_validation_message(selector_in_focus, exist_status){
        if(exist_status)
        {
            $(selector_in_focus).after("<span class='not-available'>Not Available</span>");
            $("button.registration_submit_btn").attr({"disabled":true})
            $("button.registration_submit_btn").css("text-decoration","line-through");
        }
        else if(!exist_status)
        {
            $(selector_in_focus).after("<span class='available'>Available</span>");
            $("button.registration_submit_btn").attr({"disabled":false})
            $("button.registration_submit_btn").css("text-decoration","none");
        }
    }

    /**
     * description: function to process the username, email, and contact fields and make comparison to ensure that these fields have a unique value entered in db
     * @param  (string) data, (string) selector_in_focus, (string) selector, (string) value_entered 
     * @return (void)
     */
    function show_validations(data,selector_in_focus,selector,value_entered){
        console.log(value_entered)
        let comparison_value = "";
        exist_status = false;
        for(let i=0;i<data.length;i++)
        {  
            $('.not-available').remove(); 
            $('.available').remove();
            $('.short-username').remove();
            if(selector == 'email'){
                comparison_value = data[i].email;
            }
            else if(selector == 'contact' && value_entered.length == 10){
                if (value_entered == data[i].contact)
                {
                    exist_status = true;
                }
                show_validation_message(selector_in_focus,exist_status)
            }
            else
            { 
                if(selector == 'username' && value_entered.length >= 5){
                if (value_entered == data[i].username)
                {
                    exist_status = true;
                }
                show_validation_message(selector_in_focus,exist_status)
            }
            if(selector == 'username' && value_entered.length <4 && value_entered.length!=0){
                $("input#username").after("<span class='short-username'>Please choose a username which has atleast length of 4</span>");
            }   
        }

            if (value_entered == comparison_value)
            {
                exist_status = true;
                break;
            }
        }
    }

    /**
     * description: get the json response from db for email, contact, username and show validation message accordingly to ensure that these fields
     *                         in db have unique values
     * @param (string) selector 
     * @return (void)
     */
    function check_validity(selector){
        let selector_in_focus = "input#".concat(selector)
      
            $(selector_in_focus).on('keyup',function(){
                let value_entered = $(selector_in_focus).val();
                $.getJSON('../../db-queries/get-db-data.php', function(data) {
                   setInterval(show_validations(data,selector_in_focus,selector,value_entered),5000)
                })
            });
        }

    /*
       pass the selector in focus as parameter to check_validity function
    */
    $("input").focusin(function(){
        let selector = $(this).attr('id');
        if(selector == 'email' || selector == 'contact' || selector == 'username')
        {
            check_validity(selector);
        }
    });

    /*
        show validation message on clicking the form submit button by making various comparisons and disable the submit button accordingly to prevent
        submitting the invalid data through registeration form
    */ 
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

    /**
     *  description: show required validation label on skipping a mandatory/required field
     * @param (string) selector_id, (string) field_value 
     * @return void 
     */
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