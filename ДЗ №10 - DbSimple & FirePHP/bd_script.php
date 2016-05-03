<?php

//---------------------------функция добавления массива городов в базу данных OPEN-----------------------------------------//
function add_table($db, $cities) {                                                  
    foreach ($cities as $key => $value) {
        $db->query('INSERT INTO `cities` (id,city) VALUES (' . $key . ",'" . $value . "')") or die('Запрос не удался:');  //добавляем внутрь cities 
                                                                                                                        //со значениями id & city 
                                                                                                                        //значения key&value
    }
}
//---------------------------функция добавления массива городов в базу данных CLOSE-----------------------------------------//



//-------------------------------------функция добавления массива категорий в базу данных OPEN-----------------------------------//
function add_table1($db, $category) {                                                    
    $count = 0;                                                                  //добавляем id
    foreach ($category as $key => $value) {
        $count++;                                                                //с каждым проходом id увеличивается
        $db->query('REPLACE INTO `category` (id, category) VALUES (' . $count . ",'" . $key . "')"); //заменяем внутри category 
                                                                                                     //со значениями id & category 
                                                                                                     //значения count&key
        foreach ($value as $key1 => $value1) {
            $db->query('REPLACE INTO `category` (id, category, parent_id) VALUES (' . $key1 . ",'" . $value1 . "'," . $count . ")");
        }
    }
}
//-------------------------------------функция добавления массива категорий в базу данных CLOSE-----------------------------------//




//----------------функция добавления городов из БД в селекторы OPEN----------------------------------------------//
function get_city($db) {
    $city_query = $db->select('SELECT id AS ARRAY_KEY,city FROM `cities`');              //выбираем из базы данных города и записываем их в массив
        foreach ($city_query as $key => $value) {                                       //Приводим к правильному виду
            $city[$key] = $value['city'];                                               
        }   
    return $city;
}
//----------------функция добавления городов из БД в селекторы OPEN----------------------------------------------//



//----------------функция добавления категорий из БД в селекторы OPEN----------------------------------------------//
function get_category($db) {
    $category_query = $db->select('SELECT id AS ARRAY_KEY,category,parent_id AS PARENT_KEY FROM `category`');   //выбираем из базы данных категории и записываем их в массив
        foreach ($category_query as $key => $value) {                                                          //Приводим к правильному виду
            if (!$key) {                                                                                            
             $category[$key] = $value['category'];
        }
        foreach ($value['childNodes'] as $number => $title) {
            $category[$value['category']][$number] = $title['category'];
        }
    }
    return $category;
}

//----------------функция добавления категорий из БД в селекторы ClOSE----------------------------------------------//