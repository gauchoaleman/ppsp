<?php
use App\Classes\Config\Menu\Level1\Level1;

$level1 = new Level1;
$menu_level1_items = $level1->get_menu_items();
?>

@foreach( $menu_level1_items as $menu_level1_item )
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
    <span class="nav-label">
      {{$menu_level1_item->menu_text}},{{$menu_level1_item->id}}
    </span>
    <span class="caret">
    </span>
  </a>
    @include('includes.front.top_bar.text_menus.level1.level2', ['menu_level1_item_id' => $menu_level1_item->id])

@endforeach
