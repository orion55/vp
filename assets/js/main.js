'use strict';

jQuery(document).ready(function ($) {

    // Контейнер с контентом
    var mainBox = $('#school__row');
    var schoolCat = $('#school__cat');
    var schoolTitle = $('#school__title');

    var catItem = schoolCat.find('.cat-item');
    catItem.click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('current-cat')) {
            catItem.removeClass('current-cat');
            $(this).addClass('current-cat');

            var link = $(this).find("a");
            schoolTitle.fadeOut(function () {
                schoolTitle.text(link.text());
            }).fadeIn();

            ajaxCat(link.attr('href'));
        }
    });

    /**
     * Ajax запрос постов из рубрики по переданной ссылке на неё
     *
     * @param linkCat ссылка на рубрику
     */
    function ajaxCat(linkCat) {
        mainBox.animate({ opacity: 0.5 }, 300);

        jQuery.post(window.wp_data.ajax_url, { action: 'get_cat', link: linkCat }).done(function (data) {
            if (data.success) {
                var htmlResult = '';
                data.data.forEach(function (item) {
                    var htmlString = '<div class="col-sm-12 col-md-6 col-xl-4 school__row">\n                            <div class="card">';
                    if ("thumbnail" in item) {
                        htmlString += '<a class="card__pict" href="' + item.permalink + '"><img class="card__img"\n                            src="' + item.thumbnail + '" alt="' + item.title + '"></a>';
                    }
                    htmlString += '<div class="card__body">\n                                    <h3 class="card__title">' + item.title + '</h3>';

                    if ("desc_service" in item) {
                        var desc_service = item.desc_service;
                        desc_service = desc_service[0].split("\n").join("<br />");
                        htmlString += '<div class="card-text">' + desc_service + '</div>';
                    }

                    if ("price_service" in item) {
                        var number = parseInt(item.price_service, 10);
                        htmlString += '<div class="card-price">\n                                            <span class="card-value">' + number.toLocaleString("ru") + '</span>\n                                            <span class="card-currency">\u0440.</span>\n                                        </div>';
                    }

                    htmlString += '<a href="' + item.permalink + '"\n                                       class="card__link pure-button hvr-shutter-in-horizontal">\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435</a>\n                                </div>\n                            </div>\n                        </div>';

                    htmlResult += htmlString;
                });

                mainBox.html(htmlResult);
            } else console.log('Ошибка: ' + data.data);
        }).fail(function () {
            console.log("ajaxCat error");
        }).always(function () {
            mainBox.animate({ opacity: 1 }, 300);
        });
    }
});
'use strict';

jQuery(document).ready(function ($) {

    var menu = $('#menu-topmenu');
    var hasChildren = menu.find(".menu-item-has-children");

    hasChildren.each(function () {
        $(this).find('.sub-menu').hide();
        var aHref = $(this).children('a');
        aHref.html(aHref.html() + ' <i class="fas fa-caret-down"></i>');
    });

    hasChildren.hover(function () {
        $('ul', this).stop().slideDown(100);
    }, function () {
        $('ul', this).stop().slideUp(100);
    });

    $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
    });
});
'use strict';

jQuery(document).ready(function ($) {
    $('.articles__row').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: false,
        autoplay: false,
        prevArrow: $('#prevArrow'),
        nextArrow: $('#nextArrow'),
        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
});