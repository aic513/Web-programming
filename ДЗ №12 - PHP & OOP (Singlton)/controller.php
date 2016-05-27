<?php
error_reporting(E_ERROR|E_PARSE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root.'/Smarty/';
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

//Подключаем классы
spl_autoload_register(function ($class) {
    $class_path = 'lib/' . $class . '.class.php';
    if (file_exists($class_path)) {
        include $class_path;
    }
});

$adsStore = AdsStore::instance();
$adsStore->getAllAdsFromDb();
//передаем 'имя переменной' и 'значение'
$smarty->assign('title', 'Наше объявление');
$smarty->assign('city', $adsStore->getlocationid());
$smarty->assign('category', $adsStore->getCategories());





if (isset($_POST['seller_name'])) {

    if (isset($_POST['private'])) {
        $ad = new AdsCompany($_POST);
    } else {
        $ad = new AdsPrivatePerson($_POST);
    }
}


if (isset($_POST['submit'])){                                // если нажата кнопка добавить/сохранить
        $adsStore->save($_POST);                              
    }
    
    elseif (isset($_POST['clear_form'])){
    }

    elseif (isset ($_POST['clear_base'])) {                     // по кнопке очистить базу, удаляем все строки из таблицы ads
        $adsStore->clearDB();
    }

    elseif (isset($_GET['del_ad'])){                            // если нажата ссылка Удалить
        $adsStore->del((int)$_GET['del_ad']);
        $adsStore->restart();
    }

    elseif (isset($_GET['click_id'])){                          // действие по клику на объявление
        $adsStore->prepareForOut()->display((int)$_GET['click_id']);
        exit();
    }
    $adsStore->prepareForOut()->display();

