<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donantes Aptos para Donar</title>
    <link rel="stylesheet" href="/red_donantes/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/aptos.css"> <!-- Usando el mismo archivo de CSS -->
</head>
<body class="bg-light">

<!-- Navbar con título -->
<div class="navbar-donantes">
    <h2>Donantes Aptos para Donar</h2>
</div>

<div class="container mt-5">
    <div class="text-center mb-4">
        <a href="/Red_Donantes/AdminDonantes/exportarAptosPDF" target="_blank" class="btn-pdf">📄 Descargar PDF</a>
    </div>

    <!-- Tabla de Donantes Aptos -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Tipo de Sangre</th>
                    <th>Última Donación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donantes as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['nombre']) ?></td>
                    <td><?= htmlspecialchars($d['correo']) ?></td>
                    <td><?= $d['sexo'] ?></td>
                    <td><?= $d['tipo_sangre'] ?></td>
                    <td><?= $d['ultima_donacion'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace de vuelta -->
    <div class="text-center mt-4">
        <a href="/red_donantes/AdminDonantes/index" class="back-link">← Volver a todos los donantes</a>
    </div>
</div>

<script src="/red_donantes/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
