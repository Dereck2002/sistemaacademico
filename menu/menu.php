<?php
ob_start();
//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
  if (!$_SESSION["ok"]){
    //Direcciona a inicio /*Index.php
    header("location:../index.php");
  }
$usuario = $_SESSION['usuario'];
/*if ($user == 1) {
  echo "<script> alert('Bienvenido al sistema Sr@:  $usuario')</script>";
  echo"<meta http-equiv='refresh' content='0; url=http://localhost/EBooks/menu/menu.php'/ >";
}*/
include('../conexion/conexion.php');
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];

$conn = conexion();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $qg = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
      $qg->execute();
      $tipo = $qg->fetch(PDO::FETCH_ASSOC)['nombretipo'];
?>

   <?php

   include("principal.php");


   ?>


<!-- Imagen que muestra el menu principal-->

 <div class="form-panel">
 <div class="table-responsive">
<center><div class="responsive"><table class="responsive">
  <tr>
  <?php if ($tipo=='Directora' or $tipo=='Administrador'){ ?>
    <td><a href="../reportes/reportematricula.php"><img class="producto responsive" src="../img/reportes.png" title="reporte matriculas"  width="170px" height="130px"><br>Reportes Matriculas</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
      <a href="../reportes/reportenotas.php"><img class="producto responsive" src="../img/reportes2.png" title="reporte notas" width="170px" height="130px"><br>Reportes Calificaciones</a></td>
  <?php } ?>
  <td rowspan="20"><div id="galeria" class="">
      <a href="#"><img src="../img/portada.jpg" width="450px" alt=""></a>
      

      <p align="center">UNIDAD EDUCATIVA COMUNITARIA CIUDAD DE MACAS &copy; 2020</p>
      </div>
  </td>
  <?php if ($tipo=='Directora' or $tipo=='Administrador'){ ?>
    <td>
      <a href="../reportes/reporteañolectivo.php"><img class="producto responsive" src="../img/aula.png" title="reporte notas" width="160px" height="130px"><br>Año lectivo</a></td>
      <td>
        <a href="../usuario/mostrar.php#modal_contra"><img class="producto responsive" src="../img/contrasena.png" title="reporte notas" width="160px" height="130px"><br>Gestionar contraseñas</a></td>
  <?php } ?>

  </tr>
</center>
</table>
</div>

<style>
  
</style>
<!DOCTYPE html>
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

</script>

</body>
</html>

    </div>
    <script src="../menu/scrip.js"></script>
<?php
include("footer.php")
?>
      <!--link rel="stylesheet" type="text/css" href="../css/estilos.css"-->
