<?php

namespace App\Http\Controllers\Config\Menu\Level1;
use App\Classes\Config\Menu\Level1\Level1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

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
      $level1 = new Level1;
      $old_position = $level1->get_level1_position_from_id($id);
      $new_position = $position;
      //print "old:$old_position, new: $new_position";    //Flag
      if( $old_position<$new_position )
        $level1->one_level1_position_down_from($old_position+1,$new_position);
      else if( $old_position>$new_position )
        $level1->one_level1_position_up_from($new_position,$old_position-1);

      $update_array["position"] = $new_position;
      $update_array["menu_text"] = $menu_text;
      $update_array["text"] = $text;
      DB::table('menu_level1_items')->where('id', $id)->update($update_array);

      return $this->show_page("config/menu/level1/list_items",true,"config","Item modificado.");
    }
    $level1 = new Level1;
    if( $_POST )
      $data = $_POST;
    else
      $data = (array) $level1->get_level1_item_data($id);
      print_r($data);
    return $this->show_page("config/menu/level1/mod_item",true,"config","",$data);
  }

}
