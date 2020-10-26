<?php

namespace App\Http\Controllers\Config\Menu\Level1;
use App\Classes\Config\Menu\Level1\Level1;
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
    $level1 = new Level1;
    $position = $level1->get_position_from_id($id);
    DB::table('menu_level1_items')->where('id', '=', $id)->delete();
    $level1 = new Level1;
    $level1->one_position_down($position);
    return $this->show_page("config/menu/level1/list_items",true,"config","Item borrado.");
  }
}
