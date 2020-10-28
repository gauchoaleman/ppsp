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
    @if( !sizeof($menu_level1_items) )
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
    @foreach($menu_level1_items as $menu_level1_item)
      @if ($loop->last)
        <?php $last_menu_level1_item = $menu_level1_item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$menu_level1_item->position}}">
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
    @if( sizeof($menu_level1_items) )
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$last_menu_level1_item->position+1}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$last_menu_level1_item->position+1}}
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
