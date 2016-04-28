<?php
                                                                       //Пишем функцию для соединения с базой данных
function connect_bd($server_name,$user_name,$password,$db){
    $connect=  mysql_connect($server_name, $user_name, $password)or die('MySQL сервер недоступен'.  mysql_error());    //устанавливаем соединение с сервером
//    echo "Соединение с сервером установлено успешно<br>" ;
    mysql_select_db($db) or die('соединение с базой данных установить не удалось');               //устанавливаем соединение с нужной нам базой данных
    mysql_query("SET NAMES UTF8");                                                         //сообщаем mysql в какой кодировке мы собираемся работать с БД
//    echo "База данных выбрана успешно";
    
}

function add_table($cities){                                                  //функция добавления массива в базу данных
    foreach ($cities as $key => $value) {
        mysql_query('insert into cities (id,city) values ('.$key.",'".$value."')") or die ('Запрос не удался:'.  mysql_error());  //добавляем внутрь cities 
                                                                                     //со значениями id & city 
                                                                                     //значения key&value
    }
}

function add_table1($category){                                                    //функция добавления массива в базу данных
    $count = 0;                                                                  //добавляем id
    foreach ($category as $key => $value) {
        $count++;                                                                //с каждым проходом id увеличивается
        mysql_query('replace into category (id, category) values ('.$count.",'".$key."')"); //заменяем внутри category 
                                                                                            //со значениями id & category 
                                                                                            //значения count&key
        foreach ($value as $key1 => $value1) {
            mysql_query('replace into category (id, category, parent_id) values ('.$key1.",'".$value1."',". $count .")");
        }
    }
}

function get_cities() {
    $cities_query = mysql_query('SELECT * FROM cities');              //выбираем из базы данных города и записываем их в массив
        while ($row = mysql_fetch_assoc($cities_query)) {
            $cities[$row['id']] = $row['city'];
    }
    return $cities;
}
    
function get_category() {
    $categories_query = mysql_query('SELECT * FROM category');      //выбираем из базы данных категории и записываем их в массив
    while ($row = mysql_fetch_assoc($categories_query)) {          //работаем с каждой строкой запроса,
        if (!$row['parent_id']) {                                  //если строки с таким ключом нет,то
            $general_category[$row['id']] = $row['category'];      //тогда это главная категория
            } else {                                                      //иначе это суб категория
                $sub_category[$row['parent_id']][$row['id']] = $row['category'];
        }
    }
    foreach ($general_category as $key => $value) {
        $category[$value] = $sub_category[$key];
    }
    return $category;
}
