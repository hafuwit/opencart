function setMenuActive(menu_name) {
    var old_menu = $('#menu li#menu-upsmodule').find('.active.open')[0];
    var new_menu = $('#menu li#menu-upsmodule li:contains("'+ menu_name +'")')[0];
    $(old_menu).removeClass('active open');
    $(new_menu).addClass('active open');
}