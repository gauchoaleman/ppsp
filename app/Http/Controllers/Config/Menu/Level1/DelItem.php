<?php

namespace App\Http\Controllers\Config\Menu\Level1;

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
    $position = $this->get_level1_position_from_id($id);
    DB::table('menu_level1_items')->where('id', '=', $id)->delete();
    one_level1_position_down_from($position);
    return $this->show_page("config/menu/level1/list_items",true,"config","Item borrado.");
  }
}
