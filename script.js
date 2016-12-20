function initMap() {
    var uluru = {lat: 59.46, lng: 17.81};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: uluru
    });

    map.addListener('click', function(e) {
        var map_lat = e.latLng.lat();
        var map_lng = e.latLng.lng();

        $.ajax({
            method: "POST",
            url: 'data.php',
            data: { lat: map_lat, lng: map_lng }
        }).done(function(result) {
            var resultObj = JSON.parse(result);
            var storeList = resultObj.GetAllStoresResult.StoreList;
            $(storeList).each(function(i, e) {
                $('#mapItems ol').append('<li>' + e.Name + '</li>');
                var m = new google.maps.Marker({
                    position: {lat: e.Lat, lng: e.Long},
                    map: map,
                    title: e.Name
                });
                var i = new google.maps.InfoWindow({
                    content: '<div><p><strong>' + e.Name + '</strong></p><p>' + e.StreetAddress + ', ' + e.City + ', ' + e.PostalCode + '</p></div>'
                });
                m.addListener('click', function() {
                    i.open(map, m);
                });
            });
        });
    });
}