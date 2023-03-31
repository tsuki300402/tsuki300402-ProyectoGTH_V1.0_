<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header ('Location: ../index.php');
    }
    $_SESSION["Usuario"];
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

        let link = document.getElementsByClassName("link");

        let liValue = 1;
        function activeLink(){
             for(l of link){
                l.classList.remove("active");
             }
             event.target.classList.add("active");
             liValue = event.target.value;
        }

        function BtnPrev(){
            if(liValue > 1){
                for(l of link){
                    l.classList.remove("active");
                } 

                liValue--;
                link[liValue-1].classList.add("active");
            }
        }
        function BtnNext(){
            if(liValue < 6){
                for(l of link){
                    l.classList.remove("active");
                } 

                liValue++;
                link[liValue-1].classList.add("active");
            }
        }
    </script>
    </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  
</body>
<style>
.conPag{
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pagination{
    display: flex;
    align-items: center;
    background-color: #fff;
    color: #383838;
    padding: 10px 40px;
    border-radius: 6px ;
}
ul{
    margin: 20px 30px;

}
ul li{
    display: inline-block;
    margin: 0 10px; 
    width: 35px;
    height: 35px;
    border-radius: 50%;
    text-align: center;
    line-height: 35px;
    cursor: pointer;
    background-position: 0 -45px;
    transition: background-position 0.5s;
}
ul li.active{
    color: #fff;
    background-image: linear-gradient(#ff4568, #ff4568);
    background-repeat: no-repeat;
    background-position: 0 0;
}
.btn1, .btn2 {
    display: flex;
    align-items: center;
    color: #383838;
    background: transparent;
    outline: none;
    border: none;
    cursor: pointer;
}
</style>
</html>