<?php
require_once ("definition.php");
switch ($_GET['action']){
    case 'delete':
        if ($adsStore->del((int)$_GET['del_ad'])){
            $result['status']='success';
            $result['message']='Позиция № '.$_GET['del_ad'].' удалена успешно';
        }
         else{
             $result['status']='error';
             $result['message']='Ошибка удаления товара';
         }
         
         echo json_encode($result);
       
        break;
    default :
        break;
}
