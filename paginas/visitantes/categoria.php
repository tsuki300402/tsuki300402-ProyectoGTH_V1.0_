    <?php
    include '../menu/menu.php'
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 p-4">
                    <input class="form-check-input" type="checkbox" name="filtro" id="filtro"> Filtro
            </div>
            <div class="col-4 p-4">
                <b>Temas: </b>
            <input class="form-control" name="listacolores" list="colores" id="listacolores">
                <datalist id="colores" name="colores">
                <option value="Matematicas">
                <option value="Logica">
                <option value="P. Abstracto">
                <option value="Psicotecnicas">
                <option value="Valor laboral">
            </datalist>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-3 bg-secondary">
                    <h2>Niveles: </h2>
                    <input class="form-check-input" type="radio" name="" id=""> Nivel 1
                    <br>
                    <input class="form-check-input" type="radio" name="" id=""> Nivel 2
                    <br>
                    <input class="form-check-input" type="radio" name="" id=""> Nivel 3
                    <br>
                    <input class="form-check-input" type="radio" name="" id=""> Nivel 4
            </div>
            <div class="col-8 ">
                    <div class="container-fluid p-4" style="border-bottom:1px solid grey;">
                        <h1>Titulo</h1>
                        <h3>Descripcion:</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cupiditate id autem repudiandae soluta quo eos possimus odit dolores tempora nam vero unde praesentium expedita dolorum fuga, quia dicta ipsum.</p>
                        <div class="text-end text-muted"><i>Nivel 1</i></div>
                    </div>
                    <a class="btn btn-success" style="margin-top:-30px; margin-left:60px;"> <i class="bi bi-lock-fill"></i> Log</a>

                    <div class="container-fluid p-4 mt-2 bg-primary" style="border-bottom:1px solid grey;">
                        <h1>Titulo</h1>
                        <h3>Descripcion:</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cupiditate id autem repudiandae soluta quo eos possimus odit dolores tempora nam vero unde praesentium expedita dolorum fuga, quia dicta ipsum.</p>
                        <div class="text-end text-muted"><i>Nivel 1</i></div>
                                      
                    </div>
                    <a class="btn btn-success" style="margin-top:-30px; margin-left:60px;"> <i class="bi bi-lock-fill"></i> Log</a>

                    <div class="container-fluid p-4 mt-2" style="border-bottom:1px solid grey;">
                        <h1>Titulo</h1>
                        <h3>Descripcion:</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cupiditate id autem repudiandae soluta quo eos possimus odit dolores tempora nam vero unde praesentium expedita dolorum fuga, quia dicta ipsum.</p>
                        <div class="text-end text-muted"><i>Nivel 1</i></div>
                                      
                    </div>
                    <a class="btn btn-success" style="margin-top:-30px; margin-left:60px;"> <i class="bi bi-lock-fill"></i> Log</a>

                    <div class="container-fluid p-4 mt-2 bg-primary" style="border-bottom:1px solid grey;">
                        <h1>Titulo</h1>
                        <h3>Descripcion:</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos cupiditate id autem repudiandae soluta quo eos possimus odit dolores tempora nam vero unde praesentium expedita dolorum fuga, quia dicta ipsum.</p>
                        <div class="text-end text-muted"><i>Nivel 1</i></div>
                                      
                    </div>
                    <a class="btn btn-success" style="margin-top:-30px; margin-left:60px;"> <i class="bi bi-lock-fill"></i> Log</a>

            </div>
        </div>
    </div>
</body>
</html>