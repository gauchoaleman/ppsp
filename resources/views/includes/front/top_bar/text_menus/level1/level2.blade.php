<?php
use App\Classes\Config\Menu\Level2\Level2;

$level2 = new Level2;
$menu_level2_items = $level2->get_menu_items($menu_level1_item_id);
?>
@if( sizeof($menu_level2_items) )
<ul class="dropdown-menu">
<li class="dropdown-submenu">

  @foreach($menu_level2_items as $menu_level2_item )
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="nav-label">
        {{$menu_level2_item->menu_text}},{{$menu_level1_item_id}}
      </span>
      <span class="caret">
      </span>
    </a><br>
    @include('includes.front.top_bar.text_menus.level1.level2.level3',['menu_level2_item_id' => $menu_level2_item->id])
  @endforeach

</li>
</ul>
@endif
