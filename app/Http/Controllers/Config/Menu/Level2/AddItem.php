<?php
namespace App\Http\Controllers\Config\Menu\Level2;
use App\Classes\Config\Menu\Level2\Level2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class AddItem extends Controller
{
  private function form_complete()
  {
    if( isset($_POST["menu_text"]) && isset($_POST["menu_level1_item_id"]) && isset($_POST["position"]) )
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
      //echo "Flag1";      //Flag
      $messages = [
        'menu_text.required' => 'Debe ingresar un texto para el item.',
        'menu_level1_item_id.required' => 'Debe ingresar una posición de nivel 1.',
        'position.required' => 'Debe ingresar una posición de nivel 2.',
      ];
      $v = Validator::make($request->all(), [
        'menu_text' => 'required',
        'menu_level1_item_id' => 'required',
        'position' => 'required'],
        $messages
      );

      if ($v->fails())
          return redirect()->back()->withErrors($v->errors());
      extract($_POST);
      $level2 = new Level2;
      $level2->one_position_up($menu_level1_item_id,$position);
      $insert_array["menu_level1_item_id"] = $menu_level1_item_id;
      $insert_array["position"] = $position;
      $insert_array["menu_text"] = $menu_text;
      $insert_array["text"] = $text;
      $insert_array["created_at"] = date('Y-m-d H:i:s');

      DB::table('menu_level2_items')->insert($insert_array);

      return $this->show_page("config/menu/level2/list_items",true,"config","Item agregado.");
    }
    else{
      //echo "Flag2";      //Flag
      //print_r($_POST);      //Flag
      return $this->show_page("config/menu/level2/add_item",true,"config");//
    }
  }
}
