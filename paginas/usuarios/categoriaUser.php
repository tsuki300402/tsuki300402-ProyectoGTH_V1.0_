<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    //$_SESSION["Usuario"];
?>

    <?php
        include "../../modules/menu/menu_usuario.php"
    ?>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 p-4">
                    
            </div>
            <div class="col-4 p-4">
                <div class="input-group">
                    <b class="input-group-text">Temas: </b>
                    <input class="form-control" name="listatemas" list="temas" id="listatemas">
                    <datalist id="temas" name="temas">
                        <option value="Matematicas">
                        <option value="Logica">
                        <option value="P. Abstracto">
                        <option value="Psicotecnicas">
                        <option value="Salud Mental">
                    </datalist>
                    <button type="button" class="btn btn-success" id="filtro" name="filtro"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row mt-5">
            <?php
                include 'pruebasU.php'; 
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
                    $('.deta p').hide();
                    $('.deta em').hide();
                    $('.deta button').hide();
                
                $('.deta').mouseleave(function(){
                    $('b.fs-5').show(300);
                    $('.deta p').hide(250);
                    $('.deta em').hide(250);
                    $('.deta button').hide(250);
                    $('.deta i.bi').removeClass('bi-chevron-up');
                    $('.deta i.bi').addClass('bi-chevron-down');
                });

                $('.deta i').click(function(){
                    var tem= $(this).attr('id');    
                    console.log(tem);
                    $('b.fs-5[name="'+tem+'"]').hide(300);
                    $('.deta[name="'+tem+'"]').fadeIn('easing',function(){
                        $('.deta[name="'+tem+'"] p').show(400);
                        $('.deta[name="'+tem+'"] em').show(400);
                        $('.deta[name="'+tem+'"] button').show(200);
                        $('.deta[name="'+tem+'"] i.bi').removeClass('bi-chevron-down');
                        $('.deta[name="'+tem+'"] i.bi').addClass('bi-chevron-up');
                       
                    });
                    
                });

            $('button#filtro').click(function(){
                var tem= $('#listatemas').val();    
                if(tem==""){
                    $(".col-3").show("easing");
                   
                }else{
                     //Ocultar productos
                    $(".col-3[name!='"+tem+"']").hide("callback");

                    //Mostrar productos
                    $("[name='"+tem+"']").show("easing");
                }

               
                
                console.log(tem);
            });
        });
    </script>
    </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  
</body>

</html>
</body>
</html>