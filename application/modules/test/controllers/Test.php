<?php

class Test extends CI_Controller {
	public function index () {
		//$result = $this->db->query("SELECT * FROM medicos ORDER BY populacao_mun DESC LIMIT 10")->result();


	}

	public function old () {
		// FIX INPUT Governo Brasileiro GeoJSON
		function fix_brazil_geojson ($geojson) {
			foreach ($geojson->features as $key => $feature) {
				$new_properties = new stdClass();
				$new_properties->equipes 	= $geojson->features[$key]->properties[0]->equipes;
				$new_properties->no_cidade 	= $geojson->features[$key]->properties[1]->no_cidade;
				$new_properties->lat 		= $geojson->features[$key]->properties[2]->lat;
				$new_properties->long 		= $geojson->features[$key]->properties[3]->long;

				$geojson->features[$key]->properties = $new_properties;
			}
			return $geojson;
		}


		// Parâmetros básicos
		$data_dir 	= getcwd().'/public/data/';
		$file 		= $data_dir.'/equipe_agentes_comunitarios_saude.json';


		// Abrir arquivo do governo de origem
		$json 		= file_get_contents($file);
		$geojson 	= json_decode($json);
		$geojson 	= fix_brazil_geojson($geojson);
		print_r($geojson->features[0]); // DEBUG


		// Escreve arquivo de destino com os FIXs
		file_put_contents(str_replace('.json', '_fix.json', $file), json_encode($geojson));


		$json 		= file_get_contents('http://localhost/saude-brasil/public/data/estados_brasil.json');
		$geojson 	= json_decode($json);
		print_r($geojson->features[0]);
	}
}