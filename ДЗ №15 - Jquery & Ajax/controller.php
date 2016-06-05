<?php
require_once ("definition.php");


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

//    elseif (isset($_GET['del_ad'])){                            // если нажата ссылка Удалить
//        $adsStore->del((int)$_GET['del_ad']);
//        $adsStore->restart();
//    }

    elseif (isset($_GET['click_id'])){                          // действие по клику на объявление
        $adsStore->prepareForOut()->display((int)$_GET['click_id']);
        exit();
    }
      
    $adsStore->prepareForOut()->display();

