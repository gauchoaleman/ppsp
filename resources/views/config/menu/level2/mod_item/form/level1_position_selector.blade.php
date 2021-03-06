<?php
use App\Classes\Config\Menu\Level1\Level1;
$level1 = new Level1;
$menu_level1_items = $level1->get_menu_items();
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
    @foreach($menu_level1_items as $menu_level1_item)
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="menu_level1_item_id" name="menu_level1_item_id" value="{{$menu_level1_item->id}}"
            @if( $menu_level1_item->id == $menu_level1_item_id ) checked @endif
            onchange="this.form.submit();"
            >
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level1_item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$menu_level1_item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
