<?php

namespace App\Http\Controllers\ShowText;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Level3 extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function __invoke(Request $request,$id)
  {
    $menu_level3_item = DB::table('menu_level3_items')
            ->join('menu_level1_items', 'menu_level1_items.id', '=', 'menu_level3_items.menu_level1_item_id')
            ->join('menu_level2_items', 'menu_level2_items.id', '=', 'menu_level3_items.menu_level2_item_id')
            ->select('menu_level1_items.menu_text as menu_level1_item_menu_text', 'menu_level2_items.menu_text as menu_level2_item_menu_text',
            'menu_level3_items.menu_text as menu_level3_item_menu_text','menu_level3_items.text as menu_level3_item_text')
            ->where('menu_level3_items.id',$id)
            ->first();
    $data = (array)$menu_level3_item;
    if( !$data || !$data["menu_level3_item_text"])
      return $this->show_page("show_text/not_valid_id",true,"front");
    else
      return $this->show_page("show_text/level3",true,"front","",$data);
  }

}
