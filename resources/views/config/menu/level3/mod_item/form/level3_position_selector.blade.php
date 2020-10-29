<?php
use App\Classes\Config\Menu\Level3\Level3;
$level3 = new Level3;
$menu_level3_items = $level3->get_menu_items($menu_level2_item_id);
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
    @if( !sizeof($menu_level3_items) )
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
    @foreach($menu_level3_items as $menu_level3_item)
      @if ($loop->last)
        <?php $last_menu_level3_item = $menu_level3_item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$menu_level3_item->position}}"
            @if( $menu_level3_item->position == $position) checked @endif
            >
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level3_item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level3_item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
    @if( $old_menu_level2_item_id != $new_menu_level2_item_id && sizeof($menu_level3_items))
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$last_menu_level3_item->position+1}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$last_menu_level3_item->position+1}}
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
