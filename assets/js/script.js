var map = L.map('map').setView([35.7015038, 51.3653053], 18);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'This Open Source Project Developed In Beta Version By <a href="https://mgazori.com" target="_blank">Mohammad Gazori</a>. Go To <a href="https://github.com/mgazori/abimap" target="_blank">GitHub</a>',
    maxZoom: 21,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWdhem9yaSIsImEiOiJja2F0OG9tbnkxN25zMnFwbGljd2J6OXIxIn0.eQelp7y2CmdiFI_BwZujwQ'
}).addTo(map);

function setMainHeight() {
    document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');
}
setMainHeight();
window.addEventListener("resize", setMainHeight);