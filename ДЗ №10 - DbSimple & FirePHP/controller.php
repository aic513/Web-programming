<?php

error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root.'/Smarty/';
require_once("functions.php");                              // подключаем файл с функциями
require_once ("connect_to_db.php");                             //подключаемся к самой БД
require_once ("bd_script.php");                                 //подключаем файл со скриптами для БД


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
$smarty->assign('city', get_city($db));
$smarty->assign('category', get_category($db));



if (filter_input(INPUT_POST,'confirm_add')) {                            // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                          // если присутствует метка id_r то сохраняем редактируемое объявление
        edit_ads($db,$_POST);
        }
        else { 
           ads_ad($db,$_POST);                                      // иначе добавляем новое объявление
        }
    restart();                                                 // вызываем restart(); для очистки формы
    
    
    
} elseif (filter_input(INPUT_POST,'clear_form') ||filter_input(INPUT_POST,'back')) {      // кнопка очистить форму  вызывает restart();
    restart();
    
    
    
} elseif (filter_input(INPUT_POST,'clear_base')) {                     // по кнопке очистить базу очищаем БД
    $db->query("DELETE FROM `advertisement` WHERE id>0");
    restart();
    
    
    
} elseif (isset ($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
   if ($db->selectRow("SELECT id FROM `advertisement` WHERE id=?d",$_GET['del_ad'])){   // если существует объявление с таким ключом
            $db->query("DELETE FROM `advertisement` WHERE id=?d",$_GET['del_ad']);                     //удаляем его
        restart();                                         // перезапускаем скрипт
    }
    
    
    
} elseif (isset ($_GET['click_id'])) {                          // действие по клику на объявление
     if ($db->selectRow("SELECT id FROM `advertisement` WHERE id=?d",$_GET['click_id'])){  // если объявление с запрашиваемым id существует
            print_form($db,$smarty, $_GET['click_id']);            // выводим объявление в форму
        }
    
        
    
} else {
    print_form($db,$smarty);                                           // иначе выводим пустую форму
    
}

