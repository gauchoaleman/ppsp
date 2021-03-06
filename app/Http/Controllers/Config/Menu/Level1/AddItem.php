<?php

namespace App\Http\Controllers\Config\Menu\Level1;
use App\Classes\Config\Menu\Level1\Level1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class AddItem extends Controller
{
  private function form_complete()
  {
    if( isset($_POST["menu_text"]) && isset($_POST["position"]) )
      return TRUE;
    else
      return FALSE;
  }
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    if( $this->form_complete() ){
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
      $level1 = new Level1;
      $level1->one_position_up($position);
      $insert_array["position"] = $position;
      $insert_array["menu_text"] = $menu_text;
      $insert_array["text"] = $text;
      $insert_array["created_at"] = date('Y-m-d H:i:s');

      DB::table('menu_level1_items')->insert($insert_array);

      return $this->show_page("config/menu/level1/list_items",true,"config","Item agregado.");
    }
    else
      return $this->show_page("config/menu/level1/add_item",true,"config");
  }

}
