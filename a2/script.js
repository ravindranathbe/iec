function initMap() {
    var uluru = {lat: 59.46, lng: 17.81};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: uluru
    });
    var m;

    $('#mapItems button').on('click', function() {
        $.ajax({
            method: "POST",
            url: 'data.php',
            data: { id: $(this).data('id') }
        }).done(function(result) {
            window.scrollTo(0, 0);
            var resultObj = JSON.parse(result);
            
            if(m != undefined)
                m.setMap(null);
            m = new google.maps.Marker({
                position: {lat: resultObj.Coordinates.Latitude, lng: resultObj.Coordinates.Longitude},
                map: map,
                title: resultObj.MarketingName
            });
            var i = new google.maps.InfoWindow({
                content: '<div><p><strong>' + resultObj.MarketingName + '</strong></p><p>' + resultObj.Address.Street + ', ' + resultObj.Address.City + ', ' + resultObj.Address.Zip + '</p></div>'
            });
            m.addListener('click', function() {
                i.open(map, m);
            });
            map.panTo(m.getPosition());
            setTimeout(function() {
                i.open(map, m);
            }, 1000);
        });
    });
}