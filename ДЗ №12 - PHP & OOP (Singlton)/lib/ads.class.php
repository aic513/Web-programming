<?php

class Ads {
                                  //-----Определяем свойства класса Ads----//
                                                    //----OPEN----//
                                                    
                                  //-----Тип свойств - "public (защищенный)"----//
    public $id;
//    public $privat;
    public $seller_name;
    public $email;
    public $allow_mails;
    public $phone;
    public $location_id;
    public $category_id;
    public $title;
    public $description;
    public $price;
    
    
                                           //----Определяем свойства класса Ads----//
                                                            //----CLOSE----//
                                   
                                         //-----Определяем метод конструктора класса Ads----//
                                                             //----OPEN----//
                                                
                 

    
    function __construct($add){                                     
        if (isset($add['id'])){
           $this->id=$add['id'];
       }
       
//       $this->privat=$add['privat'];
       $this->seller_name=$add['seller_name'];
       $this->email=$add['email'];
       
       if (isset($add['allow_mails'])){
           $this->allow_mails=$add['allow_mails'];
       }
       else{
           $this->allow_mails=0;
       }
       
       $this->phone=$add['phone'];
       $this->location_id=$add['location_id'];
       $this->category_id=$add['category_id'];
       $this->title=$add['title'];
       $this->description=$add['description'];
       $this->price=$add['price'];
       



}
                                //----Определяем метод конструктора класса Ads----//
                                                    //----CLOSE----//

                                     //----Определяем методы класса Ads----//
                                                 //----OPEN----//

       public function getallowpost() {
                            
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
       
       public function getid() {return $this->id;}
       
       public function getprivat() {return $this->privat;}
                    
       public function getsellername() {return $this->seller_name;}
        
        public function getemail() {return $this->email;}
        
        public function getallowmails() {return $this->allow_mails;}
        
        public function getphone() {return $this->phone;}
        
        public function getlocationid() {return $this->location_id;}
        
        public function getcategoryid() {return $this->category_id;}
        
        public function gettitle() {return $this->title;}
        
        public function getdescription() {return $this->description;}
        
        public function getprice() {return $this->price;}
        
        
        
        public function save() {                                     // создаёт/изменяет объявление в БД
        $db = db::instance();
        $vars = get_object_vars($this);
        $a=array_values($vars);
        if ($this->getID()){
            $db->query('UPDATE advertisement SET ?a where id='.$this->getid(), $vars);
        }
        else{
            $this->id = $db->query('INSERT INTO advertisement(?#) VALUES(?a)',  array_keys($vars),  array_values($vars));
        }
    }
    
        public function del() {                                                      // удаляет объявление из БД
        $db = db::instance();
        $db->query('delete from `advertisement` where id=?d', $this->getId());
    }
    
    
       
    
                                               //----Определяем методы класса Ads----//
                                                                //----CLOSE----//
}
                                                    