
  <div class="empleado-content">
    <h2>Mensajes</h2>
    <form >      
       <div class="textarea">
       	<br><br>
       	<div id="mensajes" >
       		<div class="texto" ng-repeat="mensaje in mensajes">
       			<i class="fa fa-user fa-2x"></i> <strong>Admin:</strong>{{mensaje.mensaje}}
       		</div>
       	</div>
       </div>    

     <br>    
    </form>
  </div>
