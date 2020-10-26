<?php
use App\Classes\Config\Menu\Level2\Level2;
$level2 = new Level2;
$level2_items = $level2->get_menu_items($menu_level1_item_id);
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
    @if( !sizeof($level2_items) )
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
    @foreach($level2_items as $level2_item)
      @if ($loop->last)
        <?php $last_level2_item = $level2_item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="new_menu_level2_item_id" value="{{$level2_item->id}}"
            @if( $level2_item->id == $new_menu_level2_item_id) checked @endif
            >
          </div>
        </td>
        <td>
          <div align="center">
            {{$level2_item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$level2_item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
