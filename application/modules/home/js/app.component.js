(function(home) {
  home.AppComponent =
    ng.core.Component({
      selector: 'home',
      templateUrl: BASE_URL+'home/filters'
    })
    .Class({
      constructor: function() {
      	// Controoler logic here
        var context = this;

        // Leaflet
        //    renderiza o mapa, primeiramente sem dados
        // ==============================================================================
        var mymap = L.map('mapid').setView([-15.051542, -54.282489], 4);
        L.tileLayer('https://api.mapbox.com/styles/v1/thenets/ciprxgu19000nb2kwhts6j0lx/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGhlbmV0cyIsImEiOiJjaXBieGVlZjcwMDd3c25tN3VlYmk1OHd2In0.4TXQ-_aKM6EgjViLybD9EQ', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
            maxZoom: 6
        }).addTo(mymap);

        mymap.on('click', function(e) {
          tempLatitude = e.latlng.lat;
          tempLongitude = e.latlng.lng;

          console.log(tempLatitude+", "+tempLongitude);

        });

        
        // Variáveis
        // ==============================================================================
        var estados = [];
        var estadosCircles = [];
        var imagem = "TO69trRWlrI";



        // Function limpaMapa
        // ==============================================================================
        function limparMapa () {
          estadosCircles.forEach( function(element, index) {
            mymap.removeLayer(element);
          });
        }


        // Filter
        //    aplica os filtros com base nos JSONs obtidos
        // ==============================================================================
        this.filter_remote = function (api_method) {
          console.log(this);
          limparMapa();

          $.getJSON( BASE_URL+"api/"+api_method, function( json ) {

            // Filter
            $('#filters .mdl-card__title').attr('style', 'background-image: url("https://source.unsplash.com/'+json.imagem+'/500x300/")');
            $('#filters .mdl-card__title h2').html(json.titulo);

            // Post
            $('#post .title').html(json.titulo);
            $('#post .content').html(json.post);
            $('#post').removeClass('hidden');

            // Renderizando pontos (mapa)
            estados = json.estados;
            estados.forEach( function(estado, index) {
              // statements
              estadosCircles[index] = L.circle([estado[1], estado[2]], estado[3]*1500, {
                  color: '#ff6b03',
                  fillColor: '#ffa100',
                  fillOpacity: 0.5
              }).bindPopup(estado[4]).addTo(mymap);
            });
          });
        }



        // Bind Filter Action
        //    aplica estilo no botão clicado
        // ==============================================================================
        setTimeout(function() {
          $('#filters tbody tr').click(function(){
            $('#filters tbody tr').removeClass('active');
            $(this).addClass('active');
          });
        }, 1000);

        // ==============================================================================
      	
      }
    });
})(window.home || (window.home = {}));