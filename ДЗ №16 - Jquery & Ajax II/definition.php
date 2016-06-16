<?php
//error_reporting(E_ALL|E_PARSE);    
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
        require_once $class_path;
    }
});
$adsStore = AdsStore::instance();
$adsStore->getAllAdsFromDb();
$errors = new errors(array('title', 'description','price','seller_name','phone'));
//передаем 'имя переменной' и 'значение'
$smarty->assign('title', 'Наше объявление');
$smarty->assign('city', $adsStore->getlocationid());
$smarty->assign('category', $adsStore->getCategories());