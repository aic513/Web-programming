<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

//Создан массив $date с пятью элементами и забит с помощью 
//генератора случайных чисел (фукнция rand) метками UNIX
$date = array();

    $date[] = rand(1,  time());
    $date[] = rand(1,  time());
    $date[] = rand(1,  time());
    $date[] = rand(1,  time());
    $date[] = rand(1,  time());

echo '<p>';

//Выводим наименьший день
$min_day = min(
              date('d',$date[0]),
              date('d',$date[1]),
              date('d',$date[2]),
              date('d',$date[3]),
              date('d',$date[4])
              );             
    echo 'Min day: '.$min_day;

echo '<p>';

//Выводим наибольшй месяц

$max_month = max (
              date('m',$date[0]),
              date('m',$date[1]),
              date('m',$date[2]),
              date('m',$date[3]),
              date('m',$date[4])
              );

echo 'Max month: '.$max_month;

//Сортируем массив по возрастанию с помощью фукнкции sort
echo '<p>';
sort($date);
 
      
//Извлекаем последний элемент массива в переменную $selected с помощью функции array_pop
echo '<p>';
$selected = array_pop($date);



//Выводим $selected на экран в формате "дд.мм.ГГ ЧЧ:ММ:СС"
echo 'Dates format:' .date ('d.m.y. H:i:s',$selected);

//Выставляем часовой пояс для Нью-Йорка и проверяем,что часовой пояс был иизменен
echo '<p>';
echo 'Time zone before changes: '.date_default_timezone_get(); 
echo '<p>';
echo 'Time zone after changes: ' .date_default_timezone_set('America/New_York');
echo date_default_timezone_get();
?>
