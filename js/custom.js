$(function(){

var userError = true,
    emailError = true;

    $('.username').keyup(function(){
        if($(this).val().length < 4){
            $(this).css('border','1px solid #F00');
            $(this).parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
            userError = true;
        } else {
            $(this).css('border','1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
            userError = false;
        }
    });

    $('.email').keyup(function(){
        if($(this).val() === ""){
            $(this).css('border','1px solid #F00');
            $(this).parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
            emailError = true;
        } else {
            $(this).css('border','1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
            emailError = false;
        }
    });
});

$(".contact-form").submit(function(e){
    if(userError === true || emailError === true ){
        e.preventDefault();
        $(".username , .email").keyup();
    } 
});
