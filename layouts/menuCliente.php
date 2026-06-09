<section id="menu_horizontal" role="tabpanel" aria-labelledby="list-home-list">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Inicio -->
            <li class="nav-item active">
                <a href="#inicio" id="uno" class="nav-link navbar-text" >
                    <i class="fa fa-home"></i>
                    <span>Inicio</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                PROCESOS
            </div>

            

            <!-- Cafeteria -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCafeteria"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-coffee"></i>
                    <span>Cafeteria</span>
                </a>
                <div id="collapseCafeteria" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="?mod=Cventas">Realizar pedido</a>
 
                    </div>
                </div>
            </li>
            <!--Servicios -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServicios"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-puzzle-piece"></i>
                    <span>Servicios</span>
                </a>
                <div id="collapseServicios" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="#Servicios">Reserva</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Retos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseR"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-trophy"></i>
                    <span>Retos</span>
                </a>
                <div id="collapseR" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Componentes:</h6>
                        <a class="collapse-item" href="?mod=retos">Validados</a>
                        <a class="collapse-item" href="?mod=vs">Vs</a>
                    </div>
                </div>
            </li>

            <!-- Contactos-->
            <li class="nav-item">
                <a class="nav-link" href="?mod=contactanos">
                    <i class="fa fa-user"></i>
                    <span>Contactos</span></a>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>

        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex column">
            <div id="content">
            <?php 
                        require_once('cuerpo.php');
            ?>	
            </div>
        </div>
    </div>
</section>