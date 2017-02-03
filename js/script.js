$('a[href*=\\#]').on('click', function(event) {
    event.preventDefault();
    console.log("clicked");
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top - 75
    }, 500);
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



function mapConfiguration() {

    var googleStreet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    var map = new L.Map('mapid', {
        center: new L.LatLng(48.8413019, 2.5876218),
        zoom: 14,
        layers: [googleStreet]
    });

    var marker = L.marker([48.8413019, 2.5876218]).addTo(map);
    marker.bindPopup("<b>&hearts; Vertigéo &hearts;</b>").openPopup();
}

function setListeners(){
  //  $("#submit").click(function(event) {
  //    event.preventDefault();
  //    console.log("Click submit");
  //  });

   $( "#form_mail" ).submit(function( event ) {
      event.preventDefault();

      var request = {};
      request.submit = true;
      request.token = config.configurations.token;
      request.data = {};
      request.data.name = $( "#name" ).val();
      request.data.email = $( "#email" ).val();
      request.data.message = $( "#message" ).val();
      request.data.human = $( "#human" ).val();

      $.ajax({
        url: '/php/mail.php',
        type: 'POST',
        dataType: 'json',
        data: request
      })
      .done(function() {
        console.log("MAIL success");
      })
      .fail(function() {
        console.log("MAIL error");
      })
      .always(function() {
        console.log("MAIL complete");
      });


    });
}


function setDefaultStyle() {

}

function setDevelopperSettings(){
  $( "#name" ).val("tofull");
  $( "#email" ).val("loic.messal@ensg.eu");
  $( "#message" ).val("Je suis un message automatique");
  $( "#human" ).val("5");
}

$(function() {
    getConfiguration(config);

    mapConfiguration();
    setDefaultStyle();

    setDevelopperSettings();

    setListeners();
});
