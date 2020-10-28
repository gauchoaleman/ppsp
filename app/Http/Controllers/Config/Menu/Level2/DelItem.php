<?php

namespace App\Http\Controllers\Config\Menu\Level2;
use App\Classes\Config\Menu\Level2\Level2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DelItem extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request,$id)
  {
    $level2 = new Level2;
    $position = $level2->get_position_from_id($id);
    $menu_level1_item_id = $level2->get_menu_level1_item_id_from_id($id);
    DB::table('menu_level3_items')->where('menu_level2_item_id', '=', $id)->delete();
    DB::table('menu_level2_items')->where('id', '=', $id)->delete();
    $level2->one_position_down($menu_level1_item_id,$position);
    return $this->show_page("config/menu/level2/list_items",true,"config","Item borrado.");
  }
}
