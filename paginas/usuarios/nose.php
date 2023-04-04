<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
?>
<style>
.form-slider {
  overflow: hidden;
}

.form-page {
  display: none;
}

.form-page:first-of-type {
  display: block;
}

.form-navigation {
  display: flex;
  justify-content: space-between;
  margin-top: 1rem;
}
</style>
    <?php
        include "../../modules/menu/menu_usuario.php"
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
           
              <?php
                     $id=$_POST['archivo'];
                     $idUser=$_SESSION['idUsuario'];
                     include '../funciones/archivos.php';
                     $conexion = new Traer();
                     $conexion->Data($id,$idUser);
                ?>
            </div>  
            
    </div>
    <script>
        const previousButton = document.querySelector('.previous-button');
        const nextButton = document.querySelector('.next-button');
        const formPages = document.querySelectorAll('.form-page');
        previousButton.setAttribute("disabled", "disabled");
        let currentPageIndex = 0;

        function showPage(pageIndex) {
        formPages[currentPageIndex].style.display = 'none';
        formPages[pageIndex].style.display = 'block';
        currentPageIndex = pageIndex;

        
        if (currentPageIndex === formPages.length - 1) {
            nextButton.textContent = 'Enviar';
        } else {
            nextButton.textContent = 'Siguiente';
        }
        }

        function goToPreviousPage() {
        showPage(currentPageIndex - 1);
        }

        function goToNextPage() {
        if (currentPageIndex === formPages.length - 1) {
            // Submit form
            document.querySelector('form').submit();
        } else {
            showPage(currentPageIndex + 1);
        }
        }

        previousButton.addEventListener('click', goToPreviousPage);
        nextButton.addEventListener('click', goToNextPage);
    </script>
</body>
</html>