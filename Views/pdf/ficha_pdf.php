<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; line-height: 1.5; }
        .section { margin-bottom: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td, th { border: 1px solid #000; padding: 4px; vertical-align: top; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Ficha de Evaluación del Donante</h1>

    <div class="section">
        <strong>Nombre:</strong> <?= htmlspecialchars($donante['nombre']) ?><br>
        <strong>Edad:</strong> <?= htmlspecialchars($datos['edad']) ?><br>
        <strong>Sexo:</strong> <?= htmlspecialchars($datos['sexo']) ?><br>
        <strong>Estado civil:</strong> <?= htmlspecialchars($datos['estado_civil']) ?><br>
        <strong>Ocupación:</strong> <?= htmlspecialchars($datos['ocupacion']) ?><br>
        <strong>¿Primera vez?:</strong> <?= $datos['primera_vez'] ? 'Sí' : 'No' ?><br>
        <strong>Fecha última donación:</strong> <?= htmlspecialchars($datos['fecha_ultima_donacion']) ?><br>
        <strong>Motivo de donación:</strong> <?= htmlspecialchars($datos['motivo']) ?><br>
    </div>

    <div class="section">
       <h3>Cuestionario Médico</h3>
<table>
    <tr><th>Pregunta</th><th>Respuesta</th></tr>
    <?php
    $preguntas = [
        'q1' => '¿Se encuentra bien de salud hoy?',
        'q2' => '¿Está tomando actualmente algún medicamento?',
        'q3' => '¿Cuál medicamento y para qué?',
        'q4' => '¿Tiene alguna enfermedad crónica?',
        'q5' => '¿Ha tenido fiebre o infecciones en los últimos 15 días?',
        'q6' => '¿Ha recibido alguna vacuna recientemente?',
        'q7' => '¿Ha recibido tratamiento dental en los últimos días?',
        'q8' => '¿Ha sido vacunado contra hepatitis B en el último año?',
        'q8_vacuna' => '¿Qué vacuna?',
        'q9' => '¿Ha tenido hepatitis, VIH/SIDA, sífilis u otra ITS?',
        'q10' => '¿Ha tenido contacto con personas con hepatitis o VIH?',
        'q11' => '¿Ha sido rechazado para donar sangre anteriormente?',
        'q12' => '¿Ha recibido transfusiones de sangre?',
        'q13' => '¿Se ha realizado tatuajes, perforaciones o acupuntura?',
        'q14' => '¿Ha tenido relaciones sexuales sin protección?',
        'q15' => '¿Tiene múltiples parejas sexuales?',
        'q16' => '¿Está tomando algún medicamento actualmente?',
        'q16_medicamento' => '¿Cuál medicamento?',
        'q17' => '¿Ha tenido contacto con sangre de otras personas?',
        'q18' => '¿Ha sido diagnosticado con malaria, chagas u otra enfermedad tropical?',
        'q19' => '¿Ha estado en zonas endémicas recientemente?',
        'q20' => '¿Ha sido sometido a cirugías recientes?',
        'q20_detalle' => '¿Qué cirugía y cuándo?',
        'q21' => '¿Tiene enfermedades cardíacas o respiratorias?',
        'q22' => '¿Ha consumido alcohol en las últimas 12 horas?',
        'q23' => '¿Ha fumado en las últimas 12 horas?',
        'q24' => '¿Está en ayunas desde hace más de 6 horas?',
        'q25' => '¿Ha dormido menos de 5 horas?',
        'q26' => '¿Padece de hipertensión o hipotensión?',
        'q27' => '¿Está tomando anticoagulantes?',
        'q28' => '¿Ha tenido convulsiones o desmayos?',
        'q29' => '¿Está en tratamiento psicológico?',
        'q30' => '¿Ha donado sangre en los últimos 3 meses?',
        'q31' => '¿Ha sido operado recientemente?',
    ];

    foreach ($preguntas as $campo => $texto) {
        if (isset($datos[$campo]) && $datos[$campo] !== '') {
            $valor = $datos[$campo];
            $respuesta = is_numeric($valor) ? ($valor ? 'Sí' : 'No') : htmlspecialchars($valor);
            echo "<tr><td>{$texto}</td><td>{$respuesta}</td></tr>";
        }
    }
    ?>
</table>

    </div>

    <div class="section">
        <h3>Evaluación Física</h3>
        <strong>Inspección de brazos:</strong> <?= $datos['inspeccion_brazos'] ? 'Sí' : 'No' ?><br>
        <strong>Aspecto físico saludable:</strong> <?= $datos['aspecto_fisico'] ? 'Sí' : 'No' ?><br>
        <strong>¿Ha comido?:</strong> <?= $datos['ha_comido'] ? 'Sí' : 'No' ?><br>
        <strong>Horas dormidas:</strong> <?= htmlspecialchars($datos['horas_dormidas']) ?><br>
    </div>

    <?php if ($datos['sexo'] === 'Femenino'): ?>
    <div class="section">
        <h3>Información femenina</h3>
        <strong>Fecha de última regla:</strong> <?= htmlspecialchars($datos['fu_regla']) ?><br>
        <strong>Fecha de parto o aborto:</strong> <?= htmlspecialchars($datos['fu_parto_aborto']) ?><br>
        <strong>¿Embarazada?:</strong> <?= $datos['embarazada'] ? 'Sí' : 'No' ?><br>
        <strong>Citología:</strong> <?= htmlspecialchars($datos['citologia']) ?><br>
        <strong>Mamografía:</strong> <?= htmlspecialchars($datos['mamografia']) ?><br>
    </div>
    <?php endif; ?>

    <div class="section">
        <h3>Resultado de Evaluación</h3>
        <strong>Resultado:</strong> <?= htmlspecialchars($datos['resultado']) ?><br>
        <?php if (!empty($datos['causa'])): ?>
            <strong>Causa:</strong> <?= htmlspecialchars($datos['causa']) ?><br>
        <?php endif; ?>
        <?php if (!empty($datos['fecha_hasta'])): ?>
            <strong>Fecha hasta:</strong> <?= htmlspecialchars($datos['fecha_hasta']) ?><br>
        <?php endif; ?>
    </div>
</body>
</html>
