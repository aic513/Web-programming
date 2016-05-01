<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_error', 1);
$news = 'Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news = explode("\n", $news);
print_r($_POST);

//Функция вывода всех новостей
function all($news) {
    foreach ($news as $key => $value) {
        echo $value . "<br>";
    }
}

//Функция вывода конкретной новости
function definite($id) {
    global $news;
    echo $news[$id] . '<br/>';
}

//есть ли параметр id в массиве _POST

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    if ($id <= count($news)) {
        definite($id);
    } else {
        header('HTTP/1.0 404 NOT FOUND');
        echo '<h1>ERROR 404 Not Found</h1><br/>';
    }
} else {
    all($news);
}
?>

<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
        <form method="POST" action="">
            <p>
                <input type="text" name="id" value="" />
                <input type="submit" value="Показать" />
            </p>
        </form>
    </body>
</html>