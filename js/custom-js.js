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

//MENU DROPDOWN
$(document).ready(function(){
    $(".dropdown-toggle").click(function(){
        $(this).next('.dropdown-menu').toggle(1000);
    });
});

//OPEN MENU
$(document).ready(function(){


    $('.burger-container').toggle(function () {
        $(".sidebar").css({marginLeft: "0px"});
    }, function () {
        $(".sidebar").css({marginLeft: "-270px"});
    });


});

const burgerContainer = document.querySelector('.burger-container');
const navButton = document.querySelector('.nav-btn');

burgerContainer.addEventListener('click', () => {
    burgerContainer.classList.toggle('show');
});