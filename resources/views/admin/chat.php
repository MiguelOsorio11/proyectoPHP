<br><br>

<div ng-controller="ChatCtrl">

  <div class="row">
    <div class="chat-container">
      <div class="img-container">
        <img id="message" class="trigger-panel-empleados" src="../../../public/images/chat.jpg" alt="" />
      </div>
      <div class="contenedor-usuario">
        User: <span ng-model="asign.nombre">{{asign.nombre}}</span>
        <div class="difundir-mensaje">
          <form class="form-mensaje">
            <h2>Enviar Mensaje</h2>
            <textarea placeholder="" class="inputs-sign content-message" ng-model="mensaje.mensaje" rows="5" required></textarea>
            <span class="bar"></span>
            <br><br>
            <button  ng-click="sendMessage()" class="enviar-mensaje" class="btn-rp" name="button">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="container-table" align="center">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Identificación</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Selección</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Todos los usuarios</td>
            <td>000000000</td>
            <td>all@hotmail.com</td>
            <td>---</td>
            <td><i style="cursor:pointer" ng-click="setUser(0,'Todos Los Usuarios')" class="fa fa-envelope fa-2x" aria-hidden="true"></i></td>
          </tr>
          <tr ng-repeat="user in users">
            <td>{{user.nombre}}</td>
            <td>{{user.cedula}}</td>
            <td>{{user.email}}</td>
            <td>{{user.sesion}}</td>
            <td><i style="cursor:pointer" ng-click="setUser(user.id,user.nombre)" class="fa fa-envelope fa-2x" aria-hidden="true"></i></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>

</div>
