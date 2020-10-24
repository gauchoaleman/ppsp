<?php

namespace App\Http\Controllers\Config\Menu\Level1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class AddItem extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
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
      $this->one_level1_position_up_from($position);
      $insert_array["position"] = $position;
      $insert_array["menu_text"] = $menu_text;
      $insert_array["text"] = $text;
      $insert_array["created_at"] = date('Y-m-d H:i:s');

      DB::table('menu_level1_items')->insert($insert_array);

      return $this->show_page("config/menu/level1/list_items",true,"config","Item agregado.");
    }

    return $this->show_page("config/menu/level1/add_item",true,"config");
  }

}
