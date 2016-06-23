<?php

class Api extends CI_Controller {
	public function index () {
		echo json_encode('nothing...');
	}

  private function getEstadosLocalizacao () {
    $estados = [
      ['ACRE',                  -7.798078531355291, -70.927734375, 1],
      ['ALAGOAS',               -9.297306856327584, -36.84814453125, 1],
      ['AMAPÁ',                 2.064982495867104, -52.20703125, 1],
      ['AMAZONAS',              -2.811371193331128, -65.56640625, 1],
      ['BAHIA',                 -10.487811882056695, -42.626953125, 1],
      ['CEARÁ',                 -3.425691524418062, -39.7265625, 1],
      ['DISTRITO FEDERAL',      -15.390135715305204, -47.79052734375, 1],
      ['ESPÍRITO SANTO',        -18.60460138845525, -40.341796875, 1],
      ['GOIÁS',                 -15.538375926292048, -49.8779296875, 1],
      ['MARANHÃO',              -3.688855143147035, -45.615234375, 1],
      ['MATO GROSSO',           -12.46876014482322, -56.162109375, 1],
      ['MATO GROSSO DO SUL',    -18.562947442888312, -55.458984375, 1],
      ['MINAS GERAIS',          -17.056784609942554, -45, 1],
      ['PARÁ',                  -2.723583083348398, -53.173828125, 1],
      ['PARAÍBA',               -6.817352822622144, -36.97998046874999, 1],
      ['PARANÁ',                -23.88583769986199, -51.9873046875, 1],
      ['PERNAMBUCO',            -7.841615185204699, -38.232421875, 1],
      ['PIAUÍ',                 -6.839169626342808, -43.1982421875, 1],
      ['RIO DE JANEIRO',        -21.453068633086772, -42.5390625, 1],
      ['RIO GRANDE DO NORTE',   -5.484768018141262, -36.67236328125, 1],
      ['RIO GRANDE DO SUL',     -28.459033019728043, -53.78906249999999, 1],
      ['RONDÔNIA',              -9.492408153765531, -63.7646484375, 1],
      ['RORAIMA',               3.425691524418075, -62.05078125, 1],
      ['SANTA CATARINA',        -26.74561038219901, -50.6689453125, 1],
      ['SÃO PAULO',             -21.69826549685252, -49.1748046875, 1],
      ['SERGIPE',               -10.271681232946728, -37.3974609375, 1],
      ['TOCANTINS',             -9.817329187067783, -48.47167968749999, 1]
    ];

    return $estados;
  }


  /*
   * População de cada estado
   *
   *    @return <json>
  */
	public function estadoPopulacao () {
		$out = new stdClass();
		$out->titulo = "População por estado";
		$out->imagem = "9cx4-QowgLc";

    $out->estados = $this->getEstadosLocalizacao();

    $out->post = "São Paulo continua sendo o estado mais populoso do Brasil com crescimento acelerado, enquanto Roraima é que menos cresce em termos de população.<br>No total por região, o sudeste possui uma população de 84.465.579, o nordeste 55.794.694, sul 28.795.762, norte 16.983.485 e centro-oeste 11.814.376.";


    // Obtém dados do banco
    $result = $this->db->query("CALL estado_populacao()")->result();

    // Obtém o maior valor
    $maior = 0;
    foreach ($result as $key => $value) {
      if($value->{'SUM(populacao_mun)'} > $maior)
        $maior = $value->{'SUM(populacao_mun)'};
    }

    // Passa os valores para o output
    foreach ($result as $key => $value) {
      foreach ($out->estados as $key => &$estado) {
        // Verifica se é o mesmo estado por nome
        if($estado[0] == $value->estado){
          $estado[3] = $value->{'SUM(populacao_mun)'}/$maior*200;
          $estado[4] = "A população do estado ".$estado[0]." é ".$value->{'SUM(populacao_mun)'}." habitantes.";
        }
      }
    }

    echo json_encode($out);
	}




