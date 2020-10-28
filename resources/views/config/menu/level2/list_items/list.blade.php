<?php
use App\Classes\Config\Menu\Level1\Level1;

$menu_level1_item_position = get_form_value("menu_level1_item_postion");

$where = array();
if( $menu_level1_item_position )
  $where[] = ['menu_level1_items.position','=',$menu_level1_item_position];

$menu_level2_items = DB::table('menu_level2_items')
                     ->join('menu_level1_items', 'menu_level1_items.id', '=', 'menu_level2_items.menu_level1_item_id')
                     ->orderBy('menu_level1_items.position', 'asc')->orderBy('menu_level2_items.position', 'asc')
                     ->where($where)
                     ->select('menu_level1_items.menu_text as menu_level1_item_menu_text','menu_level2_items.menu_text as menu_level2_item_menu_text',
                     'menu_level2_items.id as menu_level2_item_id','menu_level2_items.created_at as created_at','menu_level1_items.position as menu_level1_item_position',
                     'menu_level2_items.position as menu_level2_item_position')->get();
?>
<div class="container">
  <br>
  <a href="/config/menu/level2/add_item">Agregar item</a><br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Listado items menú nivel 2
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
        <form method="GET" action="/config/menu/level2/list_items">
          <tr>
            <th scope="col" class="text-center">
              Texto en menú nivel 1
            </th>
            <th scope="col" class="text-center">
              Posición en menú nivel 1<br>
              <div align="center">
                <select id="menu_level1_item_position" name="menu_level1_item_postion">
                  <option value=""></option>
                  <?php $level1 = new Level1; ?>
                  @foreach($level1->get_menu_items_with_level2_presence() as $menu_level1_item_with_level2_presence)
                    <option value="{{$menu_level1_item_with_level2_presence->position}}"
                      @if($menu_level1_item_position == $menu_level1_item_with_level2_presence->position )
                        selected
                        @endif
                    >
                      {{$menu_level1_item_with_level2_presence->position}}
                    </option>
                  @endforeach
                </select>
                <button type="submit" style="font-size:15px;height:30px;" class="btn btn-primary">
                  {{ __('Entrar') }}
                </button>
              </div>

            </th>
            <th scope="col" class="text-center">
              Texto en menú
            </th>
            <th scope="col" class="text-center">
              Posición en menú
            </th>
            <th scope="col" class="text-center">
              Fecha agregado<br>
            </th>
            <th scope="col" class="text-center">
              Modificar
            </th>
            <th scope="col" class="text-center">
              Borrar
            </th>
          </tr>
        </form>
        </thead>
        <tbody>
          @foreach($menu_level2_items as $menu_level2_item)
            <tr>
              <td align="center">
                {{$menu_level2_item->menu_level1_item_menu_text}}
              </td>
              <td align="center">
                {{$menu_level2_item->menu_level1_item_position}}
              </td>
              <td align="center">
                {{$menu_level2_item->menu_level2_item_menu_text}}
              </td>
              <td align="center">
                {{$menu_level2_item->menu_level2_item_position}}
              </td>
              <td align="center">
                <?php $date = new DateTime($menu_level2_item->created_at); ?>
                {{$date->format('d/m/Y')}}
              </td>
              <td align="center">
                <a class='card-link' href="/config/menu/level2/mod_item/{{$menu_level2_item->menu_level2_item_id}}/"><img src='/img/edit.png'></a>
              </td>
              <td align="center">
                <a class='card-link' onclick="confirm_del_menu_level2_item({{$menu_level2_item->menu_level2_item_id}})" href="#"><img src='/img/delete.png'></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
