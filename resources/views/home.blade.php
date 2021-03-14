<div id="home_mobile" style="display:none">
    <!-- COMIENZO EN DISPOSITIVOS MOVILES -->
  <nav>
    <!-- Menu tengo ideas -->
    @include('includes.front.home.modal',['menu_level1_item_id' => 61])
    <button class="tengo-ideas" type="button" data-toggle='modal' data-target='#modal61' aria-expanded="false">Tengo
      Ideas<img src="assets/tengo_ideas.svg" class="ideas" alt="boton para tengo ideas">
    </button>
    <!-- Menu me preocupa alguien -->
    @include('includes.front.home.modal',['menu_level1_item_id' => 62])
    <button class="preocupa-alguien" type="button" data-toggle='modal' data-target='#modal62' aria-expanded="false">Me
      preocupa</br><img src="assets/smiley.svg" class="preocupa" alt="boton para me preocupa alguien">alguien
    </button>
    <!-- Menu profesional/familiar -->
    @include('includes.front.home.modal',['menu_level1_item_id' => 63])
    <button class="profesional-familia-interesado" type="button" data-toggle='modal' data-target='#modal63'
      aria-haspopup="true" aria-expanded="false"><img src="assets/hospital.svg" class="hospital"
        alt="boton para prefesional_familia_interesados"><br>Profesional/<br>Familiar
    </button>
    <!-- Menu informacion -->
    @include('includes.front.home.modal',['menu_level1_item_id' => 64])
    <button class="informacion" type="button" data-toggle='modal' data-target='#modal64' aria-haspopup="true"
      aria-expanded="false"><img src="assets/informacion.svg" class="info"
        alt="boton para mas informacion"><br>Información</button>

    <a href='tel:154301742'><button class="emergencia" type="button" aria-haspopup="true" aria-expanded="false"> 911
      </button></a>
  </nav>
</div>

<script>
if (navigator.userAgent.indexOf('Mobile') !== -1) {
    document.getElementById('home_mobile').style.display = "";
} else {
    document.getElementById('home_mobile').style.display = "none";
}
</script>
