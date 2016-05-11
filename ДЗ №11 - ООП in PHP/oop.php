<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

                                   //------Создаем КЛАСС ДЛЯ СОХРАНЕНИЯ ДАННЫХ В ОБЪЯВЛЕНИИ----//
                                                        //----OPEN----//

class promo {
                                  //-----Определяем свойства класса promo----//
                                                    //----OPEN----//
                                                    
                                  //-----Тип свойств - "public (открытый)"----//
    public $id;
    public $privat;
    public $seller_name;
    public $email;
    public $allow_mails;
    public $phone;
    public $location_id;
    public $category_id;
    public $title;
    public $description;
    public $price;
    public $id_r;
    
                                           //----Определяем свойства класса adverisement----//
                                                            //----CLOSE----//
                                   
                                //-----Определяем метод конструктора класса promo----//
                                                //----OPEN----//
                                                
                  //--метод конструктора класса promo будет вызываться при каждом создании нового объекта
    
    function __construct($add) {
       
       if (isset($add['id'])){
           $this->id=$add['id'];
       }
       
       $this->privat=$add['privat'];
       $this->seller_name=$add['seller_name'];
       $this->email=$add['email'];
       
       if (isset($add['allow_mails'])){
           $this->allow_mails=$add['allow_mails'];
       }
       
       $this->phone=$add['phone'];
       $this->location_id=$add['location_id'];
       $this->category_id=$add['category_id'];
       $this->title=$add['title'];
       $this->description=$add['description'];
       $this->price=$add['price'];
       
       if(isset($add['id_r'])){
        $this->id_r=$add['id_r'];
    }

}
                                //----Определяем метод конструктора класса adverisement----//
                                                    //----CLOSE----//

                                     //----Определяем методы класса promo----//
                                                 //----OPEN----//

       public function getallowpost() {
            if (!isset($this->allow_mails)) {
            $this->allow_mails=0;      // Если чекбокс не нажат,то в $_POST не отправляется никакого значения. 
        }                              //В этом случае установка значения в 0
        return array
        (
            'privat'=>$this->privat,
            'seller_name'=>$this->seller_name,
            'email'=>$this->email,
            'allow_mails'=>$this->allow_mails,
            'phone'=>$this->phone,
            'location_id'=>$this->location_id, 
            'category_id'=>$this->category_id,
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price
        );
        }
       
       public function getid() {
           return $this->id;                      
        }
       
       public function getprivat() {
           return $this->privat;           
        }
                    
       public function getsellername() {
           return $this->seller_name;
        }
        
        public function getemail() {
            return $this->email;            
        }
        
        public function getallowmails() {
            return $this->allow_mails;
        }
        
        public function getphone() {
            return $this->phone;
        }
        
        public function getlocationid() {
            return $this->location_id;
        }
        
        public function getcategoryid() {
            return $this->category_id;
        }
        
        public function gettitle() {
            return $this->title;
        }
        
        public function getdescription() {
            return $this->description;
        }
        
        public function getprice() {
            return $this->price;
        }
        
        public function getidr() {
            return $this->id_r;
        }
                                               //----Определяем методы класса promo----//
                                                                //----CLOSE----//
}
                                                    //----Создаем КЛАСС ДЛЯ СОХРАНЕНИЯ ДАННЫХ В ОБЪЯВЛЕНИИ----//
                                                                    //----CLOSE----//



                                                //------Создаем КЛАСС ДЛЯ ВЫВОДА ДАННЫХ НА ЭКРАН----//
                                                                      //----OPEN----//
class show_ads{
    
                                                //-------------- функция вывода формы OPEN---------------------------//
    public function print_form($db,$smarty,$base,$print_ad = 0) {                           
    if ($print_ad) {
        $print_ad =$base->get_ad($db, $print_ad);
    }
    $add = $base->get_all($db);
    $smarty->assign('add', $add);
    $smarty->assign('print_ad', $print_ad);
    $smarty->display('form.tpl');
}
                                             //-------------- функция вывода формы CLOSE---------------------------//



