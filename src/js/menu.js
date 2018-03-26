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
            $(this).find('.sub-menu').show();
        },
        function () {
            $(this).find('.sub-menu').hide();
        }
    );

    $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
    });

});