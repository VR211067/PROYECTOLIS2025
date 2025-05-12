<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/admin_login.css">
</head>
<body>

<!-- Navbar elegante -->
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
                    <a class="nav-link" href="/Red_Donantes/public/view/quienes-somos">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Red_Donantes/public/view/donar">Donar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Red_Donantes/public/view/contactanos">Contáctanos</a>
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

<main class="main-content">
    <div class="login-header">
        <h2>Login</h2>
    </div>

    <div class="register-container">
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" required><br><br>

            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
