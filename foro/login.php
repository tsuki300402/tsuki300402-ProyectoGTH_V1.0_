
<?php
session_start();
 
function loginForm(){
    echo'
    <div class="container text-center" id="loginform">
        <form class="form" action="index.php" method="post">
            <p>Please confirm your name to continue:</p>
            <div class="form-group mt-2">
                <label for="name">Name:</label> 
                <input type="text" class="form-control text-center" name="name" id="name" value="';
                echo $_SESSION["Usuario"];
                echo'" />
                <input class="btn btn-primary" type="submit" name="enter" id="enter" value="Enter" />
            </div>
        </form>
    </div>
    ';
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}

?>
