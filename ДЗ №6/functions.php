<?php

//Функция вывода всех объявлений в строку
function showID() {

    foreach ($_SESSION['ID'] as $key => $value) {
        echo '<tr>| <a href="http://laba_6?id=' . $key . '">' . $value['title'] . '</a>' . '|' . $value['price'] . ' рублей |' . $value['seller_name'] .
        '| <a> href = "?delete=' . $key . '">Удалить</a></tr>';
        echo '</br>';
    }

    if (isset($_SESSION['ID'])) {
        echo '<tr>| <a href="http://laba_6?id=' . $key . '">' . $value['title'] . '</a>' . '|' . $value['price'] . ' рублей |' . $value['seller_name'] .
        '| <a> href = "?delete=' . $key . '">Удалить</a></tr>';
        echo '</br>';
    }
}


//Функция выбора селектов на все категории,сделал каждую категорию массивом  и подключил
//к файлу с функциями
require_once 'data-info.php';

function selected($var) {
    global $city, $metro,$highway, $massive;
    if ($var == 'city') {
        foreach ($city as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['location_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    } 
    
    elseif ($var == 'highway') {
        foreach ($metro as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['road_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    }
    
    elseif ($var == 'metro') {
        foreach ($metro as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['metro_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    } elseif ($var == 'category') {
        foreach ($massive as $general_category => $value) {
            echo sprintf('<optgroup label="%s">', $ganeral_category);
            foreach ($value as $key_ID => $class) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key_ID == $_SESSION[$_GET['id']]['category_id']) {
                    echo sprintf('<option selected=""  value="%d">%s</option>', $key_ID, $class);
                } else {
                    echo sprintf('<option value="%d">%s</option>', $key_ID, $class);
                }
            }
    }
    }
}



//Функция удаления объявления
function Delete_ID() {
    unset($_SESSION['ID'][intval($_GET['delete'])]);
}

//Функция редактирования объявления
function Edit_ID() {
    $_SESSION['ID'][ intval( $_GET ['edit_ID'] ) ] = array_pop( $_SESSION['ID'] );
}