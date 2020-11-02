<?php
$menu_level1_items = DB::table('menu_level1_items')->orderBy('position', 'asc')->select('*')->get();
?>
<div class="container">
  <br>
  <a href="/config/menu/level1/add_item">Agregar item</a><br>
  <div class="card" style="width: 70rem;">
    <div class="card-header">
      Listado items menú nivel 1
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">
              Fecha agregado
            </th>
            <th scope="col" class="text-center">
              Texto en menú
            </th>
            <th scope="col" class="text-center">
              Posición
            </th>
            <th scope="col" class="text-center">
              Modificar
            </th>
            <th scope="col" class="text-center">
              Borrar
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($menu_level1_items as $menu_level1_item)
            <tr>
              <td class="text-center">
                <?php $date = new DateTime($menu_level1_item->created_at); ?>
                {{$date->format('d/m/Y')}}
              </td>
              <td class="text-center">
                {{$menu_level1_item->menu_text}}
              </td>
              <td class="text-center">
                {{$menu_level1_item->position}}
              </td>
              <td align="center">
                <a class='card-link' href="/config/menu/level1/mod_item/{{$menu_level1_item->id}}"><img src='/img/edit.png'></a>
              </td>
              <td align="center">
                <a class='card-link' onclick="confirm_del_menu_level1_item({{$menu_level1_item->id}})" href="#"><img src='/img/delete.png'></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @if( !sizeof($menu_level1_items))
        No hay items registrados
      @endif
    </div>
  </div>
</div>
