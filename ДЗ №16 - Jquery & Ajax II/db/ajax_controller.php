<?php
require_once ("definition.php");
switch ($_GET['action']){
    case 'delete':                         //если удаляем объявление
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
    
    case 'clear_base':
            if ($adsStore->clearDB()){
            $result['status']='success';
            $result['message']='База данных объявлений очищена успешно';
        }
         else{
             $result['status']='error';
             $result['message']='Ошибка при очистке базы данных';
         }
        echo json_encode($result);
    break;
    
default :
        break;
}
