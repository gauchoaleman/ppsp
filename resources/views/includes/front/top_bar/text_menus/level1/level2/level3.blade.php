<?php
use App\Classes\Config\Menu\Level3\Level3;

$level3 = new Level3;
$menu_level3_items = $level2->get_menu_items($menu_level2_item_id);
?>
<ul class="dropdown-menu">
  <li>
    <a href="/configuration/load_leaf_sizes">
      Cargar
    </a>
  </li>
  <li>
    <a href="/configuration/show_leaf_sizes">
      Mostrar
    </a>
  </li>
</ul>
