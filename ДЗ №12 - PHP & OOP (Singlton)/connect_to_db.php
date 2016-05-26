<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE );


class db{                                                       // подключение к базе данных
    private static $instance=NULL;
    private $db;

    public static function instance() {
        if(self::$instance == NULL){
            self::$instance = new db();
        }
        return self::$instance->db;
    }
    
    function __construct() {
    require_once ("dbsimple/config.php");
    require_once ("dbsimple/DbSimple/Generic.php");
    require_once ("data_connection.php");
        $this->db = DbSimple_Generic::connect('mysqli://' . $UserName . ':' . $Password . '@' . $ServerName . '/' . $Database);
    }
}

$db = db::instance();
// Устанавливаем обработчик ошибок.
$db->setErrorHandler('databaseErrorHandler');

//Устанавливаем кодировку
$db->query("SET NAMES utf8");

// Код обработчика ошибок SQL.
function databaseErrorHandler($message, $info) {
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) {
        return;
    }
    echo "Соединение не установлено"
    . "<br>Пожалуйста перейдите "
    . "по ссылке для устранения неполадок: "
    . "<a href='install.php'>Устранить!</a>";
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>";
    print_r($info);
    echo "</pre>";
    exit();
}

require_once ("FirePHPCore/FirePHP.class.php");
// инициализируем класс FirePHP
$firePHP = FirePHP::getInstance(TRUE);
// устанавливаем активность
$firePHP->setEnabled(true);

$db->setLogger('myLogger');

function myLogger($db, $sql, $caller) {
    global $firePHP;
    if (isset($caller['file'])) {
        $firePHP->group('at ' . @$caller['file'] . ' line ' . @$caller['line']);
    }
    $firePHP->log($sql);
    if (isset($caller['file'])) {
        $firePHP->groupEnd();
    }
}
?>