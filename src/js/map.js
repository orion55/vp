jQuery(document).ready(function ($) {
    ymaps.ready(init);
    let myMap,
        myPlacemark;

    function init() {
        myMap = new ymaps.Map("map", {
            center: [56.881222, 60.574343],
            zoom: 16
        });
        myMap.container.fitToViewport();

        myPlacemark = new ymaps.Placemark([56.881222, 60.574343], {
            hintContent: 'TrueCustoms'
        }, {
            preset: 'islands#yellowDotIcon'
        });

        myMap.geoObjects.add(myPlacemark);
    }
});