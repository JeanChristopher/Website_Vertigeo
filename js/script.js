$('a[href*=\\#]').on('click', function(event){
    event.preventDefault();
    console.log("clicked");
    $('html,body').animate({scrollTop:$(this.hash).offset().top-75}, 500);
});


$('.carousel').carousel({
  interval: 2000
});


function getConfiguration(config, callback) {
    // do a bunch of stuff
    if (!checkConfigurationLoaded(config)) {
        // call the callback to notify other code
        setTimeout(getConfiguration, 1000);
    }

    console.log("CONFIGURATION LOADED");
    console.log(config.configurations.token);
}


function checkConfigurationLoaded(config) {
  return config.loaded;
}



function mapConfiguration(){

  var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

      var map = new L.Map('mapid',
	{
		center: new L.LatLng(48.8413019,2.5876218),
		zoom: 17,
		layers: [googleStreet]
	});

  var marker = L.marker([48.8413019,2.5876218]).addTo(map);
  marker.bindPopup("<b>&hearts; Vertigéo &hearts;</b>").openPopup();
}
$(function() {
    getConfiguration(config);

    mapConfiguration();
});
