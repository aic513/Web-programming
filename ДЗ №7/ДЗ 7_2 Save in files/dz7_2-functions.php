<?php

    function print_form($print_ad=0){                           // функция вывода формы
        if (isset($print_ad['id'])){                            // если имеется метка с номер для редактирования изменяем название кнопки Добавить на Сохранить
            $ad_edit = 'Сохранить';
        }
        else {
            $ad_edit = 'Добавить';
            $hide_back = 'hidden=""';
        }
        require_once("dz7_2-form.php");                                 // подключаем файл с HTML формой
    }
    
    function show_city_block($city_code=''){                    // функция вывода блока с выбором города
        $citys = array('641780'=>'Новосибирск','641490'=>'Барабинск','641510'=>'Бердск','641600'=>'Искитим','641630'=>'Колывань','641680'=>'Краснообск',
                '641710'=>'Куйбышев','641760'=>'Мошково','641790'=>'Обь','641800'=>'Ордынское','641970'=>'Черепаново');
    
        foreach($citys as $code=>$city){
            $selected = ($code==$city_code) ? 'selected=""' : '';
            echo '<option data-coords=",," '.$selected.' value="'.$code.'">'.$city.'</option>';
        }
    }
    
    function show_category_block($category_code=''){            // функция вывода блока с выбором категории
    $categorys_string = '
[Транспорт]
9 = Автомобили с пробегом;
109 = Новые автомобили;
14 = Мотоциклы и мототехника;
81 = Грузовики и спецтехника;
11 = Водный транспорт;
10 = Запчасти и аксессуары;
[Недвижимость]
24 = Квартиры;
23 = Комнаты;
25 = Дома, дачи, коттеджи;
26 = Земельные участки;
85 = Гаражи и машиноместа;
42 = Коммерческая недвижимость;
86 = Недвижимость за рубежом;
[Работа]
111 = Вакансии;
112 = Резюме;
[Услуги]
114 = Предложения услуг;
115 = Запросы на услуги;
[Личные вещи]
27 = Одежда, обувь, аксессуары;
29 = Детская одежда и обувь;
30 = Товары для детей и игрушки;
28 = Часы и украшения;
88 = Красота и здоровье;
[Для дома и дачи]
21 = Бытовая техника;
20 = Мебель и интерьер;
87 = Посуда и товары для кухни;
82 = Продукты питания;
19 = Ремонт и строительство;
106 = Растения;
[Бытовая электроника]
32 = Аудио и видео;
97 = Игры, приставки и программы;
31 = Настольные компьютеры;
98 = Ноутбуки;
99 = Оргтехника и расходники;
96 = Планшеты и электронные книги;
84 = Телефоны;
101 = Товары для компьютера;
105 = Фототехника;
[Хобби и отдых]
33 = Билеты и путешествия;
34 = Велосипеды;
83 = Книги и журналы;
36 = Коллекционирование;
38 = Музыкальные инструменты;
102 = Охота и рыбалка;
39 = Спорт и отдых;
103 = Знакомства;
[Животные]
89 = Собаки;
90 = Кошки;
91 = Птицы;
92 = Аквариум;
93 = Другие животные;
94 = Товары для животных;
[Для бизнеса]
116 = Готовый бизнес;
40 = Оборудование для бизнеса;';

$categorys = parse_ini_string($categorys_string, true);

        foreach($categorys as $subcat_code=>$subcategorys){
            echo '<optgroup label="' . $subcat_code . '">';
            foreach ($subcategorys as $code => $category) {
                $selected = ($code==$category_code) ? 'selected=""' : '';
                echo '<option data-coords=",," '.$selected.' value="'.$code.'">'.$category.'</option>';
            }
        }
}
                
    function del_ad($id){                                       // Функция удаления объявления
        global $ad_cookie;
        unset($ad_cookie[$id]);
    }
    
    function show_all($ad_cookie){                                        // Функция вывода всех объявлений из $_SESSION
    if (!empty($ad_cookie)){
        foreach ($ad_cookie as $num => $ad) {
            echo "<div align='left'><a href='$_SERVER[SCRIPT_NAME]?click_id=$num'>".($num+1).") {$ad['title']}  </a> |   Цена: {$ad['price']} | Продавец: {$ad['seller_name']} | <a href='$_SERVER[SCRIPT_NAME]?del_ad=$num'>Удалить</a><br>";
        }
    }
    }

function save_for_ad_cookie($ad_cookie){                                    // функция сохранения объявлений в куки
    setcookie('dz7_base.txt', serialize($ad_cookie));
    setcookie('ad_cookie', serialize($ad_cookie), time()-10000);
}

    function restart(){                                         // функция перезапуска скрипта
        header("Location: $_SERVER[SCRIPT_NAME]");
        exit;
    }
  
?>