<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ficha de Evaluación del Donante</title>

  <link rel="stylesheet" href="/Red_Donantes/Views/Doctor/css/form.css">

</head>
<body>

<nav class="navbar">
  <div class="navbar-container">
    <h1>Ficha de Evaluación del Donante</h1>
  </div>
</nav>

  <form method="post" action="/Red_Donantes/Doctor/guardarFichaEvaluacion">
      <input type="hidden" name="usuario_id" value="<?php echo $donante['id']; ?>">

    <fieldset>
      <legend>Datos Personales</legend>
      Edad: <input type="text" name="edad"><br>
      Sexo: 
      <input type="radio" name="sexo" value="F"> Femenino
      <input type="radio" name="sexo" value="M"> Masculino<br>
      Estado Civil: 
      <input type="radio" name="estado_civil" value="S"> Soltero
      <input type="radio" name="estado_civil" value="C"> Casado
      <input type="radio" name="estado_civil" value="V"> Viudo<br>
      Donante 1ª vez:
      <input type="radio" name="primera_vez" value="si"> Sí
      <input type="radio" name="primera_vez" value="no"> No<br>
      Fecha última donación de sangre/componentes: <input type="date" name="fecha_ultima_donacion"><br>
      ¿Qué lo motivó a donar hoy?
      <select name="motivo">
        <option value="altruismo">Altruismo</option>
        <option value="amigo">Amigo</option>
        <option value="familiar">Familiar</option>
        <option value="conocido">Conocido</option>
      </select><br>
      Ocupación: <input type="text" name="ocupacion"><br>
    </fieldset>

    <fieldset>
      <legend>Cuestionario</legend>
      <ol>
        <li>¿Se siente bien de salud hoy? <input type="radio" name="q1" value="si">Sí <input type="radio" name="q1" value="no">No</li>
        <li>¿Ha recibido componentes sanguíneos o trasplante de órganos en el último año? <input type="radio" name="q2" value="si">Sí <input type="radio" name="q2" value="no">No</li>
        <li>¿Cuándo fue la última vez que viajó fuera del país? <input type="text" name="q3"> ¿Dónde?</li>
        <li>¿Alguna vez ha estado encarcelado? <input type="text" name="q4"> ¿Cuándo y cuánto tiempo?</li>
        <li>¿Alguna vez ha tenido hepatitis o ha estado en contacto con personas con hepatitis? <input type="radio" name="q5" value="si">Sí <input type="radio" name="q5" value="no">No</li>
        <li>¿Se ha sometido o se someterá en los próximos 12 meses a un procedimiento quirúrgico? <input type="radio" name="q6" value="si">Sí <input type="radio" name="q6" value="no">No</li>
        <li>¿En el último año se ha sometido a endoscopía, colonoscopía o procedimiento exploratorio? <input type="radio" name="q7" value="si">Sí <input type="radio" name="q7" value="no">No</li>
        <li>¿Ha sido vacunado recientemente? <input type="radio" name="q8" value="si">Sí <input type="radio" name="q8" value="no">No ¿Qué tipo de vacuna? <input type="text" name="q8_vacuna"></li>
        <li>¿Ha sido picado por la “Chinche Plegúdia”? <input type="radio" name="q9" value="si">Sí <input type="radio" name="q9" value="no">No</li>
        <li>¿Ha padecido Chagas, Sarp, Malaria, Leishmaniasis o fiebre amarilla? <input type="radio" name="q10" value="si">Sí <input type="radio" name="q10" value="no">No</li>
        <li>¿Ha padecido Tuberculosis? <input type="radio" name="q11" value="si">Sí <input type="radio" name="q11" value="no">No ¿Cuándo?</li>
        <li>¿Padece de enfermedades del corazón? <input type="radio" name="q12" value="si">Sí <input type="radio" name="q12" value="no">No</li>
        <li>¿Ha tenido cáncer, enfermedades de la sangre o ha padecido de sangrados? <input type="radio" name="q13" value="si">Sí <input type="radio" name="q13" value="no">No</li>
        <li>¿Ha padecido alguna vez de convulsiones? <input type="radio" name="q14" value="si">Sí <input type="radio" name="q14" value="no">No</li>
        <li>¿En los últimos 3 días ha tomado Aspirina o medicamento similar? <input type="radio" name="q15" value="si">Sí <input type="radio" name="q15" value="no">No</li>
        <li>¿Ha tomado o está tomando algún medicamento? <input type="radio" name="q16" value="si">Sí <input type="radio" name="q16" value="no">No ¿Cuál? <input type="text" name="q16_medicamento"></li>
        <li>¿Le han practicado algún procedimiento dental recientemente? <input type="radio" name="q17" value="si">Sí <input type="radio" name="q17" value="no">No ¿Cuál?</li>
        <li>¿Ha tenido fiebre, dolor de garganta, tos, gripe o diarrea en los últimos 15 días? <input type="radio" name="q18" value="si">Sí <input type="radio" name="q18" value="no">No</li>
        <li>¿Tiene algún problema renal? <input type="radio" name="q19" value="si">Sí <input type="radio" name="q19" value="no">No</li>
        <li>¿Ingiere bebidas embriagantes, licor o drogas? <input type="radio" name="q20" value="si">Sí <input type="radio" name="q20" value="no">No ¿Cuáles?</li>
        <li>¿Alguna vez ha padecido o ha sido tratado usted o su pareja por alguna ETS? <input type="radio" name="q21" value="si">Sí <input type="radio" name="q21" value="no">No ¿Cuándo?</li>
        <li>¿Dona sangre con la intención de practicarse algún examen? <input type="radio" name="q22" value="si">Sí <input type="radio" name="q22" value="no">No</li>
        <li>¿Ha tenido fiebre, inflamación de ganglios, pérdida de peso o tos persistente? <input type="radio" name="q23" value="si">Sí <input type="radio" name="q23" value="no">No</li>
        <li>¿Ha tenido usted o su pareja conductas sexuales de riesgo? <input type="radio" name="q24" value="si">Sí <input type="radio" name="q24" value="no">No</li>
        <li>¿Ha tenido relaciones sexuales con trabajadoras(es) del sexo en el último año? <input type="radio" name="q25" value="si">Sí <input type="radio" name="q25" value="no">No</li>
        <li>¿Ha tenido más de una(o) compañera(o) sexual en el último año? <input type="radio" name="q26" value="si">Sí <input type="radio" name="q26" value="no">No</li>
        <li>¿Usted o su pareja sexual usa o ha usado drogas ilícitas? <input type="radio" name="q27" value="si">Sí <input type="radio" name="q27" value="no">No</li>
        <li>¿Usted o su pareja sexual usa o ha usado agujas no estériles? <input type="radio" name="q28" value="si">Sí <input type="radio" name="q28" value="no">No</li>
        <li>¿Ha tenido relación sexual sin protección con persona infectada con VIH? <input type="radio" name="q29" value="si">Sí <input type="radio" name="q29" value="no">No</li>
        <li>¿Aceptaría volver a donar sangre? <input type="radio" name="q30" value="si">Sí <input type="radio" name="q30" value="no">No</li>
        <li>¿Recibirá algún tipo de remuneración? <input type="radio" name="q31" value="si">Sí <input type="radio" name="q31" value="no">No</li>
      </ol>

     <div id="solo-mujeres">
  <h3>Solo Donantes Mujeres</h3>
  F.U. Regla: <input type="date" name="fu_regla"><br>
  F.U. Parto o Aborto: <input type="date" name="fu_parto_aborto"><br>
  ¿En los últimos 6 meses estuvo embarazada o amamantando? 
  <input type="radio" name="embarazada" value="si">Sí 
  <input type="radio" name="embarazada" value="no">No<br>
  Fecha de última citología o VPH: <input type="date" name="citologia"><br>
  Fecha de última mamografía o USG (mayores de 40 años): <input type="date" name="mamografia">
