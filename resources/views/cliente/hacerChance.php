<div class="empleado-content">

  <div class="Hacer-Chance">
   <form id="chance">
    <h3>Hacer Chance</h3>
    <div class="comboBox">
      <select id="tipo-chance" ng-model="loteria"  ng-change="getModoApuestas(loteria.id)" ng-options="loteria.nombre for loteria in loterias">
        <option value="" disabled selected>Elige Una Lotería</option>        
      </select>     
    </div>

    <div class="comboBox">
      <select id="tipo-chance" ng-change="ocultar()" ng-model="modoApuesta" ng-options="modoApuesta.nombre for modoApuesta in listaModosApuesta">
        <option value="" disabled selected>Elige el tipo de chance</option>
      </select> 
    </div>

    <div class="comboBox">     
      <select id="zoodiaco" ng-hide="oculto" ng-model="zoodiaco" ng-options="lista for lista in listaSignosZoodiaco">
        <option value="" disabled selected>Signo del Zoodiaco</option>     
      </select> 
    </div>

    <div class="group">
      <input class="inputs-sign" type="number" pattern="[0-9]{2}|[0-9]{3}|[0-9]{4}"required ng-model="numero">
      <label for="">cifras de la apuesta</label>
      <span class="bar"></span>
    </div>

    <div class="group">
      <input class="inputs-sign" ng-hide="esSerie" type="number" pattern="[0-9]{3}|[0-9]{2}"required ng-model="serie">
      <label for="">Serie a postar</label>
      <span class="bar"></span>
    </div>

    <div class="group">
      <input class="inputs-sign" type="number" pattern="[0-9]+" maxlength="30" required ng-model="valorApostar">
      <label for="">Valor apostar</label>
      <span class="bar"></span>
    </div>

    <div class="group">
      <input class="inputs-sign" type="number" ng-model="premio" pattern="[0-9]+" maxlength="30" disable /> 
      <label for="">Premio a Ganar</label>
      <span class="bar"></span>
    </div>
    <div class="group">
      <button type="submit" id="iniciar-sesion" class="btn-rp" name="button" ng-click="realizarChance()">Realizar Chance</button>
     </div>
    </form>
  </div>

<div class="Resumen-Venta">
   <form id="resumen">
    <h3>Resumen de Venta</h3>
    <div class="group">
      <input class="inputs-sign" type="text" pattern="[0-9]*" maxlength="30" required>
      <label for="">Celular</label>
      <span class="bar"></span>
    </div>
    <div>
      <table class="tabla-chances" align="center">
      <thead>
        <th>Tipo de chance</th>
        <th>Loteria</th>
        <th>Valor</th>     
      </thead>
      <tbody>
        <tr ng-repeat="venta in ventas track by $index" >
          <td>{{venta.tipoChance}}</td>
          <td>{{venta.loteria}}</td>
          <td>{{venta.valor}}</td>      
        </tr>
      </tbody>
      </table>
    </div>
    <div class="group">
      <input class="inputs-sign" type="number"  maxlength="30" disable  string-to-number  ng-model="transaccion.acumulado" >
      <label for="">acumulado</label>
      <span class="bar"></span>
    </div>
    <div class="group">
      <button type="submit" id="iniciar-sesion" class="btn-rp" name="button" ng-click="realizarVenta()">Realizar Venta</button>
    </div>
  </form>
</div>


<script type="text/javascript">
  $('.inputs-sign').on("focusout",function() {
    var inputs = document.getElementsByClassName("inputs-sign");
    var cifrasApostar =inputs[0];
    var valorApostar = inputs[1];
    var premioApuesta = inputs[2];
    var celular = inputs[3];
    var acumulado = inputs[4];

    if (cifrasApostar.value) {
      $(cifrasApostar).addClass("used");
    } else {
      $(cifrasApostar).removeClass("used");
    }
    if (valorApostar.value) {
      $(valorApostar).addClass("used");
    } else {
      $(valorApostar).removeClass("used");
    }
    if (premioApuesta.value) {
      $(premioApuesta).addClass("used");
    } else {
      $(premioApuesta).removeClass("used");
    }
    if (celular.value) {
      $(celular).addClass("used");
    } else {
      $(celular).removeClass("used");
    }
    if (acumulado.value) {
      $(acumulado).addClass("used");
    } else {
      $(acumulado).removeClass("used");
    }

  });

</script>