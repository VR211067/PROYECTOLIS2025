<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/config.php';
    
    try {

        // consulta SQL
        $stmt = $conn->prepare("INSERT INTO donantes 
            (nombres, apellidos, tipo_documento, numero_documento, fecha_nacimiento, 
             genero, tipo_sangre, telefono, email, direccion, ciudad, peso, estatura, 
             donante_previo, fecha_ultima_donacion) 
            VALUES 
            (:nombres, :apellidos, :tipo_documento, :numero_documento, :fecha_nacimiento, 
             :genero, :tipo_sangre, :telefono, :email, :direccion, :ciudad, :peso, :estatura, 
             :donante_previo, :fecha_ultima_donacion)");
        
        
        $stmt->bindParam(':nombres', $_POST['nombres']);
        $stmt->bindParam(':apellidos', $_POST['apellidos']);
        $stmt->bindParam(':tipo_documento', $_POST['tipo_documento']);
        $stmt->bindParam(':numero_documento', $_POST['numero_documento']);
        $stmt->bindParam(':fecha_nacimiento', $_POST['fecha_nacimiento']);
        $stmt->bindParam(':genero', $_POST['genero']);
        $stmt->bindParam(':tipo_sangre', $_POST['tipo_sangre']);
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':direccion', $_POST['direccion']);
        $stmt->bindParam(':ciudad', $_POST['ciudad']);
        $stmt->bindParam(':peso', $_POST['peso']);
        $stmt->bindParam(':estatura', $_POST['estatura']);
        $stmt->bindParam(':donante_previo', $_POST['donante_previo']);
        $stmt->bindParam(':fecha_ultima_donacion', $_POST['fecha_ultima_donacion']);
        $stmt->execute();
        
        $success = "¡Gracias por registrarte como donante! Nos pondremos en contacto contigo pronto.";
    } catch(PDOException $e) {
        $error = "Error al registrar los datos: " . $e->getMessage();
    }
}

$pageTitle = "Donar Sangre";
$currentPage = 'donar';
include 'includes/header.php';
?>

<section class="hero-section-small bg-danger text-white py-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold mb-3">INFORMACIÓN</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="Index/index.php" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Donar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Video de inspiración -->
<div class="row justify-content-center mb-5">
    <div class="col-lg-10 text-center">
        <h2 class="fw-bold mb-4 text-danger">Tu sangre puede ser el milagro que alguien espera</h2>
        <div class="shadow-lg rounded-4 overflow-hidden">
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/gRdSST9WDxw?si=029PsYGzqEDZ2E8l" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <p class="text-muted mt-3"> Tú también puedes ser parte de esta cadena de esperanza.</p>
    </div>
</div>


<!-- Secciones informativas dinámicas -->
<div class="row mb-5 g-4">
    <!-- Mitos y Verdades -->
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4 h-100">
            <div class="card-body">
                <h4 class="fw-bold text-danger mb-3">Mitos y Verdades sobre Donar Sangre</h4>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-3">❌ <strong>Mito:</strong> Donar sangre engorda o adelgaza.<br>✅ <strong>Verdad:</strong> No afecta tu peso ni metabolismo.</li>
                    <li class="mb-3">❌ <strong>Mito:</strong> Si tengo tatuajes, no puedo donar.<br>✅ <strong>Verdad:</strong> Puedes donar si han pasado más de 12 meses.</li>
                    <li>❌ <strong>Mito:</strong> Solo se necesita sangre en emergencias.<br>✅ <strong>Verdad:</strong> Se usa a diario en cirugías, partos, tratamientos, etc.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ¿Cómo es el proceso? -->
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4 h-100">
            <div class="card-body">
                <h4 class="fw-bold text-danger mb-3">¿Cómo es el proceso de donación?</h4>
                <ol class="text-muted small mb-0">
                    <li><strong>Registro:</strong> Presentas tu documento y llenas un formulario.</li>
                    <li><strong>Evaluación:</strong> Se miden signos vitales y se hace entrevista médica.</li>
                    <li><strong>Donación:</strong> Dura entre 8 y 10 minutos.</li>
                    <li><strong>Recuperación:</strong> Descansas y tomas un refrigerio.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Después de donar -->
    <div class="col-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body">
                <h4 class="fw-bold text-danger text-center mb-4">Después de donar, recuerda:</h4>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="p-3 shadow-sm rounded-4 h-100 bg-light">
                            <i class="fas fa-dumbbell text-danger fs-2 mb-2"></i>
                            <h6 class="fw-bold">Evita esfuerzos físicos</h6>
                            <p class="small text-muted mb-0">No hagas ejercicio ni actividades intensas ese día.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-3 shadow-sm rounded-4 h-100 bg-light">
                            <i class="fas fa-tint text-danger fs-2 mb-2"></i>
                            <h6 class="fw-bold">Hidrátate y aliméntate</h6>
                            <p class="small text-muted mb-0">Bebe agua y come saludable después de donar.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-3 shadow-sm rounded-4 h-100 bg-light">
                            <i class="fas fa-bed text-danger fs-2 mb-2"></i>
                            <h6 class="fw-bold">Descansa si lo necesitas</h6>
                            <p class="small text-muted mb-0">Si te mareas o sientes débil, siéntate o recuéstate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Requisitos para donar -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Requisitos para donar sangre</h2>
                <p class="lead text-muted">Antes de registrarte, verifica que cumples con estos requisitos básicos</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 bg-white shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-3">
                            <i class="fas fa-user fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Edad</h5>
                        <p class="small text-muted mb-0">Tener mínimo 18 años y máximo 65 años</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 bg-white shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-3">
                            <i class="fas fa-weight fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Peso</h5>
                        <p class="small text-muted mb-0">Más de 50 kilogramos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 bg-white shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-3">
                            <i class="fas fa-heartbeat fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Salud</h5>
                        <p class="small text-muted mb-0">Buena salud general</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 bg-white shadow-lg rounded-4">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-3">
                            <i class="fas fa-clock fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Tiempo</h5>
                        <p class="small text-muted mb-0"> 3 meses desde última donación en hombres</p>
                        <p class="small text-muted mb-0"> 4 meses desde última donación en mujeres</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>