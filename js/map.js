function initMap() {
    const uluru = {
        lat: -6.97380967596213,
        lng: 107.63049651227686
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: uluru,
    });
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}