<?php

if (!$_SESSION["ok"])
{
  header("location:../index.php");
}
require_once("../conexion/conexion.php");
$conn = conexion();
@session_start();
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consult = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $idusu = $data['idusuario'];
    $tipo = $data['nombretipo'];
    $nombre = $data['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>UEICM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <link rel="shortcut icon" href="../img/logoSanto.ico" />
  <script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../menu/styles.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/lib/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../bootstrap/lib/style.css">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/lib/estilos.css" rel="stylesheet">
    <link href="../bootstrap/lib/style-responsive.css" rel="stylesheet">

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/lib/jquery.js"></script>
    <script src="../bootstrap/lib/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/lib/bootstrap.min.js"></script>


    <link href="../bootstrap/lib/nanoscroller.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/lib/jquery.nanoscroller.js"></script>
    <link rel="stylesheet" href="../img/galeria.css">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/estilos.css">
    </head>
    <body>
      <section id="container" class="">
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Cambiar de Navegación."></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo ">UNIDAD EDUCATIVA COMUNITARIA CIUDAD DE MACAS<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
              <li class="btn btn-default">

                <script type="text/javascript">
 /* muestra la fecha en el area local en el sistema */
var dias_semana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado");
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre", "Diciembre");
var fecha_actual = new Date();

document.write(dias_semana[fecha_actual.getDay()] + ", " + fecha_actual.getDate() + " de " + meses[fecha_actual.getMonth()] + " del " + fecha_actual.getFullYear());

</script></li></a>

            <!--logo end-->
<div class="top-menu">
  <ul class="nav pull-right top-menu">
        <!--a href="#" class="logo" data-toggle="modal" data-target="#modal_INFO">
      <i class="fa fa-th tooltips" data-placement="left" data-original-title="Acerca de.">
      </i>&nbsp;&nbsp;</a-->
      <?php if ($tipo=='Administrador'){ ?>
        <a href="../backup/generatebackup.php" class="logo">
      <i class="fa fa-database aria-hidden='true' tooltips" data-placement="left" data-original-title="Generar respaldo de base de datos.">
      </i>&nbsp;&nbsp;
    </a><?php } ?>
    <!--a href="../full-config/config.php" class="logo">
      <i class="fa fa-cogs aria-hidden='true' tooltips" data-placement="left" data-original-title="Configuración del sistema.">
      </i>&nbsp;&nbsp;
    </a>

    <a href="#" class="logo">
      <i class="fa fa-question tooltips" data-placement="left" data-original-title="Ayuda.">
      </i>&nbsp;&nbsp;
    </a>
        <a href="../recuperar/bloquear-pantalla.php" class="logo">
          <i class="fa fa-lock tooltips" data-placement="left" data-original-title="Dejémosle unos minutos.">
          </i>&nbsp;&nbsp;
        </a-->
        <a href="../recuperar/cerrar.php" class="logo">
          <i class="fa fa-sign-out tooltips" data-placement="left" data-original-title="Salir.">
          </i>&nbsp;&nbsp;
        </a>
        </ul>
        </div>
        </header>
      <!--header end-->


      <!--sidebar start-->
      <aside>
          <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none; margin-left: 0px; background: linear-gradient(to bottom, #38B857, #2679C8); ">
              <!-- sidebar menu start-->
              <?php
                /*include_once('../conexion/conexion.php');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consult = $conn->prepare("SELECT * FROM perfil where id_perfil = 1 ");
                $consult->execute();
                $data = $consult->fetch(PDO::FETCH_ASSOC);
                $url = $data['logo_url'];*/
                $url = "../img/logo.png"
               ?>
              <?php if ($tipo=='Administrador'){ ?>
                <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                  <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><?php echo $nombre; ?></h5>

                  <li class="mt">
                      <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                          <i class="fa fa-dashboard"></i>
                          <span >Inicio</span>
                      </a>
                  </li>

    <script src="../menu/scrip.js"></script>
                  <li class="sub-menu">
                    <a class="tooltips" data-placement="bottom" data-original-title="Muestra los Tipo de Usuarios." href="../tipousuario/mostrar.php"><i class="fa fa-user"></i><span>Tipo de Usuario</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros usuarios." href="../usuario/mostrar.php"><i class="fa fa-users"></i><span>Usuarios</span>
                  <span class="dcjq-icon"></span></a>
                  </li>

                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros docentes." href="../docente/mostrar.php"><i class="fa fa-user"></i><span>Docentes</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los ciclos." href="../ciclo/mostrar.php"><i class="fa fa-book"></i><span>Ciclo</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los grados." href="../grado/mostrar.php"><i class="fa fa-book"></i><span>Niveles</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las asignaturas." href="../asignatura/mostrar.php"><i class="fa fa-book"></i><span>Asignaturas</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiantes</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
              </ul>

              <?php }
               if ($tipo=='soporte'){ ?>
                <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                  <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><?php echo $nombre; ?></h5>

                  <li class="mt">
                      <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                          <i class="fa fa-dashboard"></i>
                          <span >Inicio</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros usuarios." href="../usuario/mostrar.php"><i class="fa fa-users"></i><span>Usuarios</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
              </ul>
            <?php }
             if ($tipo=='Directora'){ ?>
              <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                <h5 class="centered"><?php echo $nombre; ?></h5>

                <li class="mt">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                        <i class="fa fa-dashboard"></i>
                        <span >Inicio</span>
                    </a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros docentes." href="../docente/mostrar.php"><i class="fa fa-user"></i><span>Docente</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiante</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
                <span class="dcjq-icon"></span></a>
                </li>
            </ul>
          <?php }
           if ($tipo=='Docente'){ ?>
            <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

              <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
              <h5 class="centered"><?php echo $nombre; ?></h5>

              <li class="mt">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                      <i class="fa fa-dashboard"></i>
                      <span >Inicio</span>
                  </a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los grados." href="../grado/mostrar.php"><i class="fa fa-book"></i><span>Grado</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las asignaturas." href="../asignatura/mostrar.php"><i class="fa fa-book"></i><span>Asignatura</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiante</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
              <span class="dcjq-icon"></span></a>
              </li>
          </ul>
        <?php }
         if ($tipo=='Estudiante'){ ?>
          <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

            <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?php echo $nombre; ?></h5>

            <li class="mt">
                <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                    <i class="fa fa-dashboard"></i>
                    <span >Inicio</span>
                </a>
            </li>
            <li class="sub-menu">
              <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../Estnotas/mostrar.php"><i class="fa fa-book"></i><span>Notas</span>
            <span class="dcjq-icon"></span></a>
            </li>
        </ul>
        <?php }  ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->


      <!--main content start-->
      <section id="main-content" style="margin-left: 210px;">
      	<div class="wrapper" id="contentLoading" style="display: none;"><br>
		</div>
		<section class="wrapper contenido"><div class="row">
</div>

</section>
<form class="form-horizontal" action="#" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade bs-example-modal-lg" id="modal_INFO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Acerca del sistema.</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Acerca de los desarrolladores.</a></li></div><br />
<center>
<img src="../img/portada.jpg" width="85%" height="55%" >
</center>

</ul><br />
<center><strong>Copyright © 2024 <a href="#" target="_blank"><font color="black">UEC CIUDAD DE MACASv1.0</font></a></strong></center>


<div class="tab-content">

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<style>
  .chat-container {
  
    position: fixed;
    bottom: 20px; /* Ajusta según sea necesario */
    right: 20px; /* Ajusta según sea necesario */
    z-index: 999; /* Asegura que el chat esté encima de otros elementos */
    background-color: #fff; /* Ajusta según sea necesario */
    border: 1px solid #ccc; /* Ajusta según sea necesario */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ajusta según sea necesario */
  }

  .chat-header {
    cursor: pointer;
    background-color: #4CAF50; /* Ajusta según sea necesario */
    color: #fff; /* Ajusta según sea necesario */
    padding: 10px;
    text-align: center;
  }

  .chat-box {
    max-height: 200px; /* Ajusta según sea necesario */
    overflow-y: auto;
    padding: 10px;
  }

  .chat-input {
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #ccc; /* Ajusta según sea necesario */
  }

  #user-input {
    flex: 1;
    padding: 5px;
    margin-right: 5px;
  }

  button {
    padding: 5px 10px;
    background-color: #4CAF50; /* Ajusta según sea necesario */
    color: #fff; /* Ajusta según sea necesario */
    border: none;
    cursor: pointer;
  }
</style>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .chat-container {
            width: 300px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            display: block; /* Mostrar el contenedor por defecto */
        }

        .chat-header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .chat-box {
            height: 200px;
            overflow-y: auto;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chat-input {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #f1f1f1;
        }

        .chat-input input {
            flex: 1;
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
        }

        .chat-input button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            
            /* Agregar animación para simular el efecto de flotar */
            animation: float 0.5s infinite alternate;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-5px);
            }
        }
    </style>

