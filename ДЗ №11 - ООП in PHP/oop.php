<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);    
ini_set('display_errors', 1);
header("Content-Type: text/html; charset=utf-8");

                                   //------Создаем КЛАСС ДЛЯ СОХРАНЕНИЯ ДАННЫХ В ОБЪЯВЛЕНИИ---    ----OPEN---------//
class advertisement {
                                  //-----Определяем свойства класса adverisement OPEN----//
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
    
                                //-----Определяем свойства класса adverisement CLOSE----//
                                
    
    
                                
                                //-----Определяем метод конструктора класса adverisement OPEN----//
           //--конструктор класса advertisement будет вызываться при каждом создании нового объекта
    
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
                                //-----Определяем метод конструктора класса adverisement CLOSE----//

                            //----Определяем методы класса advertisement OPEN----//

       public function getallowpost() {
            if (!isset($this->allow_mails)) {
            $this->allow_mails;
        } // Если чекбокс не нажат то в POST не отправляется никакого значения. В этом случае установка значения в 0
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
                                               //----Определяем методы класса advertisement CLOSE----//
}
                            //------Создаем КЛАСС ДЛЯ СОХРАНЕНИЯ ДАННЫХ В ОБЪЯВЛЕНИИ---    ----CLOSE    ---------//