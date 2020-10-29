<?php
use App\Classes\Config\Menu\Level3\Level3;

$level3 = new Level3;
$menu_level3_items = $level2->get_menu_items($menu_level2_item_id);
?>
@if( sizeof($menu_level3_items))
<ul class="dropdown-menu">
  @foreach($menu_level3_items as $menu_level3_item )
    <li>
      <a href="/configuration/load_paper_prices">
        {{$menu_level3_item->menu_text}}
      </a>
    </li>
  @endforeach
</ul>
@endif