</head> 
<body>

<button class="toggle-button" onclick="toggleChatContainer()">Asistente</button>

<div class="chat-container" id="chat-container">
    <div class="chat-header" onclick="toggleChat()">Asistente</div>
    <div class="chat-box" id="chat-box"></div>
    <div class="chat-input">
        <input type="text" id="user-input" placeholder="Escribe aquí..." autocomplete="off">
        <button onclick="sendMessage()">Enviar</button>
    </div>
</div>

<script>
    let chatActive = true;

    function toggleChat() {
        const chatBox = document.getElementById('chat-box');
        const chatHeader = document.querySelector('.chat-header');

        if (chatActive) {
            chatBox.innerHTML = '<p>Hola, ¿en qué puedo ayudarte hoy?</p>'; // Saludo al activar
            chatHeader.style.backgroundColor = '#ccc'; // Puedes cambiar el color al desactivar
        } else {
            chatBox.innerHTML = ''; // Restablece el contenido al activar
            chatHeader.style.backgroundColor = '#4CAF50'; // Restablece el color al activar
        }

        chatActive = !chatActive;
    }

    function sendMessage() {
        // Aquí puedes implementar la lógica para enviar mensajes del usuario al chat
        const userInput = document.getElementById('user-input').value;
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML += `<p>${userInput}</p>`;
        document.getElementById('user-input').value = ''; // Limpiar el campo de entrada después de enviar
    }

    function toggleChatContainer() {
        const chatContainer = document.getElementById('chat-container');
        chatContainer.style.display = (chatContainer.style.display === 'none' || chatContainer.style.display === '') ? 'block' : 'none';
    }
</script>

</body>
</html>
    <script src="../menu/scrip.js"></script>