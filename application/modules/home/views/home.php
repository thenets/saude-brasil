<div class="content" id="page-home">

  <!-- Main Grid -->
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--8-col">
      <!-- Mapa Estados -->
    	<div id='mapid'></div>


      <br>

      <!-- Tabs municípios -->
      <div id="municipios">
        <div class="mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text title">Rank dos melhores municípios</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                  <a href="#leitos-panel" class="mdl-tabs__tab is-active">Leitos</a>
                  <a href="#medicos-panel" class="mdl-tabs__tab">Médicos</a>
              </div>

              <!-- Cidade com maior número de leitos / habitante -->
              <div class="mdl-tabs__panel is-active" id="leitos-panel">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                  <thead>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">#</th>
                      <th>Município</th>
                      <th>Estado</th>
                      <th>População</th>
                      <th>Leitos / 1000 Habitantes</th>
                    </tr>
                  </thead>
                  <tbody id="municipios-leito">
                  </tbody>
                </table>
              </div>

              <!-- Cidade com menu número de médicos por estado -->
              <div class="mdl-tabs__panel is-active" id="medicos-panel">

                <p>Cidade com maior número de médicos por estado</p>

                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                  <thead>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">#</th>
                      <th>Município</th>
                      <th>Estado</th>
                      <th>População</th>
                      <th>Médicos</th>
                    </tr>
                  </thead>
                  <tbody id="municipios-medicos">
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Main content -->
    <div class="mdl-cell mdl-cell--4-col">
      <home>Carregando...</home>

      <br>
      <div id="post" class="hidden">
        <div class="mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text title">Welcome</h2>
          </div>
          <div class="mdl-card__supporting-text content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Mauris sagittis pellentesque lacus eleifend lacinia...
          </div>
        </div>
      </div><!-- /#post -->
    </div>

  </div>  
</div>