</div>
    </fieldset>

    <fieldset>
      <legend>Evaluación Física</legend>
      ¿Inspección en brazos correcta? 
      <input type="radio" name="inspeccion_brazos" value="si"> Sí 
      <input type="radio" name="inspeccion_brazos" value="no"> No <br>
      ¿Aspecto físico adecuado? 
      <input type="radio" name="aspecto_fisico" value="si"> Sí 
      <input type="radio" name="aspecto_fisico" value="no"> No <br>
      ¿Ha comido algo hoy?
      <input type="radio" name="ha_comido" value="si"> Sí 
      <input type="radio" name="ha_comido" value="no"> No <br>
      ¿Cuántas horas ha dormido? 
      <input type="number" name="horas_dormidas" min="0" max="24"> horas
    </fieldset>

    <fieldset>
      <legend>Resultados de la Selección</legend>
      Resultado:
      <select name="resultado">
        <option value="apto">Apto</option>
        <option value="diferido">Diferido</option>
        <option value="no_apto">No Apto</option>
      </select><br><br>
      Si es diferido o no apto:
      Causa: <input type="text" name="causa"><br><br>
      En caso de diferido:
      Hasta (fecha): <input type="date" name="fecha_hasta"><br><br>

      Firma y sello del entrevistador: _______
    </fieldset>

    <br>
    <input type="submit" value="Enviar formulario">
  </form>


 <script>
document.addEventListener('DOMContentLoaded', function () {
  const seccionMujeres = document.querySelector('#solo-mujeres');
  const radiosSexo = document.querySelectorAll('input[name="sexo"]');

  // Función que muestra u oculta y habilita o deshabilita los campos según el sexo
  function actualizarSeccionMujeres(sexo) {
    const inputs = seccionMujeres.querySelectorAll('input, select, textarea');
    if (sexo === 'F') {
      seccionMujeres.style.display = 'block';
      inputs.forEach(el => el.disabled = false);
    } else {
      seccionMujeres.style.display = 'none';
      inputs.forEach(el => el.disabled = true);
    }
  }

  // Inicialmente oculta la sección y desactiva campos
  actualizarSeccionMujeres(null);

  // Escucha los cambios en los radios de sexo
  radiosSexo.forEach(radio => {
    radio.addEventListener('change', function () {
      actualizarSeccionMujeres(this.value);
    });

    // Si ya hay uno seleccionado al cargar la página
    if (radio.checked) {
      actualizarSeccionMujeres(radio.value);
    }
  });
});
</script>

</body>
</html>