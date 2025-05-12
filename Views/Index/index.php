<?php
$pageTitle = "Inicio";
$currentPage = 'inicio';
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section bg-danger text-white py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Dona sangre, salva vidas</h1>
                <p class="lead mb-4">Cada donación puede hacer la diferencia entre la vida y la muerte para alguien que lo necesita. Únete a nuestra comunidad de héroes anónimos.</p>
                <a href="/Red_Donantes/public/view/donar" class="btn btn-light btn-lg px-4 me-2">Quiero donar</a>
                <a href="/Red_Donantes/public/view/quienes-somos" class="btn btn-outline-light btn-lg px-4">Conoce más</a>
            </div>
            <div class="col-lg-6">
                <img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/X6227OAN7JGTTCHGHQBZXLQR2Q.jpg" alt="Persona donando sangre" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 bg-white shadow-sm py-4">
                    <div class="card-body">
                        <h2 class="display-4 text-danger fw-bold">1</h2>
                        <p class="fs-5 fw-bold">Donación</p>
                        <p class="small text-muted">Puede salvar hasta 3 vidas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 bg-white shadow-sm py-4">
                    <div class="card-body">
                        <h2 class="display-4 text-danger fw-bold">45</h2>
                        <p class="fs-5 fw-bold">Minutos</p>
                        <p class="small text-muted">Es lo que tarda el proceso</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-white shadow-sm py-4">
                    <div class="card-body">
                        <h2 class="display-4 text-danger fw-bold">112</h2>
                        <p class="fs-5 fw-bold">Días</p>
                        <p class="small text-muted">Para volver a donar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Por qué donar -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">¿Por qué donar sangre?</h2>
                <p class="lead text-muted">La sangre es un recurso irremplazable y vital para tratamientos médicos de emergencia y para personas con enfermedades crónicas.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-4">
                            <i class="fas fa-heartbeat fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Salva vidas</h5>
                        <p class="small text-muted">Tu donación puede ser la diferencia entre la vida y la muerte para pacientes en emergencias.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-4">
                            <i class="fas fa-user-md fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Apoya tratamientos</h5>
                        <p class="small text-muted">Pacientes con cáncer, cirugías complejas y enfermedades crónicas necesitan transfusiones.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-4">
                            <i class="fas fa-baby fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Ayuda a recién nacidos</h5>
                        <p class="small text-muted">Bebés prematuros y niños con anemia severa necesitan transfusiones para sobrevivir.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-danger bg-opacity-10 text-danger mb-4">
                            <i class="fas fa-heart fs-3"></i>
                        </div>
                        <h5 class="fw-bold">Beneficia tu salud</h5>
                        <p class="small text-muted">Donar sangre reduce el riesgo de enfermedades cardiovasculares y estimula la producción de nuevas células.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonios -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Historias que inspiran</h2>
                <p class="lead text-muted">Conoce las experiencias de donantes y receptores que han sido parte de esta cadena de vida.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card border-0 bg-white shadow-sm p-4 mx-auto" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center">
                                        <img src="https://img.freepik.com/vector-premium/dibujos-animados-perfil-mujer_18591-58477.jpg?w=826" class="img-fluid rounded-circle mx-auto d-block" alt="Testimonio 1" style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">María González</h5>
                                            <p class="card-text text-muted">"He donado sangre 5 veces y cada vez me siento mejor sabiendo que puedo ayudar a alguien que lo necesita. El proceso es rápido y el personal siempre es muy amable."</p>
                                            <div class="text-danger">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card border-0 bg-white shadow-sm p-4 mx-auto" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center">
                                        <img src="https://img.freepik.com/vector-premium/perfil-hombre-dibujos-animados_18591-58483.jpg" class="img-fluid rounded-circle mx-auto d-block" alt="Testimonio 2" style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Carlos Mendoza</h5>
                                            <p class="card-text text-muted">"Mi hijo necesitó transfusiones después de un accidente. Gracias a los donantes, hoy está con nosotros. Ahora dono regularmente para devolver el favor."</p>
                                            <div class="text-danger">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-danger rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-danger rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<section class="py-5 bg-danger text-white">
    <div class="container text-center py-4">
        <h2 class="fw-bold mb-4">¿Listo para hacer la diferencia?</h2>
        <p class="lead mb-4">Regístrate como donante y sé parte de esta cadena de solidaridad.</p>
        <a href="donar.php" class="btn btn-light btn-lg px-4">Donar ahora</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>