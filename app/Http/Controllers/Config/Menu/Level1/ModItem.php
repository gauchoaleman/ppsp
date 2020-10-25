<?php

namespace App\Http\Controllers\Config\Menu\Level1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModItem extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function __invoke(Request $request,$id)
  {
    if( isset($_POST["_token"]) ){
      $messages = [
       'menu_text.required' => 'Debe ingresar un texto para el item.',
       'position.required' => 'Debe ingresar una posición.',
      ];
      $v = Validator::make($request->all(), [
        'menu_text' => 'required',
        'position' => 'required'],
        $messages
      );

      if ($v->fails())
        return redirect()->back()->withErrors($v->errors());
      extract($_POST);
      $old_position = $this->get_level1_position_from_id($id);
      $new_position = $position;
      one_level1_position_up_from($old_position);
      one_level1_position_down_from($new_position);
      $update_array["position"] = $new_position;
      $update_array["menu_text"] = $menu_text;
      $update_array["text"] = $text;

      DB::table('menu_level1_items')->update($update_array);

      return $this->show_page("config/menu/level1/list_items",true,"config","Item modificado.");
    }
    if( $_POST )
      $data = $_POST;
    else
      $data = get_level1_item_data($id);
    return $this->show_page("config/menu/level1/mod_item",true,"config","",$data);
  }

}
