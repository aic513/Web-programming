<?php

//error_reporting(E_ALL | E_STRICT);      Если запускаю в нетбинсе-ошибки не выводятся,если в шторме,то появляются
//ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root.'/Smarty/';
require_once("dz8-functions.php");                              // подключаем файл с функциями
require_once ("dz8-data.php");                                  //подключаем файл с городами и категориями
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



 $add = array();                                                     //сразу присваеиваем массив переменной $add
if (file_exists('dz8_base.txt')) {                                  // если такой файл существует
    $add = unserialize(file_get_contents('dz8_base.txt'));        // расшифровываем данные и записываем их в $add
}


if (isset($_POST['confirm_add'])) {                            // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                          // если присутствует метка id_r то сохраняем редактируемое объявление
        $add[$_POST['id_r']] = $_POST;                         //  - изменяем запись в массиве $_add по ключу id_r
    } else {
        $add[] = $_POST;                                       // добавляем новое объявлениев массив $_add
    }
    save_for_add($add);                                        //сохраняем все в $add
    restart();                                                 // вызываем restart(); для очистки формы
    
    
} elseif (isset($_POST['clear_form']) || isset($_POST['back'])) {      // кнопка очистить форму  вызывает restart();
    restart();
    
    
} elseif (isset($_POST['clear_base'])) {                     // по кнопке очистить базу очищаем куки
    save_for_add('NULL');
    restart();
    
    
} elseif (isset($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
    $del_id = (int) ($_GET['del_ad']);                         // присваеиваем его переменной $del_id
    if (isset($add[$del_id])) {                                  // если существует объявление с таким ключом
        del_ad($del_id);                                   //удаляем его
        save_for_add($add);                                // вызываем save_for_add() и сохраняем массив с объявлениями в файле
        restart();                                         // перезапускаем скрипт
    }
    
    
} elseif (isset($_GET['click_id'])) {                          // действие по клику на объявление
    $click_id = (int) $_GET['click_id'];                     // присваиваем переменной $click_id номер кликнутого объявления
    if (isset($add[$click_id])) {                             // если объявление такое существует
        print_form($smarty,$add,$add[$click_id]);                    // выводим в форму 
    }
    
    
} else {
    print_form($smarty, $add);                                           // иначе выводим пустую форму
    show_all($add);
}

?>