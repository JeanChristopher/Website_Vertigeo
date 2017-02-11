<?php
// Check method if session is already start depends on php version
if(phpversion() >= 5.4) {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} else { // maintain backwards compat. with PHP versions older than 5.4
    if(!isset($_SESSION)) {
        session_start();
    }
}
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Vertigéo, l'asso étudiante professionnelle de l'ENSG">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta property="og:title" content="Vertigéo, l'asso étudiante professionnelle de l'ENSG" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://vertigeo.ensg.eu" />
    <meta property="og:image" content="img/utilisables/logo.png" />

    <link rel="icon" type="image/png" href="img/utilisables/icon.png" />
    <title>Vertigéo</title>
    <link rel="stylesheet" href="fonts/lobster/lobster.css">
    <link rel="stylesheet" href="fonts/tangerine/tangerine.css">
    <link rel="stylesheet" href="includes/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <link rel="stylesheet" href="includes/fancybox-2.1.6/source/jquery.fancybox.css?v=2.1.6" type="text/css" media="screen" />
    <link rel="stylesheet" href="includes/fancybox-2.1.6/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="includes/fancybox-2.1.6/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/caroussel.css">
  </head>

  <body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="120">
    <!-- <div id="background"></div> -->
    <!-- <div class="DEVTOOLS">
      <ul>
        <li>
          <a target="_blank" href="/php/devTools/resetSession.php"> Reset Session </a>
        </li>
      </ul>
    </div> -->
    <nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#sectionHome">Vertigéo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#sectionCompetences">Nos compétences</a></li>
            <li><a href="#sectionServices">Nos services</a></li>
            <li><a href="#sectionPartenaires">Nos partenaires</a></li>
            <li><a href="#sectionContact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a target="_blank" href="https://fr.linkedin.com/in/vertigéo-ensg-0bb45126">
                <i class="fa fa-linkedin-square fa-lg" style="color:#0077B5;"></i> LinkedIn
              </a>
            </li>
            <li>
              <a target="_blank" href="https://www.facebook.com/profile.php?id=100008796610594&fref=ts">
                <i class="fa fa-facebook-square fa-lg" style="color:#4267b2;"></i> Facebook
              </a>
            </li>
            <li>
              <a target="_blank" href="https://github.com/Tofull/Website_Vertigeo">
                <i class="fa fa-github-square fa-lg "></i> Github
              </a>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>

    <section id="sectionHome">

      <div class="row-fluid">
        <div class="container-fluid no-padding-vertical no-margin-vertical" id="starterContainterFluid">
          <div class="container" id="starterContainter">
            <div class="row">
              <div class="jumbotron">
                <div class="container">
                  <div class="col-md-10 col-md-offset-1">
                    <img src="img/utilisables/logo.png" alt="Logo Vertigeo" height="200px" class="img-responsive center-block" />
                    <h3 class="text-center">l'association étudiante à vocation professionnelle au service de </h3>
                    <h1 class="tangerine display-2 text-center">l'information géographique</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <div class="space"></div>
    <section id="sectionCompetences">

      <div class="jumbotron transparent no-padding-vertical no-margin-vertical" id="competencesSection">
        <h2 class="lobster margin-shifted-side">Nos compétences</h2>
        <div class="container-fluid" id="competencesContainterFluid">
          <div class="container fill">

            <div class="row-eq-height no-padding-vertical fill">
              <div class="col-md-4 no-padding-vertical fill">
                <!-- <img src="img/utilisables/leve.jpg" alt="" width="100%" height="100%" class="fill"> -->
                <div class="fill">
                  <div class="fill parallax-window " data-parallax="scroll" data-image-src="img/utilisables/leve.jpg" data-z-index="3"></div>
                </div>
              </div>

              <div class="col-md-8 margin-shifted-vertical">

                <div>
                  <!-- Indicators -->
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <div class="item active">
                        <img src="img/utilisables/topometrie.jpg">
                        <span class="carousel-caption d-none d-md-block">
                          <h3>Topométrie</h3>
                        </span>
                      </div>
                      <div class="item">
                        <img src="img/utilisables/photogrammetrie.jpg">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>Photogrammétrie</h3>
                        </div>
                      </div>
                      <div class="item">
                        <img src="img/utilisables/informatique.jpg">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>Informatique</h3>
                        </div>
                      </div>
                      <div class="item">
                        <img src="img/utilisables/cartographie.jpg">
                        <div class="carousel-caption d-none d-md-block">
                          <h3>Cartographie</h3>
                        </div>
                      </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control prev" href="#myCarousel" role="button" data-slide="prev">
                      <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control next" href="#myCarousel" role="button" data-slide="next">
                      <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>

                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>

                      <li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <span class="carousel-captionCustom no-padding-vertical no-margin-vertical">
                        <span class="automaticLabel captionStyleCustom  no-padding-vertical no-margin-vertical"></span>
                    </span>
                  </div>
                </div>
                <div class="">
                  <p class="text-justify">La formation à l'<a href="http://ensg.eu" class="nounderline">École Nationale des Sciences Géographiques</a> permet aux étudiants d'acquérir rapidement des compétences dans l'univers du numérique et de l'information géographique.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <div class="space"></div>
    <section id="sectionServices">

      <div class="jumbotron transparent no-padding-vertical no-margin-vertical" id="serviceContainterFluidJumbotron">
        <h2 class="lobster margin-shifted-side">Nos services</h2>
        <div class="container-fluid" id="servicesContainterFluid">
          <div class="container">
            <div class="row equal">
              <div class="col-md-3">
                <div class="panel margin-shifted-vertical">
                  <div class="panel-heading ">
                    <div class="text-center">
                      <i class="fa fa-code fa-5x"></i>
                    </div>
                    <h3 class="text-center text-uppercase helvetica">Développement</h3>
                  </div>
                  <div class="panel-body">
                    <p class="text-center">
                      Nous sommes spécialisés dans les bases de données, les technologies web, les processus de traitement et la cartographie 2D / 3D. Nous voulons de nouveaux challenges !
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="panel margin-shifted-vertical">
                  <div class="panel-heading ">
                    <div class="text-center">
                      <i class="fa fa-globe fa-5x" aria-hidden="true"></i>
                    </div>
                    <h3 class="text-center text-uppercase helvetica">Expertise</h3>
                  </div>
                  <div class="panel-body ">

                    <p class="text-center">
                      Nos techniciens, nos licences professionnelles et nos ingénieurs maîtrisent leur domaine. Nous avons les compétences.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="panel margin-shifted-vertical">
                  <div class="panel-heading ">
                    <div class="text-center">
                      <i class="fa fa-newspaper-o fa-5x"></i>
                    </div>
                    <h3 class="text-center text-uppercase helvetica">Formation</h3>
                  </div>
                  <div class="panel-body ">
                    <p class="text-center">
                      Nous utilisons au quotidien les outils dont vous avez besoin. Nous aimerions les partager.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="container margin-shifted-vertical">
                  <div class="row">
                    <div class="centerizedParent">
                      <div class="centerizedChildren">


                        <div class="text-center">
                          <h4 class="helvetica">Notre plaquette : </h4>


                          <a target="_blank" href="assets/Vertigeo_plaquette.pdf">
                            <div class="verticallyDispatch">
                              <span>

                                    <i class="fa fa-file-pdf-o fa-4x" aria-hidden="true" style="color:red"></i>
                                  </span><span>
                                    pdf
                                  </span>
                            </div>

                          </a>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="space"></div>
    <section id="sectionPartenaires">

      <div class="jumbotron transparent no-padding-vertical no-margin-vertical" id="partenaireJumbotron">
        <h2 class="lobster margin-shifted-side">Nos partenaires</h2>
        <div class="container-fluid" id="partenaireContainterFluid">
          <div class="container">
            <div class="row">
              <div class="col-md-offset-1 col-md-10">
                <div class="panel margin-shifted-vertical flex-col">
                  <div class="panel-heading ">
                    <h3 class="text-center helvetica">Ils nous font confiance !</h3>
                  </div>
                  <div class="panel-body flex-grow" id="panelMansoryContainer">
                    <div id="gridMansoryContainer">

                      <div class="grid">
                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>

                        <div class="grid-item grid-item--width2">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/afigeo.jpg" title="Afigeo"><img src="img/logos_partenaires/afigeo.jpg" alt="" /></a>
                        </div>
                        <div class="grid-item grid-item--width3">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/cci_essonne.jpg" title="CCI ESSONNE"><img src="img/logos_partenaires/cci_essonne.jpg" alt="" /></a>
                        </div>
                        <div class="grid-item grid-item--width2">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/ign.png" title="IGN"><img src="img/logos_partenaires/ign.png" alt="" /></a>
                        </div>
                        <div class="grid-item grid-item--width2">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/louvre.jpg" title="Le musée du Louvres"><img src="img/logos_partenaires/louvre.jpg" alt="" /></a>
                        </div>
                        <div class="grid-item grid-item--width3">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/meteo_france.png" title="Météo France"><img src="img/logos_partenaires/meteo_france.png" alt="" /></a>
                        </div>
                        <div class="grid-item">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/planet_observer.jpg" title="Planète Observer"><img src="img/logos_partenaires/planet_observer.jpg" alt="" /></a>
                        </div>
                        <div class="grid-item grid-item--width2">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/ratp.jpg" title="RATP"><img src="img/logos_partenaires/ratp.jpg" alt="" /></a>
                        </div>
                        <div class="grid-item">
                          <a class="fancybox-thumb" rel="fancybox-thumb" href="img/logos_partenaires/toposat.jpg" title="Toposat"><img src="img/logos_partenaires/toposat.jpg" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <div class="space"></div>

    <section id="sectionContact">

      <div class="jumbotron transparent no-padding-vertical no-margin-vertical" id="contactContainterFluidJumbotron">
        <h2 class="lobster margin-shifted-side">Nous contacter</h2>
        <div class="container-fluid bg-outer" id="contactContainterFluid">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 ">

                <div class="container  margin-shifted-vertical">
                  <h3>Envoyez-nous un message : </h3>
                  <form id="form_mail" class="form-horizontal" role="form" accept-charset="UTF-8">
                    <div class="input-group full-width">
                      <label for="name" class="col-sm-2 control-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" data-toggle="tooltip" data-placement="right" placeholder="Prénom Nom">
                      </div>
                    </div>
                    <div class="input-group full-width">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" data-toggle="tooltip" data-placement="right" placeholder="example@domain.com">
                      </div>
                    </div>
                    <div class="input-group full-width">
                      <label for="message" class="col-sm-2 control-label">Message</label>
                      <div class="col-sm-10">
                        <textarea id="message" class="form-control" rows="4" name="message" data-toggle="tooltip" data-placement="right" placeholder="Je réfléchis à un projet de SIG web depuis longtemps. J'aimerais le confier à un étudiant en géomatique. J'ai alors pensé à vous. J'aimerais vous rencontrer pour en discuter. Quand êtes-vous disponible ?"></textarea>
                      </div>
                    </div>
                    <div class="input-group full-width margin-shifted-vertical">
                      <label for="human" class="col-sm-2 control-label">2 + 3 = </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="human" name="human" placeholder="?" data-toggle="tooltip" data-placement="right">
                      </div>
                    </div>
                    <div class="input-group full-width margin-shifted-vertical">
                      <div class="col-sm-10 col-sm-offset-2 ">
                        <input id="submit" type="submit" value="Envoyer" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="right">
                      </div>
                    </div>
                    <div class="form-group full-width">
                      <div class="col-sm-10 col-sm-offset-2">
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-8 col-md-offset-2 ">
                <h3>Détendez-vous le temps que nous vous répondons : </h3>
                <div class="container">
                  <div class="col-md-8 col-md-offset-2" id="game_2048Container">
                    <iframe src="includes/game_2048/2048_bis.html" scrolling="no" frameborder="0" style="border: 0; top:0; left:0; right:0; bottom:0; width:100%; height:100%;"></iframe>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 col-md-offset-2 ">
                <h3>Vous êtes les bienvenus :</h3>
                <div class="container margin-shifted-vertical">
                  <div class="col-md-10 col-md-offset-2">

                    <div id="mapid"></div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="half-space"></div>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-offset-5 col-md-2 margin-shifted-vertical">
            <a href="#sectionHome" id="GoBack"><img src="img/utilisables/logo.png" alt="Logo Vertigeo" width="100%"></a>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="mentionsLegalesModal" tabindex="-1" role="dialog" aria-labelledby="Mentions légales" aria-hidden="true"></div>


    <footer class="footer small">
      <div class="small lead">
        <p class="small">&#169; 2017 <a target="_blank" href="http://vertigeo.ensg.eu">Vertigéo</a> | <a href="#" data-toggle='modal' data-target='#mentionsLegalesModal'> Mentions légales</a> | <a target="_blank" href="https://github.com/Tofull/Website_Vertigeo/issues">Bug</a></p>
      </div>
    </footer>

    <script type="text/javascript" src="includes/jquery-3.1.1/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="includes/bootstrap-3.3.7/js/bootstrap.js"></script>
    <script type="text/javascript" src="includes/parallax.js-1.4.2/parallax.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script type="text/javascript" src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>
    <script type="text/javascript" src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>


    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="includes/fancybox-2.1.6/lib/jquery.mousewheel.pack.js"></script>

    <!-- Add fancyBox -->
    <script type="text/javascript" src="includes/fancybox-2.1.6/source/jquery.fancybox.pack.js?v=2.1.6"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <script type="text/javascript" src="includes/fancybox-2.1.6/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="includes/fancybox-2.1.6/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <script type="text/javascript" src="includes/fancybox-2.1.6/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


    <script type="text/javascript" src="js/config.global.js"></script>
    <script type="text/javascript" src="js/mentionsLegales.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>

  </html>
