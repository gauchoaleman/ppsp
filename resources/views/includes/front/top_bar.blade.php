<?php
use App\Classes\Config\Menu\Level1\Level1;
?>
<div id="top_bar_mobile">
<!-- barra de navegación -->
<nav class="navbar navbar-light bg-i  nverse navbar-expand-sm" style="background-color: #b1d035;">
  <!-- icono de hamburguesa -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Ocultar menu dentro de icono de hamburguesa -->
  <a class="navbar-brand" href="index.html"></a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <div class="navbar-nav mx-auto">
    <?php
      $level1 = new Level1;
    ?>
      @foreach($level1->get_menu_items() as $menu_level1_item)
        @include('includes.front.top_bar.level1',['menu_level1_item' =>$menu_level1_item])
      @endforeach
    </div>
  </div>
</nav>
</div>
@if($_SERVER["REQUEST_URI"] == "/home" || $_SERVER["REQUEST_URI"] == "/" )
  <script>
  if (navigator.userAgent.indexOf('Mobile') !== -1) {
      document.getElementById('top_bar_mobile').style.display = "none";
  } else {
      document.getElementById('top_bar_mobile').style.display = "";
  }
  </script>
@endif
