<?php
header("Content-Type: text/html; charset=utf-8");
require_once("dz7_2-functions.php");                              // подключаем файл с функциями
if (file_exists('dz7_base.txt')) {                                  // если такой файл существует
    $add = unserialize(file_get_contents('dz7_base.txt'));        // расшифровываем данные и записываем их в $add
}
 if (!is_array($add)){                           // если $add не массив,делаем его таким,чтобы данные передавались через foreach
        $add = array(); 
    } 
    


if (isset($_POST['confirm_add'])) {                          // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                        // если присутствует метка id_r то сохраняем редактируемое объявление -
        $add[$_POST['id_r']] = $_POST;           //  - изменяем запись в массиве $_SESSION['ad'][] по ключу id_r
    } else {
        $add[] = $_POST;                         // добавляем новое объявлениев массив $_SESSION['ad'][]
    }
    save_for_add($add);                        //сохраняем все в $add
    restart();                                              // вызываем restart(); для очистки формы
    
    
} elseif (isset($_POST['clear_form']) || isset($_POST['back'])) {      // кнопка очистить форму  вызывает restart();
    restart();
    
    
} elseif (isset($_POST['clear_base'])) {                     // по кнопке очистить базу очищаем массив $_SESSION['ad']
    save_for_add('NULL');
    restart();
    
    
} elseif (isset($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
    del_ad((int) ($_GET['del_ad']));                         // и удаляем запись по этому ключу в массиве $_SESSION['ad']
    $add = array_values($add);
    save_for_add($add);
    restart();
    
    
} elseif (isset($_GET['click_id'])) {                          // действие по клику на объявление
    $click_id = (int)$_GET['click_id'];                     // присваиваем переменной $click_id номер кликнутого объявления
   if (isset($add[$click_id])){                             // если объявление такое существует
            print_form($add[$click_id]);                    // выводим в форму
        }
        
}

else {
    print_form();                                           // иначе выводим пустую форму
    show_all($add);
}
?>