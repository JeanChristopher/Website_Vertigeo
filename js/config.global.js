
console.log("CONFIGURATION STARTED");

function Config () {
  this.configurations = {};
}

Config.prototype.loaded = false;



var config = new Config();
setDefaultConfig(config);

function setDefaultConfig(config){
  $.ajax({
    url: 'php/global.config.php',
    type: 'POST'
  })
  .done(function(data) {
    config.configurations = JSON.parse(data);

    setCustomConfig(config);
    setLoaded(config);

    return config;
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}


function setCustomConfig(config){
  config.configurations.custom = null;
  return config;
}

function setLoaded(config){
  config.loaded = true;
  return config;
}



console.log("CONFIGURATION DONE");
