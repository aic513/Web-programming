<?php
session_start();

$city = array('641780'=>'Новосибирск',
         '641490'=>'Барабинск',
         '641510'=>'Бердск',
         '641600'=>'Искитим',
         '641630'=>'Колывань',
         '641680'=>'Краснообск',
         '641710'=>'Куйбышев',
         '641760'=>'Мошково',
         '641790'=>'Обь',
         '641800'=>'Ордынское',
         '641970'=>'Черепанов');

$metro = array('2028'=>'Берёзовая роща',
          '2018'=>'Гагаринская',
          '2017'=>'Заельцовская',
          '2029'=>'Золотая Нива',
          '2019'=>'Красный проспект',
          '2027'=>'Маршала Покрышкина',
          '2021'=>'Октябрьская');

$highway = array('56'=>'Бердское шоссе',
            '57'=>'Гусинобродское шоссе',
            '53'=>'Дачное шоссе',
            '55'=>'Краснояровское шоссе',
            '54'=>'Мочищенское шоссе',
            '52'=>'Ордынское шоссе',
            '58'=>'Советское шоссе');

$realty = array('25' => 'Дома, дачи, коттеджи',
           '26' => 'Земельные участки',
           '24'=>'Квартиры',
           '23'=>'Комнаты',
           '85'=>'Гаражи и машиноместа',
           '86'=>'Недвижимость за рубежом',
           '42' => 'Коммерческая недвижимость');

$avto = array('9' => 'Автомобили с пробегом',
        '109' => 'Новые автомобили',
        '14' => 'Мотоциклы и мототехника',
        '81'=>'Грузовики и спецтехника',
        '11'=>'Водный транспорт',
        '10'=>'Запчасти и аксессуары');


$paraphernalia = array('27' =>'Одежда, обувь, аксессуары',
                  '29'=>'Детская одежда и обувь',
                  '30'=>'Товары для детей и игрушки',
                  '28'=>'Часы и украшения',
                  '88'=>'Красота и здоровье'); 
               
$at_home = array('21'=>'Бытовая техника',
            '20'=>'Мебель и интерьер',
            '87'=>'Посуда и товары для кухни',
            '82'=>'Продукты питания',
            '19'=>'Ремонт и строительство',
            '106'=>'Растения');

$hobby = array('33'=>'Билеты и путешествия',
          '34'=>'Велосипеды',
          '83'=>'Книги и журналы',
          '36'=>'Коллекционирование',
          '38'=>'Музыкальные инструменты',
          '102'=>'Охота и рыбалка',
          '39'=>'Спорт и отдых',
          '103'=>'Знакомства');

$animals = array('89'=>'Собаки',
            '90'=>'Кошки',
            '91'=>'Птицы',
            '92'=>'Аквариум',
            '93'=>'Другие животные',
            '94'=>'Товары для животных');



$massive = array('Недвижимость' => $realty, 'Транспорт' => $avto,'Личные вещи' =>$paraphernalia,'Для дома' =>$at_home,'Хобби' =>$hobby,'Животные'=>$animals);

function showID() {
    foreach ($_SESSION as $key => $value) {//
        echo '| <a href="http://laba_6?id=2' . $key . '">' . $value['title'] . '</a>' . '|' . $value['price'] . ' рублей |' . $value['seller_name'] .
        '| <a href="http://laba_6?id=2' . $key . '">Удалить</a><br>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    $_SESSION[uniqid()] = $_POST;
} elseif (isset($_GET['edit'])) {
    unset($_SESSION[$_GET['edit']]);
}


function checked($var, $number) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && isset($_SESSION[$_GET['id']][$var]) && $_SESSION[$_GET['id']][$var] == $number) {
        echo 'checked';
    }
}


