<?php

namespace App\Http\Controllers\Config\Menu\Level2;
use App\Classes\Config\Menu\Level2\Level2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class ModItem extends Controller
{
  private function form_complete()
  {
    //print_r($_POST);      //Flag
    //Have to check if button was pressed or if form.submit waas made
    if( isset($_POST["menu_text"]) && isset($_POST["menu_level1_item_id"]) && isset($_POST["position"]) && isset($_POST["button_pressed"]) )
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
  public function __invoke(Request $request,$id)
  {
    if( $this->form_complete() ){
      $messages = [
       'menu_text.required' => 'Debe ingresar un texto para el item.',
      ];
      $v = Validator::make($request->all(), [
        'menu_text' => 'required'],
        $messages
      );

      if ($v->fails())
        return redirect()->back()->withErrors($v->errors());
      extract($_POST);
      $level2 = new Level2;

      $old_position = $level2->get_position_from_id($id);
      $new_position = $position;
      $old_menu_level1_item_id = $level2->get_menu_level1_item_id_from_id($id);
      $new_menu_level1_item_id = $menu_level1_item_id;

      if( $old_menu_level1_item_id == $new_menu_level1_item_id ){
        if( $old_position<$new_position )
          $level2->one_position_down($old_menu_level1_item_id,$old_position+1,$new_position);
        else if( $old_position>$new_position )
          $level2->one_position_up($old_menu_level1_item_id,$new_position,$old_position-1);
      }
      else{
        $level2->one_position_down($old_menu_level1_item_id,$old_position+1);
        $level2->one_position_up($new_menu_level1_item_id,$new_position);
      }

      $update_array["menu_level1_item_id"] = $new_menu_level1_item_id;
      $update_array["position"] = $new_position;
      $update_array["menu_text"] = $menu_text;
      $update_array["text"] = $text;
      DB::table('menu_level2_items')->where('id', $id)->update($update_array);

      return $this->show_page("config/menu/level2/list_items",true,"config","Item modificado.");
    }
    $level2 = new Level2;
    if( $_POST ){
      $data = $_POST;
      if( !isset($data["position"]) )
        $data["position"] = "";
      $data["old_menu_level1_item_id"] = $level2->get_menu_level1_item_id_from_id($id);
      $data["new_menu_level1_item_id"] = $data["menu_level1_item_id"];
    }
    else{
      $data = (array) $level2->get_item_data($id);
      $data["old_menu_level1_item_id"] = $level2->get_menu_level1_item_id_from_id($id);
      $data["new_menu_level1_item_id"] = $data["old_menu_level1_item_id"];
    }

    return $this->show_page("config/menu/level2/mod_item",true,"config","",$data);
  }

}
