<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Auth/css/register.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-elegante sticky-top">
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
                    <li class="nav-item"><a class="nav-link" href="/Red_Donantes/public/view/quienes-somos">Quiénes Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Red_Donantes/public/view/donar">Donar</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Red_Donantes/public/view/contactanos">Contáctanos</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn btn-outline-light" href="/Red_Donantes/public/view/decision">
                            <i class="fas fa-user-shield"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="register-container">
            <?php if (!empty($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <h2>Registro</h2>
            <form method="POST" action="/Red_Donantes/Auth/register">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
            <p>¿Ya tienes cuenta? <a href="/Red_Donantes/Auth/login">Iniciar Sesión</a></p>
        </div>
    </div>

</body>
</html>
