// Leitos
$.get( BASE_URL+"api/municipios_leitos", function( data ) {
  $( "#municipios-leito" ).html( data );
});

// Medicos
$.get( BASE_URL+"api/municipios_medicos", function( data ) {
  $( "#municipios-medicos" ).html( data );
});
