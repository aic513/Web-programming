<?php
class AdsPrivatePerson extends Ads{
    function __construct($ad) {
        parent::__construct($ad);
        $this->privat = 0;
    }
}
?>