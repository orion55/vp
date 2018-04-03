jQuery(document).ready(function ($) {

    // Контейнер с контентом
    const mainBox = $('#school__row');
    const schoolCat = $('#school__cat');
    const schoolTitle = $('#school__title');

    let catItem = schoolCat.find('.cat-item');
    catItem.click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('current-cat')) {
            catItem.removeClass('current-cat');
            $(this).addClass('current-cat');

            let link = $(this).find("a");
            schoolTitle.fadeOut(() => {
                schoolTitle.text(link.text())
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
        mainBox.animate({opacity: 0.5}, 300);

        jQuery.post(window.wp_data.ajax_url, {action: 'get_cat', link: linkCat})
            .done((data) => {
                if (data.success) {
                    let htmlResult = '';
                    data.data.forEach((item) => {
                        let htmlString = `<div class="col-sm-12 col-md-6 col-xl-4 school__row">
                            <div class="card">`;
                        if ("thumbnail" in item) {
                            htmlString += `<a class="card__pict" href="${item.permalink}"><img class="card__img"
                            src="${item.thumbnail}" alt="${item.title}"></a>`;
                        }
                        htmlString += `<div class="card__body">
                                    <h3 class="card__title">${item.title}</h3>`;

                        if ("desc_service" in item) {
                            let desc_service = item.desc_service;
                            desc_service = desc_service[0].split("\n").join("<br />");
                            htmlString += `<div class="card-text">${desc_service}</div>`
                        }

                        if ("price_service" in item) {
                            let number = parseInt(item.price_service, 10);
                            htmlString += `<div class="card-price">
                                            <span class="card-value">${number.toLocaleString("ru")}</span>
                                            <span class="card-currency">р.</span>
                                        </div>`
                        }

                        htmlString += `<a href="${item.permalink}"
                                       class="card__link pure-button hvr-shutter-in-horizontal">Подробнее</a>
                                </div>
                            </div>
                        </div>`;

                        htmlResult += htmlString;
                    });

                    mainBox.html(htmlResult);
                }
                else
                    console.log('Ошибка: ' + data.data);
            })
            .fail(() => {
                console.log("ajaxCat error");
            })
            .always(() => {
                mainBox.animate({opacity: 1}, 300);
            });
    }
});