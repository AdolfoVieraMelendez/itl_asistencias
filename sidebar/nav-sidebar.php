<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
</head>
<body>
    <div class="wrapper" id="body-pd">
        <header class="itl_header" id="header">
            <div class="header__toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>

            <div class="header__exit">
                <i class="fas fa-power-off"></i>
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="itl_nav">
                <div>
                    <span class="itl_logo">ITLinares</span>

                    <div class="nav__list">
                        <a href="#" class="nav__link itl_active">
                            <i class="fas fa-crown nav__icon"></i>
                            <span class="nav__name">Administradores del Sistema</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class="fas fa-briefcase nav__icon"></i>
                            <span class="nav__name">Docentes y Administrativos</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class="fas fa-clock nav__icon"></i>
                            <span class="nav__name">Horarios</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class="fas fa-user-shield nav__icon"></i>
                            <span class="nav__name">Permisos e Incapacidades</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class="fas fa-file-alt nav__icon"></i>
                            <span class="nav__name">Consultas y Reportes</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <h1>Components</h1>
    </div>
    
    
    <script src="./funcionesSidebar.js"></script>
</body>
</html>