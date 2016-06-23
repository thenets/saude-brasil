<?php

class Api extends CI_Controller {
	public function index () {
		echo json_encode('nothing...');
	}

	public function estadoPopulacao () {
		$out = new stdClass();
		$out->titulo = "População por estado";
		$out->imagem = "9cx4-QowgLc";

        $out->estados = [
          ['ACRE',                  -7.798078531355291, -70.927734375, rand(1,100)],
          ['ALAGOAS',               -9.297306856327584, -36.84814453125, rand(1,100)],
          ['AMAPÁ',                 2.064982495867104, -52.20703125, rand(1,100)],
          ['AMAZONAS',              -2.811371193331128, -65.56640625, rand(1,100)],
          ['BAHIA',                 -10.487811882056695, -42.626953125, rand(1,100)],
          ['CEARÁ',                 -3.425691524418062, -39.7265625, rand(1,100)],
          ['DISTRITO FEDERAL',      -15.390135715305204, -47.79052734375, rand(1,100)],
          ['ESPÍRITO SANTO',        -18.60460138845525, -40.341796875, rand(1,100)],
          ['GOIÁS',                 -15.538375926292048, -49.8779296875, rand(1,100)],
          ['MARANHÃO',              -3.688855143147035, -45.615234375, rand(1,100)],
          ['MATO GROSSO',           -12.46876014482322, -56.162109375, rand(1,100)],
          ['MATO GROSSO DO SUL',    -18.562947442888312, -55.458984375, rand(1,100)],
          ['MINAS GERAIS',          -17.056784609942554, -45, rand(1,100)],
          ['PARÁ',                  -2.723583083348398, -53.173828125, rand(1,100)],
          ['PARAÍBA',               -6.817352822622144, -36.97998046874999, rand(1,100)],
          ['PARANÁ',                -23.88583769986199, -51.9873046875, rand(1,100)],
          ['PERNAMBUCO',            -7.841615185204699, -38.232421875, rand(1,100)],
          ['PIAUÍ',                 -6.839169626342808, -43.1982421875, rand(1,100)],
          ['RIO DE JANEIRO',        -21.453068633086772, -42.5390625, rand(1,100)],
          ['RIO GRANDE DO NORTE',   -5.484768018141262, -36.67236328125, rand(1,100)],
          ['RIO GRANDE DO SUL',     -28.459033019728043, -53.78906249999999, rand(1,100)],
          ['RONDÔNIA',              -9.492408153765531, -63.7646484375, rand(1,100)],
          ['RORAIMA',               3.425691524418075, -62.05078125, rand(1,100)],
          ['SANTA CATARINA',        -26.74561038219901, -50.6689453125, rand(1,100)],
          ['SÃO PAULO',             -21.69826549685252, -49.1748046875, rand(1,100)],
          ['SERGIPE',               -10.271681232946728, -37.3974609375, rand(1,100)],
          ['TOCANTINS',             -9.817329187067783, -48.47167968749999, rand(1,100)]
        ];

        $out->post = "São Paulo continua sendo o estado mais populoso do Brasil com crescimento acelerado, enquanto Roraima é que menos cresce em termos de população.<br>No total por região, o sudeste possui uma população de 84.465.579, o nordeste 55.794.694, sul 28.795.762, norte 16.983.485 e centro-oeste 11.814.376.";

        echo json_encode($out);
	}
}