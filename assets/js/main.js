jQuery(document).ready(function ($) {
    var menu = $('#menu-topmenu');
    var hasChildren = menu.find(".menu-item-has-children");
    hasChildren.each(function () {
        $(this).find('.sub-menu').hide();
    });

    hasChildren.hover(
        function () {
            $(this).find('.sub-menu').show();
        },
        function () {
            $(this).find('.sub-menu').hide();
        }
    );
});
jQuery(document).ready(function ($) {

});
