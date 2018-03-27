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
            // $(this).find('.sub-menu').show();
            $('ul', this).stop().slideDown(100);
        },
        function () {
            // $(this).find('.sub-menu').hide();
            $('ul', this).stop().slideUp(100);
        }
    );

    $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
    });

    $('.services').css('padding-top', $('.slider').height() + 'px');
});