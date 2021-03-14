<?php
use App\Classes\Config\Menu\Level2\Level2;
use App\Classes\Config\Menu\Level3\Level3;
?>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="background-color: #546a8f;">
    {{$menu_level1_item->menu_text}}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: #546a8f;">

    <?php $level2 = new Level2; ?>
    @foreach($level2->get_menu_items($menu_level1_item->id) as $menu_level2_item)
      @if( $menu_level2_item->text )
        <button class="dropdown-item modal-menu" type="button"><a href='/show_text/level2/{{$menu_level2_item->id}}'>{{$menu_level2_item->menu_text}}</a></button>
      @else
        <button class="dropdown-item modal-menu" type="button">{{$menu_level2_item->menu_text}}</button>
      @endif
      <?php
      $level3 = new Level3;
      $menu_level3_items = $level3->get_menu_items($menu_level2_item->id);
      ?>
      @if( sizeof($menu_level3_items))
        <ul>
          @foreach($level3->get_menu_items($menu_level2_item->id) as $menu_level3_item)
            @if( $menu_level3_item->text )
              <a class="dropdown-item modal-menu" href="/show_text/level3/{{$menu_level3_item->id}}">{{$menu_level3_item->menu_text}}</a>
            @else
              <a class="dropdown-item modal-menu" href="#">{{$menu_level3_item->menu_text}}</a>
            @endif
          @endforeach
        </ul>
      @endif
    @endforeach
  </div>
</div>
