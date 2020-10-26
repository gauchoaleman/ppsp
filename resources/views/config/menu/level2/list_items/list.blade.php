<?php
use App\Classes\Config\Menu\Level1\Level1;

$level1_position = get_form_value("level1_postion");

$where = array();
if( $level1_position )
  $where[] = ['menu_level1_items.position','=',$level1_position];

$menu_level2_items = DB::table('menu_level2_items')
                     ->join('menu_level1_items', 'menu_level1_items.id', '=', 'menu_level2_items.menu_level1_item_id')
                     ->orderBy('menu_level1_items.position', 'asc')->orderBy('menu_level2_items.position', 'asc')
                     ->where($where)
                     ->select('menu_level1_items.menu_text as level1_menu_text','menu_level2_items.menu_text as level2_menu_text',
                     'menu_level2_items.id as level2_id','menu_level2_items.created_at as created_at','menu_level1_items.position as level1_position',
                     'menu_level2_items.position as level2_position')->get();
?>
<div class="container">
  <br>
  <a href="/config/menu/level2/add_item">Agregar item</a><br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Listado items menú nivel 1
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
        <form method="GET">
          <tr>
            <th scope="col" align="center">
              Texto en menú nivel 1
            </th>
            <th scope="col" align="center">
              Posición en menú nivel 1<br>
              <div align="center">
                <select id="level1_position" name="level1_postion">
                  <option value=""></option>
                  <?php $level1 = new Level1; ?>
                  @foreach($level1->get_menu_items_with_level2_presence() as $level1_item)
                    <option value="{{$level1_item->position}}"
                      @if($level1_position == $level1_item->position )
                        selected
                        @endif
                    >
                      {{$level1_item->position}}
                    </option>
                  @endforeach
                </select>
              </div>
            </th>
            <th scope="col" align="center">
              Texto en menú
            </th>
            <th scope="col" align="center">
              Posición en menú
            </th>
            <th scope="col" align="center">
              Fecha agregado<br>
              <div align="center">
                <button type="submit" style="font-size:15px;height:30px;" class="btn btn-primary">
                  {{ __('Entrar') }}
                </button>
              </div>
            </th>
            <th scope="col" align="center">
              Modificar
            </th>
            <th scope="col" align="center">
              Borrar
            </th>
          </tr>
        </form>
        </thead>
        <tbody>
          @foreach($menu_level2_items as $menu_level2_item)
            <tr>
              <td align="center">
                {{$menu_level2_item->level1_menu_text}}
              </td>
              <td align="center">
                {{$menu_level2_item->level1_position}}
              </td>
              <td align="center">
                {{$menu_level2_item->level2_menu_text}}
              </td>
              <td align="center">
                {{$menu_level2_item->level2_position}}
              </td>
              <td align="center">
                <?php $date = new DateTime($menu_level2_item->created_at); ?>
                {{$date->format('d/m/Y')}}
              </td>
              <td align="center">
                <a class='card-link' href="/config/menu/level2/mod_item/{{$menu_level2_item->level2_id}}"><img src='/img/edit.png'></a>
              </td>
              <td align="center">
                <a class='card-link' onclick="confirm_del_level2_item({{$menu_level2_item->level2_id}})" href="#"><img src='/img/delete.png'></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
