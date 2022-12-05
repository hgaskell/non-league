//SHOW/HIDE LOGIN FORM
$(document).ready(function(){
    $("#showLogin").click(function(){
        $(".login-form").toggle(1000);
    });
});

//SLICK
$(document).ready(function(){
    $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});