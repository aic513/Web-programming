<?
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors', 1);
echo 'Задание 1<p>';

$name = 'Денис';
$age = 26;
    
echo 'Меня зовут '.$name.'<br>';
echo 'Мне '.$age.' лет <p>';
   
unset($name);
unset($age);

echo 'Задание 2<p>';
define('MY_CITY','Калуга');
    
    if(MY_CITY){
        echo MY_CITY.'<p>';
    }    
    
    echo 'Задание 3<p>';
    
    
    $book = array();
    $book['title']='Евгений Онегин';
    $book['author']='А.С.Пушкин';
    $book['pages']=587;
    echo 'Недавно я прочитал книгу '.$book['title'].', написанную автором '.$book['author'].', я осилил все '.$book['pages'].' страниц, мне она очень понравилась.<p>';
    
    
    
    echo 'Задание 4<p>';
    
    $book1 = array('title_1'=>'"Преступление и наказание"', 'author_1'=>'Ф.М.Достоевский', 'pages_1'=>'863');
    $book2 = array('title_2'=>'"Отцы и дети"', 'author_2'=>'И.С.Тургенев', 'pages_2'=>'567');
    $books = array($book1,$book2);
    $sum_pages = $books['0']['pages_1']+$books['1']['pages_2']; 
    echo 'Недавно я прочитал книги '.$books['0']['title_1'].' и '.$books['1']['title_2'].', написанные соответственно авторами '.$books['0']['author_1'].' и '.$books['1']['author_2'].', я осилил в сумме '.$sum_pages.' страниц, не ожидал от себя подобного';
?>
