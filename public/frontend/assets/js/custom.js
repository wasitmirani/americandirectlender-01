
jQuery( document ).ready(function($) {
$('#cilent').slick({
dots: false,
arrows: true,
infinite: true,
speed: 1000,
slidesToShow: 3,
loop: true,
slidesToScroll: 1,
autoplay: false,
autoplaySpeed: 2000,
pauseOnHover: false,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
speed: 1000,
slidesToScroll: 1,
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
speed: 1000,
slidesToScroll: 1
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1
}
}
]
});
});
/*Back to top*/
var btn = $("#button");

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "300");
});
/*Back to top*/

/*Testimonials*/
jQuery( document ).ready(function($) {
$('#testimonials').slick({
dots: false,
arrows: false,
infinite: true,
speed: 2000,
slidesToShow: 1,
loop: true,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 4000,
pauseOnHover: true,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1,
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1
}
}
]
});
});
/*Testimonials*/

/*Testimonials*/
jQuery( document ).ready(function($) {
$('#slider-id').slick({
dots: false,
arrows: true,
infinite: true,
speed: 2000,
slidesToShow: 1,
loop: true,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 4000,
pauseOnHover: true,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1,
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 1,
speed: 1000,
slidesToScroll: 1
}
}
]
});
});
/*Testimonials*/
/*Form*/
// ------------step-wizard-------------
$(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});



/*Form*/
$('#inputDate').datepicker({
});
