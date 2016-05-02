<?php

function print_form($db,$smarty, $print_ad = 0) {                           // функция вывода формы
    $add_query = get_ad($db,$print_ad);
    $row = mysqli_fetch_assoc($add_query);
    $smarty->assign('print_ad', $row);
    $add = array();
    $add_query = get_all($db);
    while ($row = mysqli_fetch_assoc($add_query)) {
        $add[$row['id']] = $row;
    }
    $smarty->assign('add', $add);
    $smarty->assign('cities', get_cities($db));
    $smarty->assign('category', get_category($db));
    $smarty->display('dz9-form.tpl');
}


function get_ad($db,$print_ad){
         return mysqli_query($db,"select * from `advertisement`  where id = $print_ad");
    }
    
 function get_all($db){
         return mysqli_query($db, "select * from `advertisement`");
    }


function ads_ad($db, $add) {                                    // функция добавления объявлений в Базу Данных
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    } // Если чекбокс не нажат то в POST не отправляется никакого значения. В этом случае установка значения в 0
    mysqli_query($db, "insert into `advertisement` (`privat`, `seller_name`, `email`, `allow_mails`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`)
                    values ('{$add['privat']}', '{$add['seller_name']}', '{$add['email']}', '{$add['allow_mails']}', '{$add['phone']}', '{$add['location_id']}', '{$add['category_id']}', '{$add['title']}', '{$add['description']}', '{$add['price']}')");
}

function edit_ads($db, $add) {                                    // функция редактирования объявлений
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    }
    mysqli_query($db, "update `advertisement` set `privat`='{$add['privat']}', `seller_name`='{$add['seller_name']}', `email`='{$add['email']}', "
            . "`allow_mails`='{$add['allow_mails']}', `phone`='{$add['phone']}', `location_id`='{$add['location_id']}', `category_id`='{$add['category_id']}', "
            . "`title`='{$add['title']}', `description`='{$add['description']}', `price`='{$add['price']}' where id='{$add['id_r']}'");
}

function restart() {                                         // функция перезапуска скрипта
    header("Location: $_SERVER[SCRIPT_NAME]");
    exit;
}
