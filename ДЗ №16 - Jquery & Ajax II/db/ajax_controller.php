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
    
//    case 'clear_form':              // очистить форму
//        
//        elseif (isset($_POST['clear_form']))
//        $add = new Ads(0);                   //либо можно реализовать с помощью перезагрузки страницы
//        $smarty->assign('add', $add);
//    
//            if(AdsStore::instance()->clearDB()){
//                $result['status']='success';
//                $result['message'] = "База данных успешно очищена";
//            }else{
//                $result['status']='error';
//                $result['message'] = "Ошибка при очистке базы данных.";
//            }
//            echo json_encode($result);
//            break;
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    default :
        break;
}
