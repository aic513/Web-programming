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
    
    
    case 'submit_add':
            $add = new Ads($_POST);
            if ($_POST['private']) {
                $ad = new AdsCompany($_POST);
            } else {
                $ad = new AdsPrivatePerson($_POST);
            }
            
            foreach ($_POST as $key => $value) {
                if(($key=='seller_name')||($key=='id')||
                ($key=='phone')||($key=='title')||
                ($key=='description')||($key=='price')){
                    $result[$key]=$value;
                }
            }
            
            $err = $errors->ad_error_check($add, $smarty);
            if ($err['status']) {
                $result['status'] = 'error';
                $result['message'] = 'Заполните,пожалуйста,поле';
                $result['fields'] = $err['fields'];
                $result['all_fields'] = $err['all_fields'];
            } else {
                $result['status'] = 'success';
                $result['message'] = 'Товар добавлен успешно';
                $result['all_fields'] = $err['all_fields'];
                $adss=$adsStore->save($_POST);
                $result['actions'] = $_POST['addEdit']; //изменил на $_POST, чтобы объявления редактировались
                $result['id']=$adss->getlastAdId();
            }
            echo json_encode($result);
    break;
    
    
    case 'edit_add':    //из базы записывает в форму
        
            $adsStore = AdsStore::instance();        //заходит в хранилище
            $add = $adsStore->getAdFromDb($_POST['id']);   //возвращает объявление из базы именно с НАШИМ id
            echo json_encode($add);
        break;
    
    default :
        break;
}
