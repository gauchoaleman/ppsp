<?php
use App\Classes\Config\Menu\Level2\Level2;
$level2 = new Level2;
$menu_level2_items = $level2->get_menu_items($menu_level1_item_id);
//$menu_level2_item_id = get_form_value("menu_level2_item_id");
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
    @foreach($menu_level2_items as $menu_level2_item)
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="menu_level2_item_id" name="menu_level2_item_id" value="{{$menu_level2_item->id}}"
            @if( $menu_level2_item->id == $menu_level2_item_id ) checked @endif
            onchange="this.form.submit();"
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
  </tbody>
</table>
