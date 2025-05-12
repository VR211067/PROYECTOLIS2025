<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donantes Registrados</title>
    <link rel="stylesheet" href="/Red_Donantes/Views/Doctor/css/Donantes.css">
    <!-- Cargar Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

<!-- Navbar superior -->
<nav class="navbar">
    <h2>Donantes Registrados</h2>
    <a href="/Red_Donantes/Doctor/logout" class="logout-btn">Cerrar sesión</a>
</nav>

<!-- Tabla de donantes -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo de Sangre</th>
            <th>Última Donación</th>
            <th>Sexo</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Ocupación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donantes as $donante): ?>
            <tr>
                <td><?= $donante['nombre'] ?></td>
                <td><?= $donante['correo'] ?></td>
                <td><?= $donante['tipo_sangre'] ?></td>
                <td><?= $donante['ultima_donacion'] ?></td>
                <td><?= $donante['sexo'] ?></td>
                <td><?= $donante['edad'] ?></td> <!-- Mostrar la edad -->
                <td><?= $donante['peso'] ?> kg</td> <!-- Mostrar el peso -->
                <td><?= $donante['ocupacion'] ?></td> <!-- Mostrar la ocupación -->
               <td>
    <a class="btn-entrevista" href="/Red_Donantes/Doctor/entrevista/<?= $donante['id'] ?>" title="Completar Entrevista">
        <i class="fas fa-clipboard-check"></i>Entrevista</a>
</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
