$('#navbar a[href*=\\#]').on('click', function(event) {
    event.preventDefault();
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top - 60
    }, 500);


});

$('.navbar .navbar-brand[href*=\\#]').on('click', function(event) {
    event.preventDefault();
    $('html,body').animate({
        scrollTop: 0
    }, 500);
});



function setCarousel(){
    $('.carousel').carousel({interval:3000});
    var caption = $('div.item:nth-child(1) .carousel-caption');
    $('.new-caption-area').html(caption.html());
    caption.css('display', 'none');

    $(".carousel").on('slide.bs.carousel', function (evt) {
        var caption = $('div.item:nth-child(' + ($(evt.relatedTarget).index() + 1) + ') .carousel-caption');
        $('.new-caption-area').html(caption.html());
        caption.css('display', 'none');
    });

    $('.carousel-indicators  li').on('mouseover',function(){
        $(this).trigger('click');
    });
}



function getConfiguration(callback) {
    // do a bunch of stuff
    if (!checkConfigurationLoaded()) {
        // call the callback to notify other code
        setTimeout(getConfiguration, 1000);
    }

    console.log("CONFIGURATION LOADED");
    console.log(config.configurations.token);
}


function checkConfigurationLoaded() {
    if (config.loaded === undefined) {
        return false;
    }
    return config.loaded;
}



function setLeaflet() {

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

function setListeners() {
    //  $("#submit").click(function(event) {
    //    event.preventDefault();
    //    console.log("Click submit");
    //  });

    $("#form_mail").on('keyup change', 'input, select, textarea', function() {

        $("#name").removeClass("text-danger bg-danger");
        $("#email").removeClass("text-danger bg-danger");
        $("#message").removeClass("text-danger bg-danger");
        $("#human").removeClass("text-danger bg-danger");
        $("#submit").removeClass("text-danger bg-danger btn-danger");



        $('#name').tooltip('destroy');
        $('#email').tooltip('destroy');
        $('#message').tooltip('destroy');
        $('#human').tooltip('destroy');
        $('#submit').tooltip('destroy');
    });
    $("#form_mail").submit(function(event) {
        event.preventDefault();

        var request = {};
        request.submit = true;
        request.token = config.configurations.token;
        request.data = {};
        request.data.name = $("#name").val();
        request.data.email = $("#email").val();
        request.data.message = $("#message").val();
        request.data.human = $("#human").val();

        $.ajax({
                url: 'php/mail.php',
                type: 'POST',
                data: $("#form_mail").serialize(),
            })
            .done(function(data) {
                console.log("MAIL success");
                console.log(data);
                try {
                    data = JSON.parse(data);
                } catch (e) {}
                console.log(data.errName);

                if (data.errName !== null) {
                    console.log("DATA ERR NAME");
                    $("#name").toggleClass("text-danger bg-danger");
                    $("#name").attr("title", data.errName);
                    $('#name').tooltip('show');
                }
                if (data.errEmail !== null) {
                    console.log("DATA ERR MESSAGE");
                    $("#email").toggleClass("text-danger bg-danger");
                    $("#email").attr("title", data.errEmail);
                    $('#email').tooltip('show');
                }
                if (data.errMessage !== null) {
                    console.log("DATA ERR MESSAGE");
                    $("#message").toggleClass("text-danger bg-danger");
                    $("#message").attr("title", data.errMessage);
                    $('#message').tooltip('show');
                }
                if (data.errHuman !== null) {
                    console.log("DATA ERR HUMAN");
                    $("#human").toggleClass("text-danger bg-danger");
                    $("#human").attr("title", data.errHuman);
                    $('#human').tooltip('show');
                    console.log("classe changed");
                }
                if (data.mailSuccess === null || data.mailSuccess === false || data.mailSuccess === undefined) {
                    console.log("DATA ERR MAIL");
                    $("#submit").toggleClass("text-danger bg-danger btn-danger");
                    $("#submit").attr("title", "Problème dans l'envoi du mail.");
                    $('#submit').tooltip('show');
                } else {
                    $("#submit").toggleClass("btn-success");
                    setTimeout(function() {
                        $("#submit").toggleClass("btn-success");
                    }, 2000);

                }

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

function setDevelopperSettings() {
    $("#name").val("tofull");
    $("#email").val("test@ensg.eu");
    $("#message").val("Je suis un message automatique");
    $("#human").val("5");
}

$(function() {
    getConfiguration(config);

    activateInitializers();

    // setDevelopperSettings();

    setDefaultStyle();

    setListeners();
});


function activateInitializers() {
    setLeaflet();
    setMansoryGrid();
    setFancybox();
    setCarousel();
}

function setFancybox() {
    $(".fancybox-thumb").fancybox({
        prevEffect: 'elastic',
        nextEffect: 'elastic',
        helpers: {
            title: {
                type: 'outside'
            },
            thumbs: {
                width: 50,
                height: 50
            }
        }
    });
}

function setMansoryGrid() {
    $('.grid').masonry({
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true
    });
}
