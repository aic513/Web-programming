<?php
                                                                       //Пишем функцию для соединения с базой данных
function connect_bd($server_name,$user_name,$password,$db){
    $connect=  mysql_connect($server_name, $user_name, $password)or die('MySQL сервер недоступен'.  mysql_error());    //устанавливаем соединение с сервером
    echo "Соединение с сервером установлено успешно<br>" ;
    mysql_select_db($db) or die('соединение с базой данных установить не удалось');               //устанавливаем соединение с нужной нам базой данных
    mysql_query("SET NAMES UTF8");                                                         //сообщаем mysql в какой кодировке мы собираемся работать с БД
    echo "База данных выбрана успешно";
    
}

function add_table($citys){                                                  //функция добавления массива в базу данных
    foreach ($citys as $key => $value) {
        mysql_query('insert into cities (id,city) values ('.$key.",'".$value."')") or die ('Запрос не удался:'.  mysql_error());  //добавляем внутрь cities 
                                                                                     //со значениями id & city 
                                                                                     //значения key&value
    }
}

function add_table1($citys){                                                    //функция добавления массива в базу данных
    $count = 0;                                                                  //добавляем id
    foreach ($citys as $key => $value) {
        $count++;                                                                //с каждым проходом id увеличивается
        mysql_query('replace into category (id, category) values ('.$count.",'".$key."')"); //добавляем внутрь category 
                                                                                            //со значениями id & category 
                                                                                            //значения count&key
        foreach ($value as $key1 => $value1) {
            mysql_query('replace into category (id, category, parent_id) values ('.$key1.",'".$value1."',". $count .")");
        }
    }
}