const defaultLocation = [35.7015038, 51.3653053];
const defaultZoom = 14;
const defaultMarkerZoom = 18;
var map = L.map('map', { doubleClickZoom: false, zoomControl: false }).setView(defaultLocation, defaultZoom);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'This Open Source Project Developed In Beta Version By <a href="https://mgazori.com" target="_blank">Mohammad Gazori</a>. Go To <a href="https://github.com/mgazori/abimap" target="_blank">GitHub</a>',
    maxZoom: 21,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWdhem9yaSIsImEiOiJja2F0OG9tbnkxN25zMnFwbGljd2J6OXIxIn0.eQelp7y2CmdiFI_BwZujwQ'
}).addTo(map);
L.control.zoom({ position: 'bottomleft' }).addTo(map);

function setMainHeight() {
    document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');
}
setMainHeight();
window.addEventListener("resize", setMainHeight);
var theMarker = {};
map.on('dblclick', function(e) {
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    //Clear existing marker, 
    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    };
    //Add a marker to show where you clicked.
    theMarker = L.marker([lat, lng]).addTo(map);
    $('#lat-display').val(lat);
    $('#lng-display').val(lng)
    $('#l-type').val(0);
    $('#l-title').val('');
    $('.modal-overlay').fadeIn(250);
});
$('.modal-overlay .modal span.close').click(function() {
    $('.modal-overlay').fadeOut(250);
    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    };
})

// find Current Location
var current_position, current_accuracy;
map.on('locationfound', function(e) {
    // if position defined, then remove the existing position marker and accuracy circle from the map
    if (current_position) {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy;
    current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("دقت تقریبی: " + radius + " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);
});
map.on('locationerror', function(e) {
    console.log(e.message);
});
// wrap map.locate in a function    
function locate() {
    map.locate({ setView: true, maxZoom: defaultMarkerZoom });
}
$(document).ready(function() {
    $('form#addLocationForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                $('.modal-overlay').fadeOut(250);
                if (theMarker != undefined) {
                    map.removeLayer(theMarker);
                };
                Swal.fire({
                    icon: 'success',
                    text: response,
                    confirmButtonText: 'تایید'
                })
            }
        });
    })
    $('#search').keyup(function() {
        const input = $(this);
        const searchResult = $('.search-results');
        searchResult.html('در حال جستجو ...');
        if (input.val().length > 1) {
            $.ajax({
                url: 'process/search.php',
                method: 'POST',
                type: 'json',
                data: {
                    keyword: input.val()
                },
                success: function(response) {
                    searchResult.slideDown().html(response);
                    searchLocationView();
                }
            });
        } else {
            searchResult.slideUp().html('');
        }
        if (input.val().length) { $('img.clear-search-btn').fadeIn(); } else { $('img.clear-search-btn').fadeOut(); }
    });
    $('.geolocation-btn').click(function() {
        locate();
    })
    $('img.clear-search-btn').click(function() {
        $('#search').val('');
        $('img.clear-search-btn').fadeOut();
        $('.search-results').slideUp().html('');
    })

    function searchLocationView() {
        $('.result-item').click(function() {
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
            const location = $(this);
            theMarker = L.marker([location.attr('data-lat'), location.attr('data-lng')]).addTo(map).bindPopup(location.children('.loc-title').html()).openPopup();
            map.setView([location.attr('data-lat'), location.attr('data-lng')], defaultMarkerZoom);
        })
    }
})