
<div class="empleado-content">
  <div id="content" align="center">
      <h2 align="center">Empleados con mas ventas</h2>
      <table class="tabla-chances" align="center">
      <thead>
        <th>Nombre Completo</th>
        <th>Cantidad de ventas</th>            
      </thead>
      <tbody>
        <tr ng-repeat="ventaCliente in ventasClientes" >
          <td>{{ventaCliente.nombre}}</td>
          <td>{{ventaCliente.numeroVenta}}</td>           
        </tr>
      </tbody>
      </table>
     
    </div>  
  </div>