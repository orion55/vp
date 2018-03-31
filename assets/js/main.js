jQuery(document).ready(function ($) {
    var menu = $('#menu-topmenu');
    var hasChildren = menu.find(".menu-item-has-children");

    hasChildren.each(function () {
        $(this).find('.sub-menu').hide();
        var aHref = $(this).children('a');
        aHref.html(aHref.html() + ' <i class="fas fa-caret-down"></i>');
    });

    hasChildren.hover(
        function () {
            $('ul', this).stop().slideDown(100);
        },
        function () {
            $('ul', this).stop().slideUp(100);
        }
    );

    $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
    });

});
jQuery(document).ready(function ($) {
    $('.articles__row').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: false,
        autoplay: false,
        prevArrow: $('#prevArrow'),
        nextArrow: $('#nextArrow'),
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
