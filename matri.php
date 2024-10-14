<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Matrícula</title>
  <link rel="stylesheet" href="css/matricula.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/matricula.js"></script>
</head>

<body>

  <div class="row">
    <section class="section">
      <header>
        <h3>Inscripciones</h3>
        <h4>Separa tu cupo</h4>
      </header>
      <main>
        <form action="conection.php" method="post">

          <div class="form-section">
            <h5>Datos del Padre o Tutor</h5>
            <div class="form-item box-item">
              <input type="text" name="parent_first_name" placeholder="Nombre del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="parent_last_name" placeholder="Apellido del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="email" name="parent_email" placeholder="Correo del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorEmail"><i class="fa fa-asterisk" aria-hidden="true"></i> El correo no es válido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="parent_phone_number" placeholder="Teléfono del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
              <small class="errorChar"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe tener 10 dígitos</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="relationship_to_student" placeholder="Relación con el Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
          </div>
          <div class="form-section">
            <h5>Datos del Estudiante</h5>
            <div class="form-item box-item">
              <input type="text" name="student_first_name" placeholder="Nombre del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_last_name" placeholder="Apellido del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="email" name="student_email" placeholder="Correo del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_cedula" placeholder="Cédula del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>


            <div class="form-item box-item">
              <input type="date" name="student_date_of_birth" placeholder="Fecha de Nacimiento del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_address" placeholder="Dirección del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_city" placeholder="Ciudad del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_state" placeholder="Estado/Provincia del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="student_zip_code" placeholder="Código Postal del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <div class="form-item-triple">
                <div class="radio-label">
                  <label class="label">Género del Estudiante</label>
                </div>
                <div class="form-item">
                  <input id="Masculino" type="radio" name="student_gender" value="Masculino" required>
                  <label for="Masculino">Masculino</label>
                </div>
                <div class="form-item">
                  <input id="Femenino" type="radio" name="student_gender" value="Femenino" required>
                  <label for="Femenino">Femenino</label>
                </div>
              </div>
              <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> Escoge al menos una
                opción</small>
            </div>
            <div class="form-item box-item">
              <label for="course_id">Seleccione un curso:</label>
              <select name="course_id" id="course" required>
                <option value="">--Seleccione un curso--</option>
                <!-- Código PHP para cargar los cursos desde la base de datos -->
                <?php
                  include './conexion.php';
                  $sql_courses = "SELECT course_id, course_name, max_students, enrolled_students FROM courses";
                  $res_courses = mysqli_query($con, $sql_courses);
                  while ($row = mysqli_fetch_assoc($res_courses)) {
                      $available_slots = $row['max_students'] - $row['enrolled_students'];
                      if ($available_slots > 0) {
                        echo "<option value='{$row['course_id']}'>{$row['course_name']} - Cupos disponibles: $available_slots</option>";
                      } else {
                          echo "<option value='' disabled>{$row['course_name']} - No hay cupos disponibles</option>";
                      }
                  }
                ?>
              </select>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>

          <div class="form-section">
            <h5>Contacto de Emergencia</h5>
            <div class="form-item box-item">
              <input type="text" name="emergency_contact_name" placeholder="Nombre del Contacto de Emergencia" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="emergency_contact_phone_number" placeholder="Teléfono del Contacto de Emergencia"
                required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="relationship_to_student_emergency" placeholder="Relación con el Estudiante"
                required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
          </div>
          <div class="form-item">
            <button type="submit" class="submit">Enviar</button>
          </div>
        </form>
      </main>
      <footer>
        <p> <a href="index.html">Amparito del Buen Pastor</a></p>
      </footer>
      <i class="wave"></i>
    </section>
  </div>

</body>

</html>