  /*
   * Índice de Desenvolvimento Humano de cada estado
   *
   *    @return <json>
  */
  public function estadoIDH () {
    $out = new stdClass();
    $out->titulo = "IDH por estado";
    $out->imagem = "wiyl0_FGGKo";

    $out->estados = $this->getEstadosLocalizacao();

    $out->post = "...";


    // Obtém dados do banco
    $result = $this->db->query("CALL estado_populacao()")->result();

    // Obtém o maior valor
    $maior = 0;
    foreach ($result as $key => $value) {
      if($value->{'idh'} > $maior)
        $maior = $value->{'idh'};
    }

    // Passa os valores para o output
    foreach ($result as $key => $value) {
      foreach ($out->estados as $key => &$estado) {
        // Verifica se é o mesmo estado por nome
        if($estado[0] == $value->estado){
          $estado[3] = ($value->{'idh'}-0.67)/($maior-0.67)*100;
          //echo $estado[3]."\n";
          $estado[4] = "A população do estado ".$estado[0]." possui IDH de ".$value->{'idh'}.".";
        }
      }
    }
    //exit();

    echo json_encode($out);
  }



  /*
   * Número de leitos em cada estado
   *
   *    @return <json>
  */
  public function estadoLeitos () {
    $out = new stdClass();
    $out->titulo = "Número de leitos em cada estado";
    $out->imagem = "V5QILBs4jxA";

    $out->estados = $this->getEstadosLocalizacao();

    $out->post = "...";


    // Obtém dados do banco
    $result = $this->db->query("CALL estado_leito()")->result();

    // Obtém o maior valor
    $maior = 0;
    foreach ($result as $key => $value) {
      if($value->{'SUM(razao_leito_habitante)'} > $maior)
        $maior = $value->{'SUM(razao_leito_habitante)'};
    }

    // Passa os valores para o output
    foreach ($result as $key => $value) {
      foreach ($out->estados as $key => &$estado) {
        // Verifica se é o mesmo estado por nome
        if($estado[0] == $value->estado){
          $estado[3] = $value->{'SUM(razao_leito_habitante)'}/$maior*200;
          if($estado[0] == "DISTRITO FEDERAL") $estado[3] = 3;
          $estado[4] = "O número de leitos no estado ".$estado[0]." é ".$value->{'SUM(razao_leito_habitante)'}.".";
        }
      }
    }

    echo json_encode($out);
  }


  /*
   * Médicos que atendem por meio particular por estado
   *
   *    @return <json>
  */
  public function estadoMedicosParticular () {
    $out = new stdClass();
    $out->titulo = "Médicos que atendem por meio particular por estado";
    $out->imagem = "OQMZwNd3ThU";

    $out->estados = $this->getEstadosLocalizacao();

    $out->post = "...";


    // Obtém dados do banco
    $result = $this->db->query("CALL estado_medico_pri()")->result();

    // Obtém o maior valor
    $maior = -999999999;
    foreach ($result as $key => $value) {
      if($value->{'SUM(num_medico_pri)'} > $maior)
        $maior = $value->{'SUM(num_medico_pri)'};
    }

    // Passa os valores para o output
    foreach ($result as $key => $value) {
      foreach ($out->estados as $key => &$estado) {
        // Verifica se é o mesmo estado por nome
        if($estado[0] == $value->estado){
          $estado[3] = $value->{'SUM(num_medico_pri)'}/$maior*200;
          $estado[4] = "O estado ".$estado[0]." possui ".$value->{'SUM(num_medico_pri)'}." atendendo por meio particular.";
        }
      }
    }

    echo json_encode($out);
  }




  /*
   * Médicos que atendem pelo setor público por estado
   *
   *    @return <json>
  */
  public function estadoMedicosPublico () {
    $out = new stdClass();
    $out->titulo = "Médicos que atendem pelo setor público por estado";
    $out->imagem = "OQMZwNd3ThU";

    $out->estados = $this->getEstadosLocalizacao();

    $out->post = "...";


    // Obtém dados do banco
    $result = $this->db->query("CALL estado_medico_pub()")->result();

    // Obtém o maior valor
    $maior = -999999999;
    foreach ($result as $key => $value) {
      if($value->{'SUM(razao_medico_pub_habitante)'} > $maior)
        $maior = $value->{'SUM(razao_medico_pub_habitante)'};
    }

    // Passa os valores para o output
    foreach ($result as $key => $value) {
      foreach ($out->estados as $key => &$estado) {
        // Verifica se é o mesmo estado por nome
        if($estado[0] == $value->estado){
          $estado[3] = $value->{'SUM(razao_medico_pub_habitante)'}/$maior*200;
          $estado[4] = "O estado ".$estado[0]." possui ".$value->{'SUM(razao_medico_pub_habitante)'}." atendendo por meio particular.";
        }
      }
    }

    echo json_encode($out);
  }
}