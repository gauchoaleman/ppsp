<?php
use App\Classes\Config\Menu\Level1\Level1;
$level1 = new Level1;
$items = $level1->get_menu_items();
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
    @foreach($items as $item)
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$item->position}}"
              @if( $item->position == $position ) checked @endif
            >
          </div>
        </td>
        <td>
          <div align="center">
            {{$item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
