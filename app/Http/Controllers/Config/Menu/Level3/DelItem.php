<?php

namespace App\Http\Controllers\Config\Menu\Level3;
use App\Classes\Config\Menu\Level3\Level3;
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
    $level3 = new Level3;
    $position = $level3->get_position_from_id($id);
    $menu_level2_item_id = $level3->get_menu_level2_item_id_from_id($id);
    DB::table('menu_level3_items')->where('id', '=', $id)->delete();
    $level3->one_position_down($menu_level2_item_id,$position);
    return $this->show_page("config/menu/level3/list_items",true,"config","Item borrado.");
  }
}