function selected($var) {
    global $city, $metro,$highway, $massive;
    if ($var == 'city') {
        foreach ($city as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['location_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    } 
    
    elseif ($var == 'highway') {
        foreach ($metro as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['road_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    }
    
    elseif ($var == 'metro') {
        foreach ($metro as $key => $value) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key == $_SESSION[$_GET['id']]['metro_id']) {
                echo sprintf('<option selected="" value="%d">%s</option>', $key, $value);
            } else {
                echo sprintf('<option value="%d">%s</option>', $key, $value);
            }
        }
    } elseif ($var == 'category') {
        foreach ($massive as $general_category => $value) {
            echo sprintf('<optgroup label="%s">', $ganeral_category);
            foreach ($value as $key_ID => $class) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $key_ID == $_SESSION[$_GET['id']]['category_id']) {
                    echo sprintf('<option selected=""  value="%d">%s</option>', $key_ID, $class);
                } else {
                    echo sprintf('<option value="%d">%s</option>', $key_ID, $class);
                }
            }
    }
    }
}

function returnID($var) {
    global $select;
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && isset($_SESSION[$_GET['id']][$var])) {
        echo $_SESSION[$_GET['id']][$var];
//       
}




?>



<form method="post" id="data">
    <div class="form-row-indented">
        <label class="form-label-radio">
            <input type="radio" checked<?php checked('private', '1'); ?> value="1" name="private">Частное лицо</label>
        <label class="form-label-radio">
            <input <?php checked('private', '0'); ?> type="radio" value="0" name="private">Компания</label>
    </div>
    <div class="form-row">
        <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
        <input  value="<?php returnID('seller_name') ?> type="text" maxlength="40" class="form-input-text" value="" name="seller_name" id="fld_seller_name">
    </div>
    <div style="display: none;" id="your-manager" class="form-row">
        <label for="fld_manager" class="form-label"><b>Контактное лицо</b></label>
        <input type="text" class="form-input-text" maxlength="40" value="" name="manager" id="fld_manager">
        <em class="f_r_g">&nbsp;&nbsp;необязательно</em>
    </div>
    <div class="form-row">
        <label for="fld_email" class="form-label">Электронная почта</label>
        <input value="<?php returnID('email') ?>" type="text" class="form-input-text" value="" name="email" id="fld_email">
    </div>
    <div class="form-row-indented">
        <label class="form-label-checkbox" for="allow_mails">
            <input <?php checked('allow_mails', '1'); ?> type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox"><span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label>
    </div>
    <div class="form-row">
        <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
        <input type="text" class="form-input-text" value="" name="phone" id="fld_phone">
    </div>
    <div id="f_location_id" class="form-row form-row-required">
        <label for="region" class="form-label">Город</label>
        <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select">
            <option value="">-- Выберите город --</option>
            <option class="opt-group" disabled="disabled">-- Города --</option>
            <?php selected('city'); ?>   
        </select>
        <div id="f_metro_id">
            <select title="Выберите станцию метро" name="metro_id" id="fld_metro_id" class="form-input-select">
                <option value="">-- Выберите станцию метро --</option>
                 <?php selected('metro'); ?></select>
            </select>
        </div>
                <div id="f_road_id">
            <select title="Выберите направление" name="road_id" id="fld_road_id" class="form-input-select" style="display: none;">
                <option value="">-- Выберите направление --</option>
               <?php selected('highway'); ?></select>
            </select>
        </div>
    </div>
    <div class="form-row">
        <label for="fld_category_id" class="form-label">Категория</label>
        <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select">
            <option value="">-- Выберите категорию --</option>
           <?php selected('category'); ?>
        </select>
    </div>
    <div style="display: none;" id="params" class="form-row form-row-required">
        <label class="form-label ">
            Выберите параметры
        </label>
        <div class="form-params params" id="filters">
        </div>
    </div>
    <div id="f_map" class="form-row form-row-required hidden">
        <label class="form-label c-2">Укажите местоположение объекта на&nbsp;карте</label>
        <div class="b-address-map j-address-map disabled">
            <div class="wrapper">
                <div class="map" id="address-map"></div>
                <div class="overlay">
                    <div class="modal">Сначала <span class="fill-in pseudo-link">укажите адрес</span></div>
                </div>
            </div>
            <div class="result c-2 hidden">
                <div class="map-success">
                    Маркер указывает на: <span class="address-line"></span>.
                    <span class="confirm pseudo-link hidden">Это верный адрес</span> </div>
                <div class="map-error">Мы не смогли автоматически определить адрес.</div>
            </div>
            <input type="hidden" disabled="disabled" value="" class="j-address-latitude" name="coords[lat]">
            <input type="hidden" disabled="disabled" value="" class="j-address-longitude" name="coords[lng]">
            <input type="hidden" disabled="disabled" value="" class="j-address-zoom" name="coords[zoom]"> </div>
    </div>
    <div id="f_title" class="form-row f_title">
        <label for="fld_title" class="form-label">Название объявления</label>
        <input type="text" maxlength="50" class="form-input-text-long" value="<?PHP returnID('title') ?>" name="title" id="fld_title"> </div>
    <div class="form-row">
        <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label>
        <textarea maxlength="3000" name="description" <?PHP returnID('description') ?> id="fld_description" class="form-input-textarea"></textarea>
    </div>
    <div id="price_rw" class="form-row rl">
        <label id="price_lbl" for="fld_price" class="form-label">Цена</label>
        <input type="text" maxlength="9" class="form-input-text-short" value="<?PHP returnID('price') ?>" name="price" id="fld_price">&nbsp;<span id="fld_price_title">руб.</span> <a class="link_plain grey right_price c-2 icon-link" id="js-price-link" href="/info/pravilnye_ceny?plain"><span>Правильно указывайте цену</span></a> </div>
    <div id="f_images" class="form-row">
        <label for="fld_images" class="form-label"><span id="js-photo-label">Фотографии</span><span class="js-photo-count" style="display: none;"></span></label>
        <input type="file" value="image" id="fld_images" name="image" accept="image/*" class="form-input-file"> <span style="line-height:22px;color: gray; display: none;" id="fld_images_toomuch">Вы добавили максимально возможное количество фотографий</span> <span style="display: none;" id="fld_images_overhead"></span> </div>
    <div style="display: none; margin-top: 0px;" class="form-row-indented images" id="files">
        <div style="display: none;" id="progress">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <div></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
        <div class="vas-submit-button pull-left"> <span class="vas-submit-border"></span> <span class="vas-submit-triangle"></span>
            <input type="submit" value="Далее" id="form_submit" name="main_form_submit" class="vas-submit-input"> </div>
    </div>
</form>

<?php
showID();
if (empty($_SESSION)) {
    echo "<br><h2>Объявления отсутствуют</h2>";
}