                                        //------------------------ функция перезапуска скрипта OPEN----------------------------//
    public function restart() {                                         
    header("Location: $_SERVER[SCRIPT_NAME]");
    exit;
}
                                     //------------------------ функция перезапуска скрипта CLOSE----------------------------//
    
    
    
}
                                                //------Создаем КЛАСС ДЛЯ ВЫВОДА ДАННЫХ НА ЭКРАН----//
                                                                      //----CLOSE----//






                                                //----Создаем   КЛАСС ДЛЯ СВЯЗИ С БД----//
                                                               //----OPEN----//

class telesql{
    
                       //-------------------функция добавления объявлений в Базу Данных OPEN--------------------------------------//
    public function ads_ad($db, $add) {                                    
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    } // Если чекбокс не нажат то в POST не отправляется никакого значения. В этом случае установка значения в 0
    $db->query("INSERT INTO `advertisement` (`privat`, `seller_name`, `email`, `allow_mails`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`)
    VALUES ( '{$add['privat']}','{$add['seller_name']}', '{$add['email']}', '{$add['allow_mails']}', '{$add['phone']}', '{$add['location_id']}', '{$add['category_id']}', '{$add['title']}', '{$add['description']}', '{$add['price']}')");
}
                     //-------------------функция добавления объявлений в Базу Данных CLOSE--------------------------------------//



                          //----------------------функция редактирования объявлений OPEN----------------------------//
    public function edit_ads($db, $add) {                                    
    if (!isset($add['allow_mails'])) {
        $add['allow_mails'] = 0;
    }
     $db->query("UPDATE `advertisement` SET `privat`='{$add['privat']}', `seller_name`='{$add['seller_name']}', `email`='{$add['email']}', "
            . "`allow_mails`='{$add['allow_mails']}', `phone`='{$add['phone']}', `location_id`='{$add['location_id']}', `category_id`='{$add['category_id']}', "
            . "`title`='{$add['title']}', `description`='{$add['description']}', `price`='{$add['price']}' where id='{$add['id_r']}'");
}
                          //----------------------функция редактирования объявлений CLOSE----------------------------//



                                    //---------------------функция возврата объявлений из БД по id OPEN----------------------//
    public function get_ad($db,$print_ad){                                                        
         return $db->selectRow("SELECT * FROM `advertisement` WHERE id =?d", $print_ad);   
    }
                                    //---------------------функция возврата объявлений из БД по id CLOSE----------------------//


    
                                       //-----------функция возврата всех объявлений из БД OPEN---------------------//
    public function get_all($db){
         return $db->select("SELECT * FROM `advertisement`");
         $ads_array = array();
        foreach ($ads as $value){
            $ads_array[] = new ad($value);
        }
        return $ads_array;
    }
                                       //-----------функция возврата всех объявлений из БД CLOSE---------------------//
    
    
    
                                       //------------функция удаления объявлений из БД по id OPEN-----------------//
    public function delete_ad($db, $id){                                              
         $db->query("DELETE FROM `advertisement` WHERE id=?d", $id);
    }
                                           //------------функция удаления объявлений из БД по id CLOSE-----------------//
    
    
    
                                                                //--------функция очистки БД OPEN--------//
    public function clear_ad($db) {
        $db->query("DELETE FROM `advertisement` WHERE id>0");
    }
                                                                //--------функция очистки БД CLOSE--------//
    
    
    
    
                          //----------------функция добавления городов из БД в селекторы OPEN----------------------------------------------//
    public function get_city($db) {
    $city_query = $db->select('SELECT id AS ARRAY_KEY,city FROM `cities`');              //выбираем из базы данных города и записываем их в массив
        foreach ($city_query as $key => $value) {                                       //Приводим к правильному виду
            $city[$key] = $value['city'];                                               
        }   
    return $city;
}
                                //----------------функция добавления городов из БД в селекторы CLOSE----------------------------------------------//



                                  //----------------функция добавления категорий из БД в селекторы OPEN----------------------------------------------//
    public function get_category($db) {
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
                                           //----------------функция добавления категорий из БД в селекторы ClOSE----------------------------------------------//
    
    
    
    
}
                                                    //----Создаем   КЛАСС ДЛЯ СВЯЗИ С БД----//
                                                               //----CLOSE----//


$show = new show_ads();                                //создаем новый объект класса show_ads
$base = new telesql();                                  //создаем новый объект класса telesql