function confirm_del_level1_item(id) {
  if (confirm("¿Está seguro que quiere borrar el item?")) {
    window.open("/config/menu/level1/del_item/"+id,"_self");
  }
}

function go_back() {
  window.history.back();
}
