function confirm_del_menu_level1_item(id) {
  if (confirm("¿Está seguro que quiere borrar el item? Todos los subitems se borrarán.")) {
    window.open("/config/menu/level1/del_item/"+id,"_self");
  }
}

function confirm_del_menu_level2_item(id) {
  if (confirm("¿Está seguro que quiere borrar el item? Todos los subitems se borrarán.")) {
    window.open("/config/menu/level2/del_item/"+id,"_self");
  }
}

function confirm_del_menu_level3_item(id) {
  if (confirm("¿Está seguro que quiere borrar el item?")) {
    window.open("/config/menu/level3/del_item/"+id,"_self");
  }
}


function go_back() {
  window.history.back();
}
