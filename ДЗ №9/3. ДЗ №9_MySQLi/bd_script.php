<?php

function add_table($db, $cities) {                                                  //функция добавления массива в базу данных
    foreach ($cities as $key => $value) {
        mysqli_query($db, 'insert into cities (id,city) values (' . $key . ",'" . $value . "')") or die('Запрос не удался:' . mysqli_error($db));  //добавляем внутрь cities 
                                                                                                                                                   //со значениями id & city 
                                                                                                                                                   //значения key&value
    }
}


function add_table1($db, $category) {                                                    //функция добавления массива в базу данных
    $count = 0;                                                                  //добавляем id
    foreach ($category as $key => $value) {
        $count++;                                                                //с каждым проходом id увеличивается
        mysqli_query($db, 'replace into category (id, category) values (' . $count . ",'" . $key . "')"); //заменяем внутри category 
                                                                                                          //со значениями id & category 
                                                                                                          //значения count&key
        foreach ($value as $key1 => $value1) {
            mysqli_query($db, 'replace into category (id, category, parent_id) values (' . $key1 . ",'" . $value1 . "'," . $count . ")");
        }
    }
}


function get_cities($db) {
    $cities_query = mysqli_query($db, 'select * from cities');              //выбираем из базы данных города и записываем их в массив
    while ($row = mysqli_fetch_assoc($cities_query)) {
        $cities[$row['id']] = $row['city'];
    }
    return $cities;
}


function get_category($db) {
    $categories_query = mysqli_query($db, 'select * from category');      //выбираем из базы данных категории и записываем их в массив
    while ($row = mysqli_fetch_assoc($categories_query)) {                //работаем с каждой строкой запроса,
        if (!$row['parent_id']) {                                         //если строки с таким ключом нет,то
            $general_category[$row['id']] = $row['category'];             //тогда это главная категория
        } else {                                                          //иначе это суб категория
            $sub_category[$row['parent_id']][$row['id']] = $row['category'];
        }
    }
    foreach ($general_category as $key => $value) {
        $category[$value] = $sub_category[$key];
    }
    return $category;
}
