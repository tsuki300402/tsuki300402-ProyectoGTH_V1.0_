<!DOCTYPE html>
<html lang="en">
<head>
    <title>Human's Proyect</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina de inicio">
	<link href="../../css/custom.css"  rel="stylesheet">
	<link href="../../libs/bootstrap-icons/bootstrap-icons.css"  rel="stylesheet">
	<script src="../../js/bootstrap.bundle.min.js"></script>
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

/* Cubo */
#pool{
    width: 100%;
    height: 339px;
}
#cube{
    transform-style: preserve-3d;
    width: 200px;
    height: 200px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    animation: loop 10s linear infinite;
}
#cube img{
    margin-top: 20%;
    position: absolute;
    width: 200px;
    height: 200px;
    opacity: 0.9;
    width: inherit;
}
#cube img:nth-child(1){
    transform: rotateY(0deg) translateZ(100px);
}
#cube img:nth-child(2){
    transform: rotateY(90deg) translateZ(100px);
}
#cube img:nth-child(3){
    transform: rotateY(180deg) translateZ(100px);
}
#cube img:nth-child(4){
    transform: rotateY(-90deg) translateZ(100px);
}
@keyframes loop{
    0%{
        transform: rotateX(0deg) rotateY(0deg);
        }
        100%{
            transform: rotateY(360deg);
        }
}
/*Aqui finaliza los estilos que implemento daniel*/
    </style>
</head>
<body>
    <?php include "../menu/menu.php" ?>
    <div class="container-fluid">
        <div class="row justify-content-center p-3">
            <div class="col-5 d-flex bg-success p-4">
                <div class="container bg-white text-start ">
                    <h1>Persona</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem reiciendis aperiam placeat id laboriosam provident libero! Amet distinctio porro obcaecati, modi nostrum voluptatum odio deleniti nobis suscipit. Ipsum, magnam perspiciatis!</p>
                </div>
                
            </div>
            <div class="col-5 bg-success p-4">
                <div class="container bg-white">
                    <div id="cont">
                        <div id="pool">
                            <div id="cube">
                                <img src="../../img/1.jpg" alt="">
                                <img src="../../img/1.jpg" alt="">
                                <img src="../../img/1.jpg" alt="">
                                <img src="../../img/1.jpg" alt="">
                            </div>
                        </div>
                    </div>
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
                        <img src="../../img/1.jpg" alt="">
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
                        <img src="../../img/2.jpg" alt="">
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
                        <img src="../../img/3.jpg" alt="">
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
                            <img src="../../img/2.jpg" class="d-block w-100" style="height:350px; ">
                        </div>
                        
                        <div class="carousel-item" id="second">
                            <img src="../../img/1.jpg" class="d-block w-100" style="height:350px;">
                        </div>		
                        <div class="carousel-item" id="tird">
                            <img src="../../img/6.jpg" class="d-block w-100" style="height:350px;">
                        </div>
                        <div class="carousel-item" id="forth">
                            <img src="../../img/3.jpg" class="d-block w-100" style="height:350px;">
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
                <div class="container bg-light text-center p-5 " style=" height: 100%;">
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
    <?php include 'modules\footer\footer.php' ?>
</body>
</html>