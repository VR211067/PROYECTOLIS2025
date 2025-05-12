<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Donante</title>
    <link rel="stylesheet" href="/red_donantes/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/agregar.css">
</head>
<body class="bg-light">

<!-- Navbar con título -->
<div class="navbar-donantes">
    <h2>Agregar Donante</h2>
</div>

<div class="container mt-5">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form id="formAgregarDonante" class="bg-white p-4 shadow rounded">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario*</label>
            <input type="text" class="form-control" name="usuario" id="usuario" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico*</label>
            <input type="email" class="form-control" name="correo" id="correo" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo*</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono">
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion">
        </div>

        <div class="mb-3">
            <label for="tipo_sangre" class="form-label">Tipo de sangre</label>
            <select class="form-select" name="tipo_sangre" id="tipo_sangre">
                <option value="">Seleccione</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" name="sexo" id="sexo">
                <option value="">Seleccione</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ultima_donacion" class="form-label">Última donación</label>
            <input type="date" class="form-control" name="ultima_donacion" id="ultima_donacion">
        </div>

        <!-- Contenedor para los botones -->
        <div class="form-buttons">
            <button type="submit" class="btn btn-primary">Guardar Donante</button>
            <a href="/red_donantes/AdminDonantes/index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <script>
        document.getElementById('formAgregarDonante').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const data = {
                usuario: form.usuario.value,
                correo: form.correo.value,
                nombre: form.nombre.value,
                telefono: form.telefono.value,
                fecha_nacimiento: form.fecha_nacimiento.value,
                direccion: form.direccion.value,
                tipo_sangre: form.tipo_sangre.value,
                sexo: form.sexo.value,
                ultima_donacion: form.ultima_donacion.value
            };

            try {
                const response = await fetch('/red_donantes/api/donante', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    alert('Donante agregado correctamente');
                    window.location.href = '/red_donantes/AdminDonantes/index';
                } else {
                    const err = await response.json();
                    alert('Error: ' + (err.error || 'No se pudo agregar.'));
                }
            } catch (err) {
                alert('Error en red: ' + err.message);
            }
        });
    </script>
</div>

<script src="/red_donantes/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
