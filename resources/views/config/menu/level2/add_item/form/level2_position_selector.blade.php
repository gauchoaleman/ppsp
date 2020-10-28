<?php
use App\Classes\Config\Menu\Level2\Level2;
$level2 = new Level2;
$menu_level2_items = $level2->get_menu_items($menu_level1_item_id);
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">
        <div align="center">
          Elegir
        </div>
      </th>
      <th scope="col">
        <div align="center">
          Posición
        </div>
      </th>
      <th scope="col">
        <div align="center">
          Texto menú actual
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    @if( !sizeof($menu_level2_items) )
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="1">
          </div>
        </td>
        <td>
          <div align="center">
            1
          </div>
        </td>
        <td>
          <div align="center">
            -
          </div>
        </td>
      </tr>
    @endif
    @foreach($menu_level2_items as $menu_level2_item)
      @if ($loop->last)
        <?php $last_menu_level2_item = $menu_level2_item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$menu_level2_item->position}}"
            @if( $menu_level2_item->position == $position) checked @endif
            >
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level2_item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level2_item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
    @if( sizeof($menu_level2_items) )
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$last_menu_level2_item->position+1}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$last_menu_level2_item->position+1}}
          </div>
        </td>
        <td>
          <div align="center">
            -
          </div>
        </td>
      </tr>
    @endif
  </tbody>
</table>
