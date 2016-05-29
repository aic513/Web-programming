<?php
class AdChecker { // Сервисный класс - проверяет add на ошибки
    public static function check($add) {
        $CheckResult = false;
        if( ($add instanceof Ads) or ($add instanceof AdsCompany) or ($add instanceof AdsPrivatePerson) ){ // Если в качестве параметра передано объявление 
            if ( !strlen($add->gettitle()) ) { // Если значение не приянто, или принято пустое
                $CheckResult .= 'Не заполнено поле Название объявления<br>';
            }
            if ( !strlen($add->getdescription()) )  {  // Если значение не приянто, или принято пустое
                $CheckResult .= 'Не заполнено поле Описание<br>';
            }
            if ( $add->getprice() == 0 ) {// Если значение не приянто, или принято пустое
                $CheckResult .= 'Не заполнено поле Цена<br>';
            }
        }
        return $CheckResult;
    }
}
?>