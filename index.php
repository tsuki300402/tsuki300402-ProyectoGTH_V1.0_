<?php session_start();
  $_SESSION["email"] = $_POST['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="./css/custom.css"  rel="stylesheet">
	<link href="./libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="./js/bootstrap.bundle.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./foro/estilo.css" >
  <style>
  .content {
  padding-left: 0 !important;
  padding-right: 0 !important;
  width: 100% !important;
}
    </style>
  </head>
<body>
    <?php include "./modules/menu/menu.php" ?>
    <?php
        if(isset($_SESSION["Error"])){
            echo '<div class="alert alert-danger m-0"><i class="bi bi-x-octagon-fill"></i>';
            echo $_SESSION["Error"];
            echo '</div>'; 
            session_unset();
            session_destroy();
        }
   
    ?>
                    <!--CARRUSEL-->
   <div class="row justify-content-center">
   <div class="col-4">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="./img/img.jpg" class="d-block w-100" >
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./img/img2.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="./img/img3.jpg" class="d-block w-100">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>     
    </div>      
  <hr>
<!--row-->
<div class="container-fluid">
<div class="row justify-content-center">
                   

<!--INICIO DE SESION-->
  <div class="mt-5 col-4 w-25 text-center mx-auto">
  <div class="mt-5 d-grid mx-auto  ">
    <p>
  <a class="btn btn-block btn-primary btn-lg" data-bs-toggle="collapse" href="#usu" role="button" aria-expanded="false" aria-controls="collapseExample">
    INICIO DE SESION ASPIRANTE/EMPLEADO
  </a>
  
</p>
<div class="collapse" id="usu">
    <?php include "./configuracion/index.php" ?>
</div>

<p>
  <a class="btn btn-block btn-primary btn-lg" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="collapseExample">
   INICIO DE SESION ADMINISTRADOR
  </a>
</p>
<div class="collapse" id="admin">
<?php include "./configuracion/index.php" ?>
</div>
</div>
</div>

<!--GRUPO DE BOTONES-->
<div class="mt-5 col-4 w-25 text-center mx-auto">
<div class="mt-5 d-grid mx-auto ">
  <a class="btn btn-block btn-primary btn-lg mb-3" href="http://localhost/ProyectoGTH_V1.0_/misionvision.php">Mision/vision</a>
  <a class="btn btn-block btn-primary btn-lg mb-3" href="http://localhost/ProyectoGTH_V1.0_/nosotros.php">Sobre Nosotros</a>
  <a class="btn btn-block btn-primary btn-lg mb-3" href="http://localhost/ProyectoGTH_V1.0_/modules/ubicacion/ubicacion.php">Ubicacion</a>
</div>
</div>
<!--Fin del grupo de botones-->

<!--CHAT PUBLICO-->
<div class="mt-5 col-4 mx-auto">
                    
    <div class="container text-end mt-2">
    <div class="" id="wrapper">
    <div id="menu">
     </div>
        
        <div id="chatbox"><?php
    if(file_exists("./foro/log.html") && filesize("./foro/log.html") > 0){
        $handle = fopen("./foro/log.html", "r");
        $contents = fread($handle, filesize("./foro/log.html"));
        fclose($handle);
        
        echo $contents;
    }
    ?></div>
        
</div>
<!--fin del chat publico-->

<!--Inicio del script-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Estas seguro de cerrar la sesion?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
});
</script>
<script>
//If user submits the form
$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
</script>
<script>
    //Load the file containing the chat log
	function loadLog(){		

$.ajax({
    url: "./foro/log.html",
    cache: false,
    success: function(html){		
        $("#chatbox").html(html); //Insert chat log into the #chatbox div				
      },
});
}
</script>
<script>
//Load the file containing the chat log
function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "./foro/log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
</script>
<script>
    setInterval (loadLog, 200);	//Reload file every 2500 ms or 
</script>
<!--Fin del script-->
</div>
</div>
</div>
</div>


<?php include("./modules/footer.html") ?>
</body>
</html>