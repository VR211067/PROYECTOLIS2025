<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Auth/css/login.css">


<?php

$pageTitle = "Login";
$currentPage = 'login';
?>

</head>
<body>

 <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-elegante sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/Red_Donantes/public/view/index">
                <img src="/Red_Donantes/Views/Index/assets/img/donacion-logo.png" alt="Logo Donantes de Sangre" height="40" class="me-2">
                <span class="fw-bold">Centro de Donación de Sangre</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'quienes-somos' ? 'active' : ''; ?>" href="/Red_Donantes/public/view/quienes-somos">Quiénes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'donar' ? 'active' : ''; ?>" href="/Red_Donantes/public/view/donar">Donar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'contactanos' ? 'active' : ''; ?>" href="/Red_Donantes/public/view/contactanos">Contáctanos</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn btn-outline-light" href="/Red_Donantes/public/view/decision" data-bs-toggle="tooltip" title="Área de administración">
                            <i class="fas fa-user-shield"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">

    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Usuario" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit">Entrar</button>
        </form>

        <p>O iniciar sesión con:</p>
        <a href="/Red_Donantes/Auth/googleLogin">
            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" alt="Login con Google">
        </a>

        <p>¿No tienes cuenta? <a href="/Red_Donantes/Auth/register">Regístrate</a></p>
    </div>

        </div>
</body>

</html>

