<div class="empleado-content">
  <h2>Transacciones en dia</h2>
 <table id="tabla-empleados" align="center">    
    <thead>
      <tr>
        <th>
          <a href="" ng-click="sortType = 'idTransaccion'; sortReverse = !sortReverse">
            Id transaccion
            <span ng-show="sortType == 'idTransaccion' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'idTransaccion' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'acumulado'; sortReverse = !sortReverse">
          Acumulado
            <span ng-show="sortType == 'acumulado' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'acumulado' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'fecha'; sortReverse = !sortReverse">
          fecha
            <span ng-show="sortType == 'fecha' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'fecha' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
      </tr>
    </thead>
    
    <tbody>
      <tr ng-repeat="transaccion in transaccionesDias | orderBy:sortType:sortReverse | filter:searchAcumulado">
        <td>{{transaccion.idTransaccion}}</td>
        <td>{{transaccion.acumulado}}</td>
        <td>{{transaccion.fecha}}</td>
      </tr>
    </tbody>    
  </table>

  <div class="resultados-tablas">
    <h3>Total Dia:</h3>
    <input disable  type="text" ng-model="totalDia"></input>
  </div>
</div>   


<div class="empleado-content">
 <h2>Transacciones en una semana</h2>
 <table id="tabla-empleados" align="center">    
    <thead>
      <tr>
        <th>
          <a href="" ng-click="sortType = 'idTransaccion'; sortReverse = !sortReverse">
            Id transaccion
            <span ng-show="sortType == 'idTransaccion' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'idTransaccion' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'acumulado'; sortReverse = !sortReverse">
          Acumulado
            <span ng-show="sortType == 'acumulado' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'acumulado' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'fecha'; sortReverse = !sortReverse">
          fecha
            <span ng-show="sortType == 'fecha' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'fecha' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
      </tr>
    </thead>
    
    <tbody>
      <tr ng-repeat="transaccion in transaccionesSemanas | orderBy:sortType:sortReverse | filter:searchAcumulado">
        <td>{{transaccion.idTransaccion}}</td>
        <td>{{transaccion.acumulado}}</td>
        <td>{{transaccion.fecha}}</td>
      </tr>
    </tbody>    
  </table>

  <div class="resultados-tablas">
    <h3>Total Semana:</h3>
    <input disable  type="text" ng-model="totalSemana"></input>
  </div>  
</div>   

<div class="empleado-content">


 <h2>Transacciones en un mes</h2>
 <table id="tabla-empleados" align="center">    
    <thead>
      <tr>
        <th>
          <a href="" ng-click="sortType = 'idTransaccion'; sortReverse = !sortReverse">
            Id transaccion
            <span ng-show="sortType == 'idTransaccion' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'idTransaccion' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'acumulado'; sortReverse = !sortReverse">
          Acumulado
            <span ng-show="sortType == 'acumulado' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'acumulado' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
        <th>
          <a href="" ng-click="sortType = 'fecha'; sortReverse = !sortReverse">
          fecha
            <span ng-show="sortType == 'fecha' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'fecha' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </th>
      </tr>
    </thead>
    
    <tbody>
      <tr ng-repeat="transaccion in transaccionesMeses | orderBy:sortType:sortReverse | filter:searchAcumulado">
        <td>{{transaccion.idTransaccion}}</td>
        <td>{{transaccion.acumulado}}</td>
        <td>{{transaccion.fecha}}</td>
      </tr>
    </tbody>    
  </table>
  
  <div class="resultados-tablas">
    <h3>Total mensual:</h3>
    <input disable  type="text" ng-model="totalMes"></input>
  </div>  
</div>  




