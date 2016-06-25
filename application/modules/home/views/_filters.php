<div class="mdl-card mdl-shadow--2dp" id="filters">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Saúde Brasil</h2>
  </div>
  <div class="mdl-card__supporting-text">
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead class="hidden">
        <tr>
          <th class="mdl-data-table__cell--non-numeric">Filtros</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="mdl-data-table__cell--non-numeric" (click)="filter_remote('estadoIDH')">
            <i class="fa fa-medkit" aria-hidden="true"></i> IDH dos estado
          </td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric" (click)="filter_remote('estadoPopulacao')">
            <i class="fa fa-globe" aria-hidden="true"></i> População por estado
          </td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric" (click)="filter_remote('estadoLeitos')">
            <i class="fa fa-bed" aria-hidden="true"></i> Quantidade de leitos por estado
          </td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric" (click)="filter_remote('estadoMedicosParticular')">
            <i class="fa fa-user-md" aria-hidden="true"></i> Médicos com atendimento particular por estado
          </td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric" (click)="filter_remote('estadoMedicosPublico')">
            <i class="fa fa-user-md" aria-hidden="true"></i> Médicos com atendimento público por estado
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
