<?php
    include './login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="estilo.css" >
<link href="../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
<link href="../css/custom.css"  rel="stylesheet">
</head>
<body>
<?php include '../modules/menu/menu_usuario.php'; ?>    
<div class="container text-center mt-2">
    <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else{
    ?>
    <div class="" id="wrapper">
    <div id="menu">
    <p class="welcome">Bienvenido, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            <div style="clear:both"></div>
        </div>
        
        <div id="chatbox"><?php
    if(file_exists("log.html") && filesize("log.html") > 0){
        $handle = fopen("log.html", "r");
        $contents = fread($handle, filesize("log.html"));
        fclose($handle);
        
        echo $contents;
    }
    ?></div>
        
        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" size="63" />
            <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
        </form>
</div>
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
    url: "log.html",
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
			url: "log.html",
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
</body>
</html>
<?php
}
if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);
    header("Location: index.php"); //Redirect the user
}
?>