<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="/Red_Donantes/Views/Usuarios/css/perfil.css">
    <script>
        function toggleCamposPaciente() {
            const tipo = document.querySelector('input[name="tipo_donacion"]:checked');
            const pacienteCampos = document.getElementById('datosPaciente');
            if (tipo && tipo.value === 'paciente') {
                pacienteCampos.style.display = 'block';
            } else {
                pacienteCampos.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <nav class="navbar">
        <h1>Mi Perfil</h1>
    </nav>

    <div class="perfil-container">
        <form method="POST" action="/Red_Donantes/Usuarios/actualizarPerfil" enctype="multipart/form-data">
           
        <input type="hidden" name="foto_actual" value="<?= htmlspecialchars($user['foto_perfil'] ?? '') ?>">
             <label>Nombre Completo:</label>
            <input type="text" name="nombre" placeholder="Nombre" value="<?= htmlspecialchars($user['nombre'] ?? '') ?>">
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($user['fecha_nacimiento'] ?? '') ?>">
            <label>Dirección:</label>
            <textarea name="direccion" placeholder="Dirección"><?= htmlspecialchars($user['direccion'] ?? '') ?></textarea>
             <label>Tipo de sangre:</label>
            <select name="tipo_sangre" required>
                <option value="">Seleccionar tipo de sangre</option>
                <?php
                    $tipos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                    foreach ($tipos as $tipo) {
                        $selected = (isset($user['tipo_sangre']) && $user['tipo_sangre'] === $tipo) ? 'selected' : '';
                        echo "<option value=\"$tipo\" $selected>$tipo</option>";
                    }
                ?>
            </select>
            <label>DUI:</label>
            <input type="text" name="dui" placeholder="DUI (########-#)" 
                pattern="^\d{8}-\d$" 
                title="El DUI debe tener el formato ########-#" 
                required 
                value="<?= htmlspecialchars($user['dui'] ?? '') ?>">
            <label>Teléfono:</label>
            <input type="text" name="telefono" 
                placeholder="Teléfono (8 dígitos, sin guion)" 
                pattern="^[267][0-9]{7}$" 
                title="Debe ser un número de 8 dígitos que inicie con 2, 6 o 7 (ej. 71234567)" 
                required 
                value="<?= htmlspecialchars($user['telefono'] ?? '') ?>">
             <label>Ocupación:</label>
            <input type="text" name="ocupacion" placeholder="Ocupación" value="<?= htmlspecialchars($user['ocupacion'] ?? '') ?>">
             <label>Peso:</label>
            <input type="number" name="peso" placeholder="Peso (kg)" min="0" step="0.1" value="<?= htmlspecialchars($user['peso'] ?? '') ?>">
             <label>Sexo:</label>
            <select name="sexo">
                <option value="">Seleccionar sexo</option>
                <option value="M" <?= (isset($user['sexo']) && $user['sexo'] === 'M') ? 'selected' : '' ?>>Masculino</option>
                <option value="F" <?= (isset($user['sexo']) && $user['sexo'] === 'F') ? 'selected' : '' ?>>Femenino</option>
            </select>
            <label>Foto de Perfil:</label>
            <?php if (!empty($user['foto_perfil'])): ?>
                <?php if (filter_var($user['foto_perfil'], FILTER_VALIDATE_URL)): ?>
                    <img src="<?= htmlspecialchars($user['foto_perfil']) ?>" alt="Foto de perfil de Google">
                <?php else: ?>
                    <img src="/Red_Donantes/<?= htmlspecialchars($user['foto_perfil']) ?>" alt="Foto de perfil local">
                <?php endif; ?>
            <?php else: ?>
                <p>No se ha subido una foto de perfil.</p>
            <?php endif; ?>

            <input type="file" name="foto_perfil">
            <button type="submit">Actualizar Perfil</button>
        </form>

        <h3>Registrar Donación</h3>
        <form method="POST" action="/Red_Donantes/Usuarios/registrarDonacion">
            <label>Fecha de Donación:</label>
            <input type="date" name="fecha_donacion" required>

            <label>Tipo de Donación:</label>
            <label><input type="radio" name="tipo_donacion" value="voluntaria" onclick="toggleCamposPaciente()" checked> Voluntaria</label>
            <label><input type="radio" name="tipo_donacion" value="paciente" onclick="toggleCamposPaciente()"> Para Paciente</label>

            <div id="datosPaciente" style="display: none;">
                <input type="text" name="nombre_paciente" placeholder="Nombre del Paciente">
               <input type="text" name="numero_afiliacion_paciente" placeholder="Número de Afiliación del Paciente"
    pattern="^\d{9}$"
    title="Debe contener exactamente 9 dígitos (Ej. 123456789)">

            </div>

            <button type="submit">Registrar Donación</button>
        </form>

        <h3>Historial de Donaciones</h3>
        <?php if (!empty($donaciones)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de Donación</th>
                        <th>Nombre del Paciente</th>
                        <th>N° Afiliación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donaciones as $donacion): ?>
                        <tr>
                            <td><?= htmlspecialchars($donacion['fecha']) ?></td>
                            <td><?= htmlspecialchars($donacion['tipo_donacion']) ?></td>
                            <td><?= htmlspecialchars($donacion['nombre_paciente'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($donacion['numero_afiliacion_paciente'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay donaciones registradas.</p>
        <?php endif; ?>

        <p style="text-align: center; margin-top: 20px;"><a href="/Red_Donantes/Auth/logout">Cerrar sesión</a></p>
    </div>

    <script>toggleCamposPaciente();</script>

    <script>
    toggleCamposPaciente();

    document.querySelector('form[action="/Red_Donantes/Usuarios/actualizarPerfil"]').addEventListener('submit', function (e) {
        const dui = this.dui.value.trim();
        const tel = this.telefono.value.trim();

        const regexDui = /^\d{8}-\d$/;
        const regexTel = /^[267][0-9]{7}$/; // Teléfono sin guion, 8 dígitos, empieza con 2, 6 o 7

        if (!regexDui.test(dui)) {
            alert("El DUI debe tener el formato ########-#");
            e.preventDefault();
            return;
        }

        if (!regexTel.test(tel)) {
            alert("El teléfono debe tener 8 dígitos, iniciar con 2, 6 o 7 (sin guion). Ej: 71234567");
            e.preventDefault();
            return;
        }
    });

    document.querySelector('form[action="/Red_Donantes/Usuarios/registrarDonacion"]').addEventListener('submit', function (e) {
    const tipo = document.querySelector('input[name="tipo_donacion"]:checked').value;
    if (tipo === 'paciente') {
        const afiliacion = this.numero_afiliacion_paciente.value.trim();
        const regexAfiliacion = /^\d{9}$/;

        if (!regexAfiliacion.test(afiliacion)) {
            alert("El número de afiliación debe tener exactamente 9 dígitos (Ej: 123456789).");
            e.preventDefault();
            return;
        }
    }
});

    </script>

</body>
</html>
