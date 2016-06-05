<?php
require_once ("definition.php");
switch ($_GET['action']){
    case 'delete':
        $adsStore->del((int)$_GET['del_ad']);
        echo 'Позиция № '.$_GET['del_ad'].' удалена успешно';
        break;
    default :
        break;
}
