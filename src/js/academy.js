jQuery(document).ready(function ($) {
    $('.academy__category .school__cat .cat-item').click(function () {
        $(this).find("a")[0].click();
    });
});
