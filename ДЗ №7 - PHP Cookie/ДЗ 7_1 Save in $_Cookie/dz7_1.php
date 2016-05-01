<?php

header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("dz7_1-functions.php");                              // подключаем файл с функциями

$ad_cookie = array();                                              // Определяем хранилище для кук в виде массива
if (isset($_COOKIE['ad_cookie']) && $_COOKIE['ad_cookie'] != 'NULL') {  // если существует кука с индексом ad_cookie и если она не пустая,то
    $ad_cookie = unserialize($_COOKIE['ad_cookie']);             // десериализуем(расшифровываем) данные из $_COOKIE['ad_cookie'] и записываем их в $ad_cookie
}


if (isset($_POST['confirm_add'])) {                          // кнопка добавить
    if (is_numeric($_POST['id_r'])) {                        // если присутствует метка id_r то сохраняем редактируемое объявление -
        $ad_cookie[$_POST['id_r']] = $_POST;           //  - изменяем запись в массиве $_SESSION['ad'][] по ключу id_r
    } else {
        $ad_cookie[] = $_POST;                         // добавляем новое объявлениев массив $_SESSION['ad'][]
    }
    save_for_ad_cookie($ad_cookie);                        //сохраняем все в куки
    restart();                                              // вызываем restart(); для очистки формы


} elseif (isset($_POST['clear_form']) || isset($_POST['back'])) {      // кнопка очистить форму  вызывает restart();
    save_for_ad_cookie('NULL');
    restart();


} elseif (isset ($_POST['clear_base'])) {                     // по кнопке очистить базу очищаем массив $_SESSION['ad']
    unset($_SESSION['ad']);
    restart();


} elseif (isset($_GET['del_ad'])) {                            // ловим ключ del_ad в массиве $_GET
    del_ad((int)($_GET['del_ad']));                         // и удаляем запись по этому ключу в массиве $_SESSION['ad']
    $ad_cookie = array_values($ad_cookie);        // переназначаем ключи массива с объявлениями после удаления по порядку
   save_for_ad_cookie($ad_cookie);
    restart();


} elseif (isset($_GET['click_id'])) {                          // действие по клику на объявление
    $click_id = (int)$_GET['click_id'];                     // присваиваем переменной $click_id номер кликнутого объявления
    $ad_cookie[$click_id]['id'] = $click_id;           // присваиваем элементу массива с текущимобъявлением его номер в ключ id для возможности его сохранения
    print_form( $ad_cookie[$click_id]);                 // выводим объявление в форму


} else {
    print_form();                                           // иначе выводим пустую форму
    show_all($ad_cookie);
}
?>