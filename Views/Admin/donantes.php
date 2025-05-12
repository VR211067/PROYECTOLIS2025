<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Red_Donantes/Views/Admin/css/donantes.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<nav class="navbar-donantes">
    <h2>Gestión de Donantes</h2>
</nav>

<div class="navbar-buttons">
    <a href="/Red_Donantes/AdminDonantes/agregar" class="btn btn-primary">Agregar Donante</a>
    <a href="/Red_Donantes/AdminDonantes/aptos" class="btn btn-success">Ver Aptos</a>
    <a href="/Red_Donantes/AdminAuth/register" class="btn btn-success">Registrar Usuario</a>
    <a href="/Red_Donantes/AdminAuth/logout" class="btn btn-danger">Cerrar Sesión</a>
</div>


<div class="container mt-4">
    <!-- Filtro -->
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="filtroTipoSangre" class="form-label">Filtrar por tipo de sangre:</label>
            <select id="filtroTipoSangre" class="form-select">
                <option value="">Todos</option>
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
    </div>

    <!-- Tabla -->
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="tablaDonantes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Tipo de Sangre</th>
                    <th>Última Donación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
                <!-- Contenido cargado por JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Gráfico -->
    <h4 class="mt-5 mb-3 text-center">Estadísticas por Tipo de Sangre</h4>
    <canvas id="graficoSangre" width="600" height="300"></canvas>
</div>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', async () => {
    const tabla = document.getElementById('cuerpoTabla');
    const filtro = document.getElementById('filtroTipoSangre');
    let donantes = [];

    async function cargarDonantes() {
        const response = await fetch('/Red_Donantes/api/todos');
        donantes = await response.json();
        mostrarDonantes(donantes);
        actualizarGrafico(donantes);
    }
function sanitizarNombre(nombre) {
    return nombre
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[^A-Za-z0-9_]/g, '_');
}

async function mostrarDonantes(lista) {
    tabla.innerHTML = '';
    for (const d of lista) {
        const nombreSanitizado = sanitizarNombre(d.nombre);
        const nombreArchivo = `${nombreSanitizado}_${d.ultima_donacion}.pdf`;
        const rutaPDF = `/Red_Donantes/Public/Storage/Fichas/${nombreArchivo}`;
        
        let btnFicha;
        try {
            const res = await fetch(rutaPDF, { method: 'HEAD' });
            btnFicha = res.ok
                ? `<a href="${rutaPDF}" target="_blank" class="btn btn-primary btn-sm">Ver Entrevista</a>`
                : `<button class="btn btn-secondary btn-sm" onclick="alert('El donante no ha completado su entrevista')">Sin ficha</button>`;
        } catch {
            btnFicha = `<button class="btn btn-secondary btn-sm" onclick="alert('El donante no ha completado su entrevista')">Sin ficha</button>`;
        }

        tabla.innerHTML += `
            <tr>
                <td>${d.nombre}</td>
                <td>${d.correo}</td>
                <td>${d.sexo}</td>
                <td>${d.tipo_sangre}</td>
                <td>${d.ultima_donacion || ''}</td>
                <td>
                    <a href="/Red_Donantes/AdminDonantes/editar/${d.id}" class="btn btn-warning btn-sm">Editar</a>
                    <button onclick="eliminarDonante(${d.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    ${btnFicha}
                </td>
            </tr>`;
    }
}


    filtro.addEventListener('change', () => {
        const tipo = filtro.value;
        const filtrados = tipo ? donantes.filter(d => d.tipo_sangre === tipo) : donantes;
        mostrarDonantes(filtrados);
        actualizarGrafico(filtrados);
    });

    const ctx = document.getElementById('graficoSangre').getContext('2d');
    let chart;

    function actualizarGrafico(data) {
        const conteo = {};
        data.forEach(d => {
            conteo[d.tipo_sangre] = (conteo[d.tipo_sangre] || 0) + 1;
        });

        const labels = Object.keys(conteo);
        const valores = Object.values(conteo);

        if (chart) chart.destroy();

        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: 'Cantidad de Donantes',
                    data: valores,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    cargarDonantes();
});

function eliminarDonante(id) {
    if (confirm('¿Seguro que quieres eliminar este donante?')) {
        fetch(`/Red_Donantes/API/donanteDelete/${id}`, { method: 'DELETE' })
            .then(response => {
                if (response.ok) {
                    alert('Donante eliminado correctamente');
                    location.reload();
                } else {
                    alert('Error al eliminar el donante');
                }
            })
            .catch(() => alert('Error al conectar con el servidor'));
    }
}
</script>

</body>
</html>
