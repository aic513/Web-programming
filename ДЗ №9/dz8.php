<?php

error_reporting(E_ALL | E_STRICT);      
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root.'/Smarty/';
require_once("dz8-functions.php");                              // подключаем файл с функциями
require_once ("dz8-data.php");                                  //подключаем файл с городами и категориями
require_once ('bd_script.php');
// подключаем smarty
$smarty_dir = 'Smarty/';
require($smarty_dir.'libs/Smarty.class.php');
$smarty = new Smarty();
    
$smarty->compile_check = TRUE;
$smarty->debugging = FALSE;
    
$smarty->template_dir = $smarty_dir.'templates/';
$smarty->compile_dir = $smarty_dir.'templates_c/';
$smarty->cache_dir = $smarty_dir.'cache/';
$smarty->config_dir = $smarty_dir.'configs/';

//передаем 'имя переменной' и 'значение'
$smarty->assign('title', 'Наше объявление');
$smarty->assign('citys', $citys);
$smarty->assign('categorys', $categorys);

connect_bd('localhost', 'root', '', 'main_bd');



 


if (isset($_POST['confirm_add'])) {                            // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                          // если присутствует метка id_r то сохраняем редактируемое объявление
         edit_ads($_POST);
        }
        else { 
           ads_ad($_POST);                                      // иначе добавляем новое объявление
        }
    restart();                                                 // вызываем restart(); для очистки формы
    
    
} elseif (isset($_POST['clear_form']) || isset($_POST['back'])) {      // кнопка очистить форму  вызывает restart();
    restart();
    
    
} elseif (isset($_POST['clear_base'])) {                     // по кнопке очистить базу очищаем БД
    mysql_query("delete from `advertisement` where id>0");
    restart();
    
    
} elseif (isset($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
    $del_id = (int) ($_GET['del_ad']);                         // присваеиваем его переменной $del_id
   if (mysql_fetch_array(mysql_query("select id from `advertisement` where id='$del_id'"))){   // если существует объявление с таким ключом 
            mysql_query("delete from `advertisement` where id='$del_id'");                     //удаляем его
        restart();                                         // перезапускаем скрипт
    }
    
    
} elseif (isset($_GET['click_id'])) {                          // действие по клику на объявление
    $click_id = (int) $_GET['click_id'];                     // присваиваем переменной $click_id номер кликнутого объявления
     if (mysql_fetch_array(mysql_query("select id from `advertisement` where id='$click_id'"))){  // если объявление с запрашиваемым id существует
            print_form($smarty, $click_id);            // выводим объявление в форму
        }
    
    
} else {
    print_form($smarty);                                           // иначе выводим пустую форму
    
}

?>