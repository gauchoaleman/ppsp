<?php
use App\Classes\Config\Menu\Level1\Level1;
$level1 = new Level1;
$level1_items = $level1->get_menu_items();
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
    @if( !sizeof($level1_items) )
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
    @foreach($level1_items as $level1_item)
      @if ($loop->last)
        <?php $last_level1_item = $level1_item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$level1_item->position}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$level1_item->position}}
          </div>
        </td>
        <td>
          <div align="center">
            {{$level1_item->menu_text}}
          </div>
        </td>
      </tr>
    @endforeach
    @if( sizeof($level1_items) )
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$last_level1_item->position+1}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$last_level1_item->position+1}}
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
