<?php
    function print_form($print_ad=0){                           // функция вывода формы
                            
           require_once("dz8-form.php");                                 // подключаем файл с HTML формой
    }
    
    function selected($name, $id = 0){               // выводим селектор с городами и категориями
        foreach($name as $key => $value){
            if(is_array($value)){
                echo "<optgroup label='$key'>";
                selected($value,$id);
                echo '</optgroup>';
            }else{
                $selected = ( $id == $key )? 'selected' : '';
                echo '<option '.$selected.' value='.(int)$key.'>'.$value.'</option>';
            }
        }
    }
    
   
                
    function del_ad($id){                                       // Функция удаления объявления
        global $add;
        unset($add[$id]);
    }
    
    function show_all($add){                                        // Функция вывода всех объявлений из $add
    if (!empty($add)){
        foreach ($add as $num => $ad) {
            echo "<div align='left'><a href='$_SERVER[SCRIPT_NAME]?click_id=$num'>".($num+1).") {$ad['title']}  </a> |   Цена: {$ad['price']} | Продавец: {$ad['seller_name']} | <a href='$_SERVER[SCRIPT_NAME]?del_ad=$num'>Удалить</a><br>";
        }
    }
    }
function save_for_add($add){                                    // функция сохранения объявлений в файле
    file_put_contents('dz8_base.txt', serialize($add));
}
    function restart(){                                         // функция перезапуска скрипта
        header("Location: $_SERVER[SCRIPT_NAME]");
        exit;
    }
  
?>