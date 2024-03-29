
 <script type="text/javascript">

 //Funcion de validacion para que un input solo acepte letras

    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script type="text/javascript">
//Funcion de validacion para que un input solo acepte numeros.
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 37) || (keynum == 39) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<!-- <script type="text/javascript">
function validate(){
	if(document.getElementById('minchar').value.length < 5) {
		alert('El campo debe tener al menos 5 carácteres.');
		}else{
		document.getElementById('form').submit();
	}
}
</script> -->
<?php
include "../security/seguridad-secundary.php";
?>
<!-- Este es otro modal con php para ingresar datos via mysql -->
<!-- Para mayor información acerca de los modales visite www.bootstrap.com-->
<form class="form-horizontal" action="guardar.php" method="POST" accept-charset="utf-8"   autocomplete="off" role="form">
<!-- Metodo POST envia los valores a guardar.php-->
<div class="modal fade" id="modal_docente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Nuevo Docente.</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Nombres:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar el nombre del usuario." pattern=".{3,44}" name="nombre_grd"  required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Apellidos:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" placeholder="Ingresar el nombre del usuario." pattern=".{6,44}" placeholder="Ingresar apellido del usuario." title="Ingresar más de 6 letras" name="apellido_grd" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Dirección:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar dirección." pattern=".{3,44}" name="direccion_grd"  required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Teléfono:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" title="Ingresar más de 3 letras" placeholder="Ingresar el número de teléfono." pattern=".{3,44}" name="telefono_grd"  required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Email:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" minlength="5" maxlength="40" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[gmail|yahoo|hotmail|outlook]*[.][a-zA-Z]{1,5}$" title="fernando.96@yahoo.com" placeholder="Ingresar el email del docente"  name="email_grd" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">CEDULA:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" title="Ingresar más de 3 letras" placeholder="Ingresar el número de CEDULA." pattern=".{10}" name="dui_grd"  required="">

</div>
</div>
<!--<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">NIT:</label>
<div class="col-sm-9">-->
<!-- Evento solo minusculas
<input type="text" class="form-control" title="Ingresar más de 3 letras" placeholder="Ingresar el número de NIT." pattern=".{14}" name="nit_grd"  required="">
</div>
</div>
-->
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Estado:</label>
<div class="col-sm-9">
<select class="form-control" name="estado_grd" required="">
    <option value='1' selected>Activo</option>
    <option value='2'>Inactivo</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Registrar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- Modal para actualizar datos desde la bd -->

<form class="form-horizontal" action="editar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<center><h4 class="modal-title">Editar</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<input type="hidden" name="mod_id" id="mod_id" value="">

<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Nombres:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar el nombre del usuario." pattern=".{3,44}" name="mod_nombre" id="mod_nombre" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Apellidos:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" placeholder="Ingresar el nombre del usuario." pattern=".{6,44}" placeholder="Ingresar apellido del usuario." title="Ingresar más de 6 letras" name="mod_apellido" id="mod_apellido" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Dirección:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar dirección." pattern=".{3,44}" name="mod_direccion" id="mod_direccion" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Teléfono:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar el número de teléfono." pattern=".{3,44}" name="mod_telefono" id="mod_telefono" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Email:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" minlength="5" maxlength="40" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[gmail|yahoo|hotmail|outlook]*[.][a-zA-Z]{1,5}$" title="fernando.96@yahoo.com" placeholder="Ingresar el email del docente"  name="mod_email" id="mod_email" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">DUI:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar el número de DUI." pattern=".{3,44}" name="mod_dui" id="mod_dui" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">NIT:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar el número de NIT." pattern=".{3,44}" name="mod_nit" id="mod_nit" required="">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-refresh"> </span> Actualizar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<!-- Modal para desactivar un dato de x valor -->
<form class="form-horizontal" action="on_off.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_rojo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Desactivar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/warning.png">  <font size="4"> ¿Realmente desea desactivar este registro?</font>

<input type="hidden" name="mod" id="mod" value="">

<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-danger"><span class="glyphicon glyphicon-saved"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<!-- Modal para desactivar un dato de x valor -->
<form class="form-horizontal" action="on_off.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_verde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Activar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Realmente desea activar este registro?</font>
<input type="hidden" name="mod-activar" id="mod-activar" value="">

<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="glyphicon glyphicon-saved"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
