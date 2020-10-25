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
    @foreach($items as $item)
      @if ($loop->last)
        <?php $last_item = $item; ?>
      @endif
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
  </tbody>
</table>
