<nav class="navbar navbar-expand-sm navbar-dark bg-primary ">
    <div class="container">
        <a class="navbar-brand" href="#" target="_self"><i class="bi bi-book me-2 text-secondary"></i>NielRooQui</a>
         <ul class="navbar-nav ms-auto me-auto">
         <li class="nav-item">
            <a class="nav-link " aria-current="page" href="http://localhost/ProyectoGTH/proyecto/admin/index.php"><i class="bi bi-house me-2"></i>Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/ProyectoGTH/proyecto/admin/categoria/categoria.php"><i class="bi bi-card-list me-2"></i>Pruebas</a>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-globe2 me-2"></i>Gestion usuarios
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Listar usuarios</a></li>
                <li><a class="dropdown-item" href="http://localhost/ProyectoGTH/proyecto/config/config.php">Agregar usuarios</a></li>
                
              </ul>
            </li>
          </ul>
          <div class="col-1 ">
            <i class="bi bi-people fs-2"></i>
            <i class="fs-3 text-white"><?php echo $_SESSION['Usuario'] ;?></i>
          </div>
          <a class="nav-link" href="http://localhost/ProyectoGTH\proyecto\controller\cerrar_session.php"><button class="btn btn-outline-warning">Cerrar Sesion</button></a>
          
    </div>
</nav>