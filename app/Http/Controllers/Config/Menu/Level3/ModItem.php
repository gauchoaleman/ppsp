<?php

namespace App\Http\Controllers\Config\Menu\Level3;
use App\Classes\Config\Menu\Level3\Level3;
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
    if( isset($_POST["menu_text"]) && isset($_POST["menu_level1_item_id"]) && isset($_POST["menu_level2_item_id"]) && isset($_POST["position"]) && isset($_POST["button_pressed"]) )
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
      $level3 = new Level3;

      $old_position = $level3->get_position_from_id($id);
      $new_position = $position;
      $old_menu_level1_item_id = $level3->get_menu_level1_item_id_from_id($id);
      $new_menu_level1_item_id = $menu_level1_item_id;
      $old_menu_level2_item_id = $level3->get_menu_level2_item_id_from_id($id);
      $new_menu_level2_item_id = $menu_level2_item_id;

      //print("oldpos: $old_position / newpos: $new_position / oldmenulevel1itemid: $old_menu_level1_item_id / newmenulevel1itemid: $new_menu_level1_item_id<br>");   //Flag
      //print("oldmenulevel2itemid: $old_menu_level2_item_id / newmenulevel2itemid: $new_menu_level2_item_id<br>");     //Flag

      if( $old_menu_level2_item_id == $new_menu_level2_item_id ){
        if( $old_position<$new_position )
          $level3->one_position_down($old_menu_level2_item_id,$old_position+1,$new_position);
        else if( $old_position>$new_position )
          $level3->one_position_up($old_menu_level2_item_id,$new_position,$old_position-1);
      }
      else{
        $level3->one_position_down($old_menu_level2_item_id,$old_position+1);
        $level3->one_position_up($new_menu_level2_item_id,$new_position);
      }

      $update_array["menu_level1_item_id"] = $new_menu_level1_item_id;
      $update_array["menu_level2_item_id"] = $new_menu_level2_item_id;
      $update_array["position"] = $new_position;
      $update_array["menu_text"] = $menu_text;
      $update_array["text"] = $text;
      DB::table('menu_level3_items')->where('id', $id)->update($update_array);

      return $this->show_page("config/menu/level3/list_items",true,"config","Item modificado.");
    }
    $level3 = new Level3;
    if( $_POST ){
      $data = $_POST;
      if( !isset($data["position"]) )
        $data["position"] = "";
        if( !isset($data["menu_level2_item_id"]) )
          $data["menu_level2_item_id"] = "";
      $data["old_menu_level2_item_id"] = $level3->get_menu_level2_item_id_from_id($id);
      $data["new_menu_level2_item_id"] = $data["menu_level2_item_id"];
      //Check out if new_menu_level2_item_id is checked
      $level2 = new Level2;
      if( !$level2->not_in_level1($data["menu_level2_item_id"],$data["menu_level1_item_id"]) )
        $data["menu_level2_item_id"] = "";
      //print("Data from Post");    //Flag
      //print_r($data);       //Flag
    }
    else{
      $data = (array) $level3->get_item_data($id);
      $data["old_menu_level2_item_id"] = $level3->get_menu_level2_item_id_from_id($id);
      $data["new_menu_level2_item_id"] = $data["old_menu_level2_item_id"];
      //print("Data from db");    //Flag
      //print_r($data);       //Flag
    }

    return $this->show_page("config/menu/level3/mod_item",true,"config","",$data);
  }

}
