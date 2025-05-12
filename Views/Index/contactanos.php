<?php
// Procesar el formulario de contacto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí iría el código para procesar el formulario (enviar email, guardar en BD, etc.)
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    
    // Simulamos el envío exitoso
    $enviado = true;
}

$pageTitle = "Contáctanos";
$currentPage = 'contactanos';
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section-small bg-danger text-white py-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold mb-3">Contáctanos</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="Index/index.php" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Contáctanos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Contacto -->
<section class="py-5">
    <div class="container">
        <?php if (isset($enviado)): ?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="alert alert-success text-center">
                        <h4 class="alert-heading">¡Mensaje enviado con éxito!</h4>
                        <p>Gracias por contactarnos, <strong><?php echo htmlspecialchars($nombre); ?></strong>. Te responderemos a <strong><?php echo htmlspecialchars($email); ?></strong> lo antes posible.</p>
                        <hr>
                        <a href="Index/index.php" class="btn btn-danger">Volver al inicio</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="fw-bold mb-4">Envía un mensaje</h2>
                    <p class="text-muted mb-4">¿Tienes alguna pregunta, sugerencia o comentario? Completa el formulario y nos pondremos en contacto contigo.</p>
                    
                    <form id="contactForm" method="POST" action="contactanos.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger px-4">Enviar mensaje</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h2 class="fw-bold mb-4">Información de contacto</h2>
                            
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-danger bg-opacity-10 text-danger me-3">
                                    <i class="fas fa-map-marker-alt fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Dirección</h5>
                                    <p class="text-muted mb-0">Av. Salud 123, Distrito Médico<br>Ciudad, País</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-danger bg-opacity-10 text-danger me-3">
                                    <i class="fas fa-phone-alt fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Teléfonos</h5>
                                    <p class="text-muted mb-0">(123) 456-7890<br>(123) 555-6789</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-danger bg-opacity-10 text-danger me-3">
                                    <i class="fas fa-envelope fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Email</h5>
                                    <p class="text-muted mb-0">info@donantesdesangre.com<br>contacto@donantesdesangre.com</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start">
                                <div class="icon-box bg-danger bg-opacity-10 text-danger me-3">
                                    <i class="fas fa-clock fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Horario de atención</h5>
                                    <p class="text-muted mb-0">Lunes a Viernes: 8:00 am - 6:00 pm<br>Sábados: 9:00 am - 1:00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Mapa -->
<section class="py-0 py-lg-5 bg-light">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d-75.56190548573445!3d6.211862595501325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44282d8789caf1%3A0x8a5bf9e1a6e5a9f0!2sPlaza%20Botero!5e0!3m2!1ses!2sco!4v1620000000000!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>