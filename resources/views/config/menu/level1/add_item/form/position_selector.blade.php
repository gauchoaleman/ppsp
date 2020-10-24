<?php
$items = get_level1_menu_items();
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
    @if( !sizeof($items) )
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
    @foreach($items as $item)
      @if ($loop->last)
        <?php $last_item = $item; ?>
      @endif
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$item->position}}">
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
    @if( sizeof($items) )
      <tr>
        <td>
          <div align="center">
            <input type="radio" id="position" name="position" value="{{$last_item->position+1}}">
          </div>
        </td>
        <td>
          <div align="center">
            {{$last_item->position+1}}
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
