<?php
error_reporting(E_ALL|E_PARSE);    
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


if (isset($_POST['seller_name'])) {

    if (isset($_POST['privat'])) {
        $ad = new AdsCompany($_POST);
    } else {
        $ad = new AdsPrivatePerson($_POST);
    }
}

//условие для ckick_id (редактирование объявления)
 if (isset($_GET['click_id'])) {                     //если объявление уже добавлено,то кликаем по нему
            $adsStore = AdsStore::instance();        //заходит в хранилище
            $add = $adsStore->getAdFromDb($_GET['click_id']);   //возвращает объявление из базы именно с НАШИМ id
            $smarty->assign('add', $add);            //передаем параметры в смарти для вывода на экран
        } else {                                   //если кликать нечего, то
            $add = new Ads(0);                     //создаем новый объект
            $smarty->assign('add', $add);          //и передаем в смарти
        }


if (isset($_POST['submit'])){                                // если нажата кнопка добавить/сохранить
     $add = new Ads($_POST);      
        if ($errors->ad_error_check($add, $smarty)) {
            $smarty->assign('add', $add);
        } else{
        $adsStore->save($_POST);
        $adsStore->restart();
    }
}
   
    elseif (isset($_POST['clear_form'])){
        $add = new Ads(0);                   //либо можно реализовать с помощью перезагрузки страницы
        $smarty->assign('add', $add);
    }

    elseif (isset ($_POST['clear_base'])) {                     // по кнопке очистить базу, удаляем все строки из таблицы ads
         $adsStore->clearDB()->restart();
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

