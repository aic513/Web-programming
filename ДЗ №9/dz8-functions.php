<?php


    function print_form($smarty,$print_ad=0){                           // функция вывода формы
      $smarty->assign('print_ad', $print_ad);
      $add_query = mysql_query("select * from `advertisement`  where id = $print_ad");
      $row = mysql_fetch_assoc($add_query);
      $smarty->assign('display', $row);
      $add = array();
      $add_query = mysql_query('select * from `advertisement`');
      while ($row = mysql_fetch_assoc($add_query)) {
            $add[$row['id']] = $row;
      }
      $smarty->assign('add', $add);
      $smarty->display('dz8-form.tpl');          
    }
    
   function ads_ad($add){                                    // функция добавления объявлений в Базу Данных
        if (!isset($add['allow_mail'])){     $add['allow_mail']=0;    }
        mysql_query("insert into `advertisement` (`privat`, `seller_name`, `email`, `allow_mail`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`)
                    values ('{$add['privat']}', '{$add['seller_name']}', '{$add['email']}', '{$add['allow_mail']}', '{$add['phone']}', '{$add['location_id']}', '{$add['category_id']}', '{$add['title']}', '{$add['description']}', '{$add['price']}')");
    }
    
    
    
     function edit_ads($add){                                    // функция редактирования объявлений
        if (!isset($add['allow_mail'])){     $add['allow_mail']=0;    }
        mysql_query("update `advertisement` set `privat`='{$add['privat']}', `seller_name`='{$add['seller_name']}', `email`='{$add['email']}', "
        . "`allow_mail`='{$add['allow_mail']}', `phone`='{$add['phone']}', `location_id`='{$add['location_id']}', `category_id`='{$add['category_id']}', "
        . "`title`='{$add['title']}', `description`='{$add['description']}', `price`='{$add['price']}' where id='{$add['id_r']}'");
    }
    
    
    

    function restart(){                                         // функция перезапуска скрипта
        header("Location: $_SERVER[SCRIPT_NAME]");
        exit;
    }
  
?>