jQuery(document).ready(function ($) {
    if ($('#map').length > 0) {
        ymaps.ready(init);
        let myMap,
            myPlacemark;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [55.745225, 37.652211],
                zoom: 17
            });
            myMap.container.fitToViewport();

            myPlacemark = new ymaps.Placemark([55.745225, 37.652211], {
                hintContent: 'VictoriaPikalova'
            }, {
                preset: 'islands#violetDotIcon'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    }
});