<?php
//error_reporting(E_ERROR|E_WARNING|E_PARSE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");
//===========================================================================================================================================//
require_once ("connect_to_db.php");                   //подключаемся к самой БД

//=============================================================================================================================================//

                                                //----Создаем хранилище объявлений----//
                                                               //----OPEN----//

class AdsStore{
    private static $instance = NULL;
    private $ads = array();
    
    public static function instance() {
        if(self::$instance == NULL){
            self::$instance = new AdsStore();
        }
        return self::$instance;
    }
    
    public function getAdFromDb($id){                                           // возвращает объявление из базы по id
       return $this->ads[$id];
    }
    
    public function addAds(Ads $add) {                                           // добавляет объекты в массив хранилища
        if(!($this instanceof AdsStore)){
            die('Нельзя использовать этот метод в конструкторе классов');
        }
        $this->ads[$add->getid()]=$add;
    }
    
    public function save($post) {                                               // сохраняет/создаёт объявление в бд
        $post['privat'] ? $add = new AdsCompany($post) : $add = new AdsPrivatePerson($post);
        $add->save();                                                            // сохраняем в бд
        self::addAds($add);
        return self::$instance;
    }
    
    public function del($id) {                                                  // удаляет объявление из хранилища и бд
        if($this->ads[$id]->del()){
            unset($this->ads[$id]);
                return true;
            } else {
                return false;
            }
        }

    
    
    public function getAllAdsFromDb() {                                         // помещает все объявления из базы в хранилище
        $db = db::instance();
        $all = $db->select('SELECT * FROM `advertisement`');
        foreach ($all as $value){
            if( $value['privat'] == 1 ){ 
                $ad = new AdsCompany($value);
            } else {
                $ad = new AdsPrivatePerson($value);
            }
            self::addAds($ad); //помещаем объекты в хранилище
        }

    }
    
    
     function getlocationid(){                                                       // возвращает список городов для селектора
        $db = db::instance();
        $city = $db->selectCol('SELECT id AS ARRAY_KEY,city FROM cities');
        return $city;
    } 
    
    
    function getCategories() {                                            // возвращает список категорий для селектора
        $db = db::instance();
        $category_query = $db->select('SELECT id AS ARRAY_KEY,category,parent_id AS PARENT_KEY FROM `category`');   //выбираем из базы данных категории и записываем их в массив
        foreach ($category_query as $key => $value) {                                                          //Приводим к правильному виду
            if (!$key) {
                $category[$key] = $value['category'];
            }
            foreach ($value['childNodes'] as $number => $title) {
                $category[$value['category']][$number] = $title['category'];
            }
        }
        return $category;
    }

    
    
    function clearDB(){                                              // очищает базу данных
        $db = db::instance();
        $db->query("DELETE FROM `advertisement`");
        $this->ads = array();
        return self::$instance;
    }
    
     public function restart() {  
        header("Location: $_SERVER[SCRIPT_NAME]");
        exit;
    }


     public function prepareForOut() {                                           // формирует таблицу с объявлениями для вывода
        global $smarty;
        $row='';
        foreach ($this->ads as $value) {
            $smarty->assign('ad',$value);
            $row.=$smarty->fetch('table_row.tpl');
        }
        $smarty->assign('ads_rows',$row);
        return self::$instance;
    }
    
    
    public function display() {                                              // вывод на экран
        global $smarty;
        $smarty->display('oop.tpl');
    }
}

    
    
    

                                                    //----Создаем   КЛАСС ДЛЯ СВЯЗИ С БД----//
                                                               //----CLOSE----//
