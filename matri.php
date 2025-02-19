<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Matrícula</title>

  <link rel="stylesheet" href="css/matricula.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <div class="row">
    <section class="section">
      <header>
        <div class="header-content">
            <div class="logo">
                <img src="img/logo.png" alt="Logo with three children's faces and text 'AMPARITO DEL BUEN PASTOR'" width="100" height="100">
            </div>
            <div class="text">
                <h1>INSTITUCION EDUCATIVA PARTICULAR<br>“AMPARITO DEL BUEN PASTOR”</h1>
                <p>Dirección: Ignacio Fernández Salvador S/N</p>
                <p>Teléfono: 0998741234 / 0998765432</p>
                <p>Email: <span class="email">adbp@yahoo.com</span></p>
                <p>PIFO, ECUADOR</p>
                <a href="aut.php" title="Autenticación">
              <i class="fas fa-user"></i>
            </a>
            </div>
        </div>
      </header>
      <main>
        <h2>
        FORMULARIO PARA MATRICULAS AÑO LECTIVO 2024 - 2025
        </h2>
        <p>
        Estimado Representante:
        </p>
        <p>
        Reciba una cordial bienvenida a la Familia Amparito del Buen Pastor.
        Somos una institución educativa cristiana con mas de 20 años de trayectoria.
        Es nuestro placer el poder servirles en el campo de la educación de su representado.
        Sepa que todos estamos comprometidos a brindarle una educación de calidad basados 
        en principios cristianos.
        </p>
        <p>Atentamente</p>
        <p>Asociación Amparito del Buen Pastor</p>
        <p>Proverbios 22:6</p>
        <p>"Instruye al niño en el camino correcto y aun en su vejez no lo abandonará."</p>
        <h4>NOTA:</h4>
        <p>La Institución tiene una política de <b>NO REEMBOLSOS</b> una vez realizado el pago.</p>

        
        <form action="insercionmatri.php" method="post">
          <div class="form-section">
            <h5>Datos del Padre o Representante</h5>
            <div class="form-item box-item">
              <input type="text" name="nombresRepresentante" placeholder="Nombre del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="apellidosRepresentante" placeholder="Apellido del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="cedulaRepresentante" placeholder="Teléfono del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
              <small class="errorChar"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe tener 10 dígitos</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="telefonoRepresentante" placeholder="Teléfono del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
              <small class="errorChar"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe tener 10 dígitos</small>
            </div>
            <div class="form-item box-item">
              <input type="email" name="emailRepresentante" placeholder="Correo del Padre/Tutor" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorEmail"><i class="fa fa-asterisk" aria-hidden="true"></i> El correo no es válido</small>
            </div>
          </div>
          <div class="form-section">
            <h5>Datos del Estudiante</h5>
            <div class="form-item box-item">
              <input type="text" name="nombresEstudiante" placeholder="Nombre del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="apellidosEstudiante" placeholder="Apellido del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="cedulaEstudiante" placeholder="Cédula del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="date" name="fechaDeNacimiento" placeholder="Fecha de Nacimiento del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="direccionEstudiante" placeholder="Dirección del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="ciudad" placeholder="Ciudad del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="estado" placeholder="Estado/Provincia del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="códigoPostal" placeholder="Código Postal del Estudiante" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
            <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> Escoge al menos una
            opción</small>
              <div class="form-item-triple">
                <div class="radio-label">
                  <label class="label">Género del Estudiante</label>
                </div>
                <div class="form-item">
                  <input id="Masculino" type="radio" name="genero" value="Masculino" required>
                  <label for="Masculino">Masculino</label>
                </div>
                <div class="form-item">
                  <input id="Femenino" type="radio" name="genero" value="Femenino" required>
                  <label for="Femenino">Femenino</label>
                </div>
              </div>
            </div>
            <div class="form-item box-item">
              <label for="idCurso">Seleccione un curso:</label>
              <select name="idCurso" id="cursos" required>
                <option value="">--Seleccione un curso--</option>
                <!-- Código PHP para cargar los cursos desde la base de datos -->
                <?php
                  include './conexion.php';
                  $sql_courses = "SELECT idCurso, nombre, cupoMaximo, estudiantesInscritos FROM cursos";
                  $res_courses = mysqli_query($con, $sql_courses);
                  while ($row = mysqli_fetch_assoc($res_courses)) {
                      $available_slots = $row['cupoMaximo'] - $row['estudiantesInscritos'];
                      if ($available_slots > 0) {
                        echo "<option value='{$row['idCurso']}'>{$row['nombre']} - Cupos disponibles: $available_slots</option>";
                      } else {
                          echo "<option value='' disabled>{$row['nombre']} - No hay cupos disponibles</option>";
                      }
                  }
                ?>
              </select>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>

          <div class="form-section">
            <h5>Contacto de Emergencia</h5>
            <div class="form-item box-item">
              <input type="text" name="telefonoEmergencia" placeholder="Teléfono del Contacto de Emergencia"
                required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
            </div>
          </div>
          <div class="form-section">
            <h5>Datos de Facturación</h5>
            <div class="form-item box-item">
              <input type="text" name="nombresApellidosFacturacion" placeholder="Nombres para la factura" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="cedulaFacturacion" placeholder="Cedula de la factura" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="emailFacturacion" placeholder="Correo de la factura" required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="telefonoFacturacion" placeholder="Teléfono de la factura"
                required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
            </div>
            <div class="form-item box-item">
              <input type="text" name="direccionFacturacion" placeholder="Dirección de la factura"
                required>
              <small class="errorReq"><i class="fa fa-asterisk" aria-hidden="true"></i> Campo requerido</small>
              <small class="errorNum"><i class="fa fa-asterisk" aria-hidden="true"></i> Debe ser un número</small>
            </div>
          </div>
          <div class="navigation-buttons">
            <button type="button" onclick="prevPage()">Anterior</button>
            <button type="button" onclick="nextPage()">Siguiente</button>
            <button type="submit" style="display: none;">Enviar</button>
          </div>
          <div class="form-item">
            <button type="submit" class="submit">Enviar</button>
          </div>
        </form>
      </main>
      <footer>
        <p> <a href="index.html">Amparito del Buen Pastor</a></p>
      </footer>
    </section>
  </div>
  <script>
      let currentPage = 0;
      const sections = document.querySelectorAll('.form-section');
      const submitButton = document.querySelector('button[type="submit"]');
      const nextButton = document.querySelector('.navigation-buttons button[onclick="nextPage()"]');
      const prevButton = document.querySelector('.navigation-buttons button[onclick="prevPage()"]');
     
      function validateForm() {
      // Reset all error messages
      document.querySelectorAll('.errorReq').forEach(function(error) {
        error.style.display = 'none';
      });

      let isValid = true;

      // Validación de correo electrónico
      const correo = document.getElementById("correoRepresentante").value;
      const correoPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!correoPattern.test(correo)) {
        document.getElementById("errorCorreo").style.display = "block";
        isValid = false;
      }

      // Validación de teléfono del representante
      const telefono = document.getElementById("telefono").value;
      const telefonoPattern = /^\d{10}$/;
      if (!telefonoPattern.test(telefono)) {
        document.getElementById("errorTelefonoRepresentante").style.display = "block";
        isValid = false;
      }

      // Validación de cédula del estudiante
      const cedula = document.getElementById("cedulaEstudiante").value;
      if (!cedulaPattern.test(cedula)) {
        document.getElementById("errorCedula").style.display = "block";
        isValid = false;
      }

      // Validación de teléfono de contacto de emergencia
      const telefonoContacto = document.getElementById("telefonoContacto").value;
      if (!telefonoPattern.test(telefonoContacto)) {
        document.getElementById("errorTelefonoContacto").style.display = "block";
        isValid = false;
      }

      return isValid;
    }
       else {
        document.getElementById("errorTelefonoRepresentante").style.display = "none";
      }

      // Validación de cédula del estudiante
      const cedulaPattern = /^\d{10}$/; // Assuming cedula should be 10 digits

      const cedula = document.getElementById("cedulaEstudiante").value;
      if (!cedulaPattern.test(cedula)) {

        document.getElementById("errorCedula").style.display = "block";
        isValid = false;
      } else {
        document.getElementById("errorCedula").style.display = "none";
      }

      // Validación de teléfono de contacto de emergencia
      const telefonoContacto = document.getElementById("telefonoContacto").value;
      if (!telefonoPattern.test(telefonoContacto)) {
        document.getElementById("errorTelefonoContacto").style.display = "block";
        isValid = false;
      } else {
        document.getElementById("errorTelefonoContacto").style.display = "none";
      }

      return isValid;
  

      function showPage(pageIndex) {
        sections.forEach((section, index) => {
          section.classList.toggle('active', index === pageIndex);
        });
        
        prevButton.style.display = pageIndex > 0 ? 'inline' : 'none';
        
        if (pageIndex === sections.length - 1) {
          nextButton.style.display = 'none';
          submitButton.style.display = 'inline';
        } else {
          nextButton.style.display = 'inline';
          submitButton.style.display = 'none';
        }
      }

      function nextPage() {
        if (currentPage < sections.length - 1) {
          currentPage++;
          showPage(currentPage);
        }
      }

      function prevPage() {
        if (currentPage > 0) {
          currentPage--;
          showPage(currentPage);
        }
      }

      showPage(currentPage);
  </script>

</body>

</html>