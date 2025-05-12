<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Donante</title>
    <link rel="stylesheet" href="/Red_Donantes/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/editar.css">
</head>
<body class="bg-light">

<div class="navbar-donantes">
    <h2>Editar Donante</h2>
</div>

<div class="container mt-5">

    <form id="formEditarDonante" class="bg-white p-4 shadow rounded">
        <input type="hidden" name="id" id="donante_id">

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

        <!-- Nuevos campos añadidos -->
        <div class="mb-3">
            <label for="dui" class="form-label">DUI</label>
            <input type="text" class="form-control" name="dui" id="dui">
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" id="edad">
        </div>

        <div class="mb-3">
            <label for="ocupacion" class="form-label">Ocupación</label>
            <input type="text" class="form-control" name="ocupacion" id="ocupacion">
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input type="number" class="form-control" name="peso" id="peso">
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-primary">Actualizar Donante</button>
            <a href="/Red_Donantes/AdminDonantes/index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
    // Obtener el ID del donante desde el path de la URL
    const path = window.location.pathname.split('/');
    const id = path[path.length - 1];  // El último segmento de la URL es el ID

    if (!id) {
        alert("ID de donante no proporcionado");
        window.location.href = "/Red_Donantes/AdminDonantes/index";
    }

    // Obtener datos del donante
    fetch(`/Red_Donantes/api/uno/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('donante_id').value = data.id;
            document.getElementById('usuario').value = data.usuario;
            document.getElementById('correo').value = data.correo;
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('telefono').value = data.telefono;
            document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
            document.getElementById('direccion').value = data.direccion;
            document.getElementById('tipo_sangre').value = data.tipo_sangre;
            document.getElementById('sexo').value = data.sexo;
            document.getElementById('ultima_donacion').value = data.ultima_donacion;
            // Nuevos campos
            document.getElementById('dui').value = data.dui;
            document.getElementById('edad').value = data.edad;
            document.getElementById('ocupacion').value = data.ocupacion;
            document.getElementById('peso').value = data.peso;
        })
        .catch(error => {
            alert("Error al obtener los datos del donante: " + error.message);
        });

    // Actualizar donante
    document.getElementById('formEditarDonante').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const datos = {
            usuario: form.usuario.value,
            correo: form.correo.value,
            nombre: form.nombre.value,
            telefono: form.telefono.value,
            fecha_nacimiento: form.fecha_nacimiento.value,
            direccion: form.direccion.value,
            tipo_sangre: form.tipo_sangre.value,
            sexo: form.sexo.value,
            ultima_donacion: form.ultima_donacion.value,
            dui: form.dui.value,
            edad: form.edad.value,
            ocupacion: form.ocupacion.value,
            peso: form.peso.value
        };

        try {
            const response = await fetch(`/red_donantes/api/donanteput/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datos)
            });

            if (response.ok) {
                alert("Donante actualizado");
                window.location.href = "/red_donantes/AdminDonantes/index";
            } else {
                const err = await response.json();
                alert("Error: " + (err.error || "No se pudo actualizar."));
            }
        } catch (err) {
            alert("Error en red: " + err.message);
        }
    });
</script>

<script src="/red_donantes/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
