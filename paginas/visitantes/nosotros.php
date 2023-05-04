<?php include "../../modules/menu/menu.php" ?>
    <style>
        /* Tarjeta */
.card {
    position: relative;
    width: 300px;
    height: 350px;
    border: 0px solid #fff;
}

.card .face{
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 10px;
    overflow: hidden;
    transition: .5s;
}

.card .front{
    transform: perspective(600px) rotateY(0deg);
    box-shadow: 0 5px 10px #000;
}

.card .front img{
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.card .front h3{
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 45px;
    line-height: 45px;
    color: #fff;
    background: rgba(0, 0, 0, .4);
    text-align: center;
}

.card .back {
    transform: perspective(600px) rotateY(-180deg);
    background: rgb(3, 35, 54);
    padding: 15px;
    color: #f3f3f3;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    box-shadow: 0 5px 10px #000;
}

.card .back .link{
    border-top: solid 3px #f3f3f3;
    height: 50px;
    line-height: 50px;

}

.card .back .link a{
    color: #f3f3f3;
}

.card .back h3{
    font-size: 30px;
    margin-top: 20px;
    letter-spacing: 2px;
}

.card:hover .front{
    transform: perspective(600px) rotateY(-180deg);
}
.card:hover .back{
    transform: perspective(600px) rotateY(-360deg);
}


/*Aqui finaliza los estilos que implemento daniel*/
    </style>
    
    <div class="container mt-4">
        <div class="row justify-content-center p-3">
            <div class="col-5 d-flex bg-success p-4">
                <div class="container bg-white text-start ">
                    <h1>Persona</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem reiciendis aperiam placeat id laboriosam provident libero! Amet distinctio porro obcaecati, modi nostrum voluptatum odio deleniti nobis suscipit. Ipsum, magnam perspiciatis!</p>
                </div>
                
            </div>
           
        </div>
    </div>
    <div class="container-fluid p-5 text-center">
        <h1>Proyectos</h1>
        <div class="row mt-4 justify-content-center">
            <div class="col-3">
                <div class="card border-0">
                    <div class="face front">
                        <img src="../../img/img.jpg" alt="">
                        <h3>Black</h3>
                    </div>
                    <div class="face back">
                        <h3>Black</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci reiciendis commodi voluptatem voluptas eius repudiandae ipsa. Laborum, magni optio omnis beatae</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
            <div class="card border-0">
                    <div class="face front">
                        <img src="../../img/diseño.jpg" alt="">
                        <h3>Crash</h3>
                    </div>
                    <div class="face back">
                        <h3>Crash</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci reiciendis commodi voluptatem voluptas eius repudiandae ipsa. Laborum, magni optio omnis beatae</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
            <div class="card border-0">
                    <div class="face front">
                        <img src="../../img/fondomenuadmin.jpg" alt="">
                        <h3>Metal Slug 2</h3>
                    </div>
                    <div class="face back">
                        <h3>Metal Slug 2</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci reiciendis commodi voluptatem voluptas eius repudiandae ipsa. Laborum, magni optio omnis beatae</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-4 text-center">
        <h1>Diseños</h1>
        <div class="row mt-4 justify-content-center">
            <div class="col-4">
                <div id="slider" class="carousel slide" data-bs-ride="carousel">
                    <!--Indicadores de carrusel/slider/salideshow-->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="3"></button>
                    </div>
                    <!--Las imagenes del Carousel/Slider/slideShow-->
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="first">
                            <img src="../../img/diseño.jpg" class="d-block w-100" style="height:350px; ">
                        </div>
                        
                        <div class="carousel-item" id="second">
                            <img src="../../img/img.jpg" class="d-block w-100" style="height:350px;">
                        </div>		
                        <div class="carousel-item" id="tird">
                            <img src="../../img/logo.jpg" class="d-block w-100" style="height:350px;">
                        </div>
                        <div class="carousel-item" id="forth">
                            <img src="../../img/prueba_Salud Mental.png" class="d-block w-100" style="height:350px;">
                        </div>
                        </div>
                        <!--Controles izquierda y derecha-->
                        <button class="carousel-control-prev" type="button"
                        data-bs-target="#slider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button"
                        data-bs-target="#slider" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                </div>
            </div>
            <div class="col-5">
                <div class="container bg-light text-center p-5 " style="height: 100%;">
                    <div id="slider2" class="carousel slide" data-bs-ride="carousel">
                        <!--Las imagenes del Carousel/Slider/slideShow-->
                        <div class="container p-4">
                            <div class="container carousel-inner">
                                <div class="carousel-item active">
                                <h1>Diseño 1:</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sapiente voluptatum expedita excepturi nobis libero. Odio quod a nihil odit ullam porro, quas, nobis facilis saepe eaque provident error hic.</p>
                                </div>
                                
                                <div class="carousel-item">
                                <h1>Diseño 2: </h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sapiente voluptatum expedita excepturi nobis libero. Odio quod a nihil odit ullam porro, quas, nobis facilis saepe eaque provident error hic.</p>
                                </div>		
                                <div class="carousel-item">
                                <h1>Diseño 3: </h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sapiente voluptatum expedita excepturi nobis libero. Odio quod a nihil odit ullam porro, quas, nobis facilis saepe eaque provident error hic.</p>
                                </div>
                                <div class="carousel-item">
                                <h1>Diseño 4: </h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sapiente voluptatum expedita excepturi nobis libero. Odio quod a nihil odit ullam porro, quas, nobis facilis saepe eaque provident error hic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <button class="carousel-control-prev carousel-dark" type="button" data-bs-target="#slider2" data-bs-slide="prev"> 
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next carousel-dark" type="button"
                                data-bs-target="#slider2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../modules\footer.php' ?>
</body>
</html>