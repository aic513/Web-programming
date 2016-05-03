<?php
//-------------- функция вывода формы OPEN---------------------------//
function print_form($db,$smarty, $print_ad = 0) {                           
   if ($print_ad) {
            $add = get_ad($db, $print_ad);
        }
        else{
            $add = 0;
        }
        
    $smarty->assign('add', $add);
    $smarty->assign('city', get_cities($db));
    $smarty->assign('category', get_category($db));
    $smarty->display('form.tpl');
}
//-------------- функция вывода формы CLOSE---------------------------//



//---------------------функция возврата объявлений из БД по id OPEN----------------------//
function get_ad($db,$print_ad){                                                        
         return $db->selectRow("SELECT * FROM `advertisement` WHERE id =?d", $print_ad);   
    }
//---------------------функция возврата объявлений из БД по id CLOSE----------------------//
    
    
    
//-----------функция возврата всех объявлений из БД OPEN---------------------//
 function get_all($db){
         return $db->select("SELECT * FROM `advertisement`");                 
    }
//-----------функция возврата всех объявлений из БД CLOSE---------------------//

    
//-------------------функция добавления объявлений в Базу Данных OPEN--------------------------------------//
function ads_ad($db, $add) {                                    
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    } // Если чекбокс не нажат то в POST не отправляется никакого значения. В этом случае установка значения в 0
    $db->query("INSERT INTO `advertisement` (`privat`, `seller_name`, `email`, `allow_mails`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`)
                    VALUES ('{$add['privat']}', '{$add['seller_name']}', '{$add['email']}', '{$add['allow_mails']}', '{$add['phone']}', '{$add['location_id']}', '{$add['category_id']}', '{$add['title']}', '{$add['description']}', '{$add['price']}')");
}
//-------------------функция добавления объявлений в Базу Данных CLOSE--------------------------------------//


//----------------------функция редактирования объявлений OPEN----------------------------//
function edit_ads($db, $add) {                                    
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    }
     $db->query("UPDATE `advertisement` SET `privat`='{$add['privat']}', `seller_name`='{$add['seller_name']}', `email`='{$add['email']}', "
            . "`allow_mails`='{$add['allow_mails']}', `phone`='{$add['phone']}', `location_id`='{$add['location_id']}', `category_id`='{$add['category_id']}', "
            . "`title`='{$add['title']}', `description`='{$add['description']}', `price`='{$add['price']}' where id='{$add['id_r']}'");
}
//----------------------функция редактирования объявлений CLOSE----------------------------//


//------------------------ функция перезапуска скрипта OPEN----------------------------//
function restart() {                                         
    header("Location: $_SERVER[SCRIPT_NAME]");
    exit;
}
//------------------------ функция перезапуска скрипта CLOSE----------------------------//
