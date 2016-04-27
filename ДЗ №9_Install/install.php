<?php
    if (isset($_POST['INSTALL'])) {                                                               //Если нажата кнопка INSTALL
        if (!$commo = mysql_connect($_POST['ServerName'], $_POST['UserName'], $_POST['Password'])) {
            die('Невозможно установить соединение!');
        }
        if(mysql_select_db($_POST['Database'])){                                     //Если выбрана именно наша БД-localhost
            mysql_query('drop database ' . $_POST['Database']);                      //удаляем ее (тем самым очищая содержимое)
        }
        mysql_query('create database ' . $_POST['Database']);                        //затем создаем ее заново
        mysql_select_db($_POST['Database']) or die('не была выбрана база данных');   // снова выбираем ее
        
        
                                                   //--Исполнение и загрузка файла main_bd.sql--//
        $commands = '';
        $rows = file("db/main_bd.sql");                                        //читает содержимое файла и помещает его в массив
        foreach ($rows as $row)
        {
            if (substr($row, 0, 2) == '--' || $row == ''){         //Возвращает подстроку $row, 
                                                                       // начинающейся с 0-го символа по счету и длиной в 2 символа
            continue;
            }
            $commands .= $row;                  //дополняем значение $commands значением $row
            if (substr(trim($row), -1, 1) == ';')        //удаляем проблемы сначала и с конца строки
            {
                mysql_query($commands) or die('Ошибка запроса'.$commands . mysql_error().  '<br>');                                                   //Исполняем файл
                $commands = '';
            }
        }
        mysql_close();
        $f = fopen('data_connection.php', 'w');            // открываем файл для записи
        fwrite($f, "<?php\n");                             // записываем <?php\n в $f
        foreach ($_POST as $key => $value) {
            if ($key == 'INSTALL') {                        //Если ключ == Instal
                continue;                                   //завершаем цикл
            }
            fwrite($f, '$' . $key . " = '" . $value . "';\n");  //
        }
        fclose($f);
        header('Location: index.php');
    }
    
    $smarty_dir='smarty/';    
    require($smarty_dir . '/libs/Smarty.class.php');
    $smarty = new Smarty();
    $smarty->compile_check = true;
    $smarty->debugging = false;
    $smarty->template_dir = $smarty_dir . 'templates';
    $smarty->compile_dir = $smarty_dir . 'templates_c';
    $smarty->cache_dir = $smarty_dir . 'cache';
    $smarty->config_dir = $smarty_dir . 'configs';
    $smarty->display('install.tpl');
?>



    
        