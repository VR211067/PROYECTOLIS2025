<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/admin_register.css">
</head>
<body>

<!-- Navbar -->
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

<main class="main-content">
    
    <h2 class="titulo-registro">Registro de Administrador</h2>

    
    <div class="register-container">
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <label for="rol">Rol:</label>
            <select name="rol" id="rol" required>
                <option value="">Seleccione un rol</option>
                <option value="administrador">Administrador</option>
                <option value="doctor">Doctor</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
