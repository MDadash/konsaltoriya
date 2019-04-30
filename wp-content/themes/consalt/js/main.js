
$(function(){
    // $('.header__btn1').click(function(){
 //        $('.menu-colapse2, .menu-colapse3').slideUp();
 //     $('.menu-colapse1').slideToggle().css('display','flex');;
 //    });
 //    $('.header__btn2').click(function(){
 //        $('.menu-colapse1, .menu-colapse3').slideUp();
 //        $('.menu-colapse2').slideToggle().css('display','flex');;
 //    });
 //    $('.header__btn3').click(function(){
 //        $('.menu-colapse1, .menu-colapse2').slideUp();
 //        $('.menu-colapse3').slideToggle().css('display','flex');;
 //    });

     $('.header__btn').click(function(){
            var tabNumber = $(this).attr('data-toggle');
            var tabs = $('.menu-colapse');
            for (var i = 0; i < tabs.length; i++) {
                if ($(tabs[i]).attr('data-toggle') != tabNumber) {
                    $(tabs[i]).slideUp();
                } else {
                    $(tabs[i]).slideToggle().css('display','flex');
                }
            }
            
    });
});


$(function() {
    $("#formapodpisi").validate({
        submitHandler: function (form) {
            console.log(form);
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    console.log(response);
                    $('.form-podpis').toggle();
                    $('.form-complete').toggle();

                }
            });

        }
    });
});

var staticGifSuffix = ".gif";
var gifSuffix = ".gif";

/* ___ main page - gif animation ___ */
$(document).ready(function() {
     $('.table').hover(
        function() {
            var originalSrc = $(this).attr("src");
            $(this).attr("src", originalSrc.replace(staticGifSuffix, gifSuffix));
        },
        function() {
            var originalSrc = $(this).attr("src");
            $(this).attr("src", originalSrc.replace(gifSuffix, staticGifSuffix));  
        }
     );
});

/* ___ main page - scroll to services blocks ___ */
$('button[class^="header__btn"]').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(this).offset().top
    }, 1500);
});