<br><br>

  <div class="row" ng-controller="UserCtrl">
    <div>
      <form class="form-labels-on-top">
        <div class="form-title-row">
            <h1>Registrar Usuario</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Nombre</span>
                <input type="text" pattern="[A-Za-z ]*" maxlength="60" name="nombre" ng-model="user.nombre" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Identificación</span>
                <input type="number" name="identificacion" ng-model="user.cedula" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Email</span>
                <input type="email" name="email" ng-model="user.email" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Username</span>
                <input type="text" name="username" ng-model="user.username" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Password</span>
                <input type="password" name="password" ng-model="user.password" required>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Tipo</span>
                <select name="tipo" ng-model="user.tipo" required>
                    <option ng-selected="user.tipo" value="cliente">Empleado</option>
                    <option value="administrador">Administrador</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <button ng-click="addUser()">Registrar</button>
        </div>
      </form>

      <br><br>
      <div class="container-table" align="center">
        <h2>Listado de empleados</h2>

        <table class="table table-hover">
          <thead>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Username</th>
            <th>Tipo</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Cambiar</th>
            <th>Posicion</th>
            <th>Eliminar</th>
          </thead>
          <tbody>
            <tr ng-repeat="user in users">
              <td>{{user.nombre}}</td>
              <td>{{user.cedula}}</td>
              <td>{{user.username}}</td>
              <td>{{user.tipo}}</td>
              <td>{{user.email}}</td>
              <td>{{user.estado}}</td>
              <td class="option"><i ng-click="updateUser(user.id)" class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></td>
              <td class="option"><i ng-click="localizar(user.id)" class="posicionescritorio fa fa-globe fa-2x" aria-hidden="true"></i></td>
              <td class="option"><i ng-click="deleteUser(user.id)" class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></td>
            </tr>
          </tbody>
        </table>

    </div>

    <div class="mapa" align="center">
      <h2>Ubicación</h2>
      <div id="map" style="width:100%;height:400px"></div>
    </div>
  </div>
</div>
