<?php
    function print_form($smarty,$add,$print_ad=0){                           // функция вывода формы
      $smarty->assign('print_ad', $print_ad);
      $smarty->assign('add', $add);
      $smarty->display('dz8-form.tpl');          
    }
    
    function del_ad($id){                                       // Функция удаления объявления
        global $add;
        unset($add[$id]);
    }
    
   
function save_for_add($add){                                    // функция сохранения объявлений в файле
    file_put_contents('dz8_base.txt', serialize($add));
}
    function restart(){                                         // функция перезапуска скрипта
        header("Location: $_SERVER[SCRIPT_NAME]");
        exit;
    }
  
?>