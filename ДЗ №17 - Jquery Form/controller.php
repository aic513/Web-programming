<?php
require_once ("definition.php");

$add = new Ads(0);                     //создаем новый объект
$smarty->assign('add', $add);          //и передаем в смарти
$adsStore->prepareForOut()->display();

