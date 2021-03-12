<!DOCTYPE html>
<html>
    <head>

     <meta charset="UTF-8" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Formulario de contacto</title>	
    
      <!-- Inicio CSS-->
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />


    <!-- script enviar datos formulario -->
      <script type="text/javascript" src="js/enviardatos.js"></script>
     <!--cierre script-->
   
    </head>
    
   <body style="background-color: #EAEBF5;">
   
     <div id="element">
     
       <h1>Datos Personales</h1>
    
        <form action="ingresar_datos" method="post" name="form_nuevo" id="form_nuevo">
         <table>
           <tr><td>
            <label>Nombre:</label></td><td> <input type="text" name="nombre" id="nombre"></td></tr>
            <tr><td><label>Apellidos:</label></td><td><input type="text" name="apellido" id="apellido"></td></tr>
          
	          <tr><td>  <label>Cédula: </label></td><td><input type="text" name="cc" id="cc"></td></tr>
	          <tr><td>  <label>Teléfono: </label></td><td><input type="text" name="telefono" id="telefono"></td></tr>
	          <tr><td>  <label>Dirección</label> </td><td><input type="text" name="direccion" id="direccion"></td></tr>
	           <tr><td> <label>Barrio: </label></td><td><input type="text" name="barrio" id="barrio"></td></tr>
	           <tr><td> <label>Ciudad:</label> </td><td><input type="text" name="ciudad" id="ciudad"></td></tr>
	           <tr><td> <label>País de Origen: </label></td><td><input type="text" name="pais" id="pais"></td></tr>
	       
                        <input type="hidden" name="form_nuevo" id="form_nuevo" value= "1">
                        <input type="hidden" name="MM_insert" value="form_nuevo">    
	            <tr><td colspan="2" align="center" id="boton"><input class="btn" type="submit" name="enviando" id="enviando" value="Guardar"></td></tr>
         </table>
        </form>
      </div>
    </body>
    
</html>
