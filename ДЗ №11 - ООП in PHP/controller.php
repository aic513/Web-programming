<?php
error_reporting(E_ALL|E_ERROR|E_WARNING|E_PARSE|E_NOTICE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root.'/Smarty/';
require_once("oop.php");                              // подключаем файл с функциями
require_once ("connect_to_db.php");                   //подключаемся к самой БД
require_once ("bd_script.php");                       //подключаем файл со скриптами для БД




// подключаем smarty
$smarty_dir = 'Smarty/';
require($smarty_dir.'libs/Smarty.class.php');
$smarty = new Smarty();
    
$smarty->compile_check = TRUE;
$smarty->debugging = 0;
    
$smarty->template_dir = $smarty_dir.'templates/';
$smarty->compile_dir = $smarty_dir.'templates_c/';
$smarty->cache_dir = $smarty_dir.'cache/';
$smarty->config_dir = $smarty_dir.'configs/';

//передаем 'имя переменной' и 'значение'
$smarty->assign('title', 'Наше объявление');
$smarty->assign('city', $base->get_city($db));
$smarty->assign('category', $base->get_category($db));



if (filter_input(INPUT_POST,'confirm_add')) {                            // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                          // если присутствует метка id_r то сохраняем редактируемое объявление
        $base->edit_ads($db,$_POST);
        }
        else { 
           $base->ads_ad($db, $_POST);                                      // иначе добавляем новое объявление
        }
    $show->restart();                                                 // вызываем restart(); для очистки формы
    
    
    
} elseif (filter_input(INPUT_POST,'clear_form') ||filter_input(INPUT_POST,'back')) {      // кнопка очистить форму  вызывает restart();
    $show->restart();
    
    
    
} elseif (filter_input(INPUT_POST,'clear_base')) {                     // по кнопке очистить базу очищаем БД
   $base->clear_ad($db);
    $show->restart();
    
    
    
} elseif (isset ($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
   if ($base->get_ad($db,(int)$_GET['del_ad'])){        // если существует объявление с таким ключом
       $base->delete_ad($db,(int)$_GET['del_ad']);       //удаляем его
       $show->restart();                                         // перезапускаем скрипт
    }
    
    
    
} elseif (isset ($_GET['click_id'])) {                          // действие по клику на объявление
     if ($base->get_ad($db, ($_GET['click_id']))){  // если объявление с запрашиваемым id существует
         $show->print_form($db,$smarty, $base, $_GET['click_id']);            // выводим объявление в форму
        }
    
        
    
} else {
    $show->print_form($db,$smarty,$base);                                           // иначе выводим пустую форму
    
}

