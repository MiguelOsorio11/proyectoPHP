<br><br>

<div>
  <div class="row" ng-controller="LoteriaCtrl">
    <div class="container">
      <form class="form-labels-on-top">
        <div class="form-title-row">
            <h1>Agregar loteria</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Nombre</span>
                <input type="text" maxlength="60" pattern="[A-Za-z ]*" required ng-model="loteria.nombre" name="nombre">
            </label>
            <br><br>
            <label>
                <span>Serie</span>
                <input type="number" name="serie" ng-model="loteria.serie" required>
            </label>
        </div>
        <div class="form-row">
            <button ng-click="addLoteria()">Agregar</button>
        </div>
      </form>

      <div class="container-table listado-loterias">
        <h2 align="center">Listado de loterias</h2>
        <table>
          <thead >
            <tr>
              <th>Id</th>
              <th>Loteria</th>
              <th>Serie</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="loteria in loterias">
              <td>{{loteria.id}}</td>
              <td>{{loteria.nombre}}</td>
              <td>{{loteria.serie}}</td>
              <td><i style="cursor:pointer;" ng-click="deleteLoteria(loteria.id)" class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <br>
  <div class="row" ng-controller="ModoCtrl">
    <div class="container">
      <div class="container-table">
        <h2 align="center">Listado de modos de apuesta</h2>
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Tarifa</th>
              <th>Signo</th>
              <th>Estado</th>
              <th>Cambiar</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="modo in modos">
              <td>{{modo.id}}</td>
              <td>{{modo.nombre}}</td>
              <td>{{modo.tarifa}}</td>
              <td>{{modo.signo}}</td>
              <td>{{modo.habilitacion}}</td>
              <td><i style="cursor:pointer;" ng-click="updateModo(modo.id)" class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></td>
            </tr>
          </tbody>
        </table>
      </div>

      <form class="form-labels-on-top">
        <div class="form-title-row">
            <h1>Tarifas</h1>
        </div>
        <div class="form-row">
          <label>
              <span>Modo Apuesta</span>
              <select name="tipo" ng-model="modo.idModo" required>
                  <option ng-repeat="modo in modos" value="{{modo.id}}">{{modo.nombre}}</option>
              </select>
          </label>
        </div>
        <div class="form-row">
          <label>
              <span>Tarifa</span>
              <input type="number" name="tarifa" ng-model="modo.tarifa" required>
          </label>
        </div>
        <div>
            <button ng-click="setTarifa()">Asignar Tarifa</button>
        </div>
      </form>

    </div>
  </div>

  <div class="row" ng-controller="NumeroCtrl">
    <div class="container">
      <form class="form-labels-on-top">
        <div class="form-title-row">
            <h1>Bloquear numero</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Numero</span>
                <input type="number" ng-model="bloqueo.numero" name="numero" required>
            </label>
        </div>
        <div>
            <button ng-click="addBloqueo()">Bloquear</button>
        </div>
      </form>
      <div class="container-table">
        <h2 align="center">Numeros bloqueados</h2>
        <table>
          <thead>
            <tr>
              <th>Numero</th>
              <th>Desbloquear</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="bloqueo in bloqueos">
              <td>{{bloqueo.numero}}</td>
              <td><i style="cursor:pointer;" ng-click="updateBloqueo(bloqueo.id)" class="fa fa-unlock" aria-hidden="true"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
