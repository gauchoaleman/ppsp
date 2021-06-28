<?php
use App\Classes\Config\Menu\Level1\Level1;
use App\Classes\Config\Menu\Level2\Level2;
use App\Classes\Config\Menu\Level3\Level3;

$level1 = new Level1;
$menu_level1_item_data = $level1->get_item_data($menu_level1_item_id);
//if( isset($menu_level1_item1_data) )

$menu_level1_item_menu_text = $menu_level1_item_data->menu_text;
?>
<div class="modal" tabindex="-1" id="modal{{$menu_level1_item_id}}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 90%;"
    style="background-color: #546a8f;">
    <div class="modal-content">
      <div class="modal-header">
        {{$menu_level1_item_menu_text}}
        <button class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php $level2 = new Level2; ?>
        @foreach($level2->get_menu_items($menu_level1_item_id) as $menu_level2_item)
          @if( $menu_level2_item->text )
            <button class="dropdown-item modal-menu" type="button"><a href='show_text/level2/{{$menu_level2_item->id}}'>{{$menu_level2_item->menu_text}}</a></button>
          @else
            <button class="dropdown-item modal-menu" type="button">{{$menu_level2_item->menu_text}}</button>
          @endif
          <?php
            $level3 = new Level3;
            $menu_level3_items = $level3->get_menu_items($menu_level2_item->id);
          ?>
          @if( sizeof($menu_level3_items) )
            <ul>
              @foreach($menu_level3_items as $menu_level3_item)
                @if( $menu_level3_item->text )
                  <a class="dropdown-item modal-menu" href="show_text/level3/{{$menu_level3_item->id}}">{{$menu_level3_item->menu_text}}</a>
                @else
                  <a class="dropdown-item modal-menu" href="#">{{$menu_level3_item->menu_text}}</a>
                @endif
              @endforeach
            </ul>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
<?php

 ?>
