<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Senaf</title>
</head>

<body>
  <!-- barra de navegación -->
  <nav class="navbar navbar-light bg-inverse navbar-expand-sm" style="background-color: #b1d035;">
    <!-- icono de hamburguesa -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Ocultar menu dentro de icono de hamburguesa -->
    <a class="navbar-brand" href="index.html"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <div class="navbar-nav mx-auto">
        <!-- ACA INICIA LOS BOTONES DESPLEGABLES -->
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="background-color: #546a8f;">
            Tengo ideas
          </button>
          <!-- Submenu 1 -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: #546a8f;">
            <span class="dropdown-item modal-menu">Consejos Importantes</span>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Contactarme con </a>
              <a class="dropdown-item modal-menu" href="#"> Ir a </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Mis señales de Alarma</button>
            <button class="dropdown-item modal-menu" type="button">Plan de Seguridad</button>
            <button class="dropdown-item modal-menu" type="button">Pensar o Hacer</button>
            <button class="dropdown-item modal-menu" type="button">Razones para vivir</button>
            <button class="dropdown-item modal-menu" type="button">Mis Fotos de Vida</button>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="background-color: #546a8f;">
            Me preocupa alguien
          </button>
          <!-- Submenu 2 -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: #546a8f;">
            <button class="dropdown-item modal-menu" type="button">Que hacer</button>
            <button class="dropdown-item modal-menu" type="button">Que no hacer</button>
            <button class="dropdown-item modal-menu" type="button">Contactarme</button>
            <button class="dropdown-item modal-menu" type="button">Acudir a...</button>
            <button class="dropdown-item modal-menu" type="button">Documentacion Importante</button>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="background-color: #546a8f;">
            Profecional/Familiar/Persona interesada
            <!-- Submenu 3 (se tuvo que recortar por temas de estética) -->
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: #546a8f;">
            <button class="dropdown-item modal-menu" type="button">Mitos sobre el Suicidio</button>
            <button class="dropdown-item modal-menu" type="button">Para Saber</button>
            <button class="dropdown-item modal-menu" type="button">Contactos</button>
            <button class="dropdown-item modal-menu" type="button">Bibliografia</button>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="background-color: #546a8f;">
            Informacion
          </button>
          <!-- Submenu 4 -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: #546a8f;">
            <button class="dropdown-item modal-menu" type="button">Adolescencia</button>
            <button class="dropdown-item modal-menu" type="button">Violencia</button>
            <button class="dropdown-item modal-menu" type="button">Bibliografia</button>
          </div>
        </div>
      </div>
    </div>
  </nav>


  <!-- COMIENZO EN DISPOSITIVOS MOVILES -->
  <nav>
    <!-- Menu tengo ideas -->
    <div class="modal" tabindex="-1" id="modal1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 90%;"
        style="background-color: #546a8f;">
        <div class="modal-content">
          <div class="modal-header">
            Tengo Ideas
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <button class="dropdown-item modal-menu" type="button">Consejos Importantes</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Contactarme con </a>
              <a class="dropdown-item modal-menu" href="#"> Ir a </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Mis señales de Alarma</button>
            <button class="dropdown-item modal-menu" type="button">Plan de Seguridad</button>
            <button class="dropdown-item modal-menu" type="button">Pensar o Hacer</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Cosas que me ayudan </a>
              <a class="dropdown-item modal-menu" href="#"> Cosas que no me ayudan </a>
              <a class="dropdown-item modal-menu" href="#"> Hacer cosas que me ayuden </a>
              <a class="dropdown-item modal-menu" href="#"> Evitar hacer cosas que no me ayuden </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Razones para vivir</button>
            <button class="dropdown-item modal-menu" type="button">Mis Fotos de Vida</button>
          </div>
        </div>
      </div>
    </div>
    <button class="tengo-ideas" type="button" data-toggle='modal' data-target='#modal1' aria-expanded="false">Tengo
      Ideas<img src="assets/tengo_ideas.svg" class="ideas" alt="boton para tengo ideas">
    </button>
    <!-- Menu me preocupa alguien -->
    <div class="modal" tabindex="-1" id="modal2">
      <div class="modal-dialog modal-dialog-centered" style="min-width: 90%;">
        <div class="modal-content">
          <div class="modal-header">
            Me Preocupa Alguien
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <button class="dropdown-item modal-menu" type="button">Que hacer</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Informacion </a>
              <a class="dropdown-item modal-menu" href="#"> Lista </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Que no hacer</button>
            <button class="dropdown-item modal-menu" type="button">Contactarme con </button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Teléfono </a>
              <a class="dropdown-item modal-menu" href="#"> WhatsApp </a>
              <a class="dropdown-item modal-menu" href="#"> Redes sociales </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Acudir a..</button>
            <button class="dropdown-item modal-menu" type="button">Documentacion Importante</button>
          </div>
        </div>
      </div>
    </div>
    <button class="preocupa-alguien" type="button" data-toggle='modal' data-target='#modal2' aria-expanded="false">Me
      preocupa</br><img src="assets/smiley.svg" class="preocupa" alt="boton para me preocupa alguien">alguien
    </button>
    <!-- Menu profesional/familiar -->
    <div class="modal" tabindex="-1" id="modal3">
      <div class="modal-dialog modal-dialog-centered" style="min-width: 90%;">
        <div class="modal-content">
          <div class="modal-header">
            Profesional/Familiar
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <button class="dropdown-item modal-menu" type="button">Mitos sobre el Suicidio</button>
            <button class="dropdown-item modal-menu" type="button">Para Saber</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Factor de riesgo </a>
              <a class="dropdown-item modal-menu" href="#"> Factores protectores </a>
              <a class="dropdown-item modal-menu" href="#"> Señales de alerta </a>
              <a class="dropdown-item modal-menu" href="#"> ideación y comportamiento suicida </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Contactos</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Gubernamentales </a>
              <a class="dropdown-item modal-menu" href="#"> Ong </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Bibliografia</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Ley </a>
              <a class="dropdown-item modal-menu" href="#"> Protocolos </a>
              <a class="dropdown-item modal-menu" href="#"> Principios </a>
              <a class="dropdown-item modal-menu" href="#"> Links </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <button class="profesional-familia-interesado" type="button" data-toggle='modal' data-target='#modal3'
      aria-haspopup="true" aria-expanded="false"><img src="assets/hospital.svg" class="hospital"
        alt="boton para prefecional_familia_interesados"><br>Profesional/<br>Familiar </button>
    <!-- Menu informacion -->
    <div class="modal" tabindex="-1" id="modal4">
      <div class="modal-dialog modal-dialog-centered" style="min-width: 90%;">
        <div class="modal-content">
          <div class="modal-header">
            Informacion
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <button class="dropdown-item modal-menu" type="button">Adolescencia</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Etapa de cambios </a>
              <a class="dropdown-item modal-menu" href="#"> Importancia de la edad </a>
              <a class="dropdown-item modal-menu" href="#"> Familia/Escuela/Amigos </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Violencia</button>
            <ul>
              <a class="dropdown-item modal-menu" href="#"> Bullying </a>
              <a class="dropdown-item modal-menu" href="#"> Acoso-Abuso </a>
              <a class="dropdown-item modal-menu" href="#"> Humillación </a>
              <a class="dropdown-item modal-menu" href="#"> Maltrato </a>
            </ul>
            <button class="dropdown-item modal-menu" type="button">Bibliografia</button>
          </div>
        </div>
      </div>
    </div>
    <button class="informacion" type="button" data-toggle='modal' data-target='#modal4' aria-haspopup="true"
      aria-expanded="false"><img src="assets/informacion.svg" class="info"
        alt="boton para mas informacion"><br>Informacion</button>

    <a href='tel:154301742'><button class="emergencia" type="button" aria-haspopup="true" aria-expanded="false"> 911
      </button></a>

  </nav>








  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap/bootstrap.bundle.js"></script>
  <!-- <script src="js/bootstrap.js"></script> -->
</body>

</html>
