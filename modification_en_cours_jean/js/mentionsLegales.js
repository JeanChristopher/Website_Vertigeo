/*jshint multistr: true */

$('#mentionsLegalesModal').html("<div class='modal-dialog modal-lg' role='document'>\
          <div class='modal-content'>\
              <div class='modal-header'>\
                  <h5 class='modal-title'>Mentions légales</h5>\
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>\
                    <span aria-hidden='true'>&times;</span>\
                  </button>\
              </div>\
              <div class='modal-body'>\
                  <div class='panel-group'>\
                      <div class='panel-body'>\
                          <div class='col-sm-12'>\
                            <div class='modal-mentions'></div>\
                          </div>\
                      </div>\
                  </div>\
              </div>\
              <div class='modal-footer'>\
                  <button type='button' class='btn btn-success' data-dismiss='modal'>J'ai compris</button>\
              </div>\
          </div>\
      </div>");
    $('#mentionsLegalesModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var modal = $(this);
        modal.find('.modal-mentions').html("\
        <div class='panel-group'>\
            <div class='panel-body'>\
                <div class='col-sm-12 panel panel-success' style='padding:0px;margin:auto;'>\
                    <div class='panel-heading'>\
                        <h3 class='panel-title'>Informations :</h3>\
                    </div>\
                    <div class='panel-body'>\
                        <h5>Vertigéo</h5> \
                        <p>6-8 avenue Blaise Pascal</p>\
                        <p>77420 Champs sur Marne</p>\
                        <p><a target='_about' href='mailto:vertigeo@ensg.eu'>vertigeo@ensg.eu</a></p>\
                    </div>\
                </div>\
            </div>\
        </div>\
        <div class='panel-group'>\
            <div class='panel-body'>\
                <div class='col-sm-12 panel panel-success' style='padding:0px;margin:auto;'>\
                    <div class='panel-heading'>\
                        <h3 class='panel-title'>Code source :</h3>\
                    </div>\
                    <div class='panel-body'>\
                        <p><a target='_about' href='https://github.com/Tofull/Website_Vertigeo'>https://github.com/Tofull/Website_Vertigeo</a></p>\
                    </div>\
                </div>\
            </div>\
        </div>\
        <div class='panel-group'>\
            <div class='panel-body'>\
                <div class='col-sm-12 panel panel-success' style='padding:0px;margin:auto;'>\
                    <div class='panel-heading'>\
                        <h3 class='panel-title'>Hébergeur :</h3>\
                    </div>\
                    <div class='panel-body'>\
                        <p>École Nationale des Sciences Géographiques</p> \
                    </div>\
                </div>\
            </div>\
        </div>\
        ");
    });
