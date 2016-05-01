<?php
header ('Content-type: text/html; charset=utf-8');
$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
';
$bd=  parse_ini_string($ini_string, true);
#print_r($bd);
//Сначала прописываем все функции
$diskont = array (); // переменная-скидка
$sum = array(); //переменная-счетчик
$notice = array(); //уведомления
 //условие для велика
//   if ($bd['игрушка детская велосипед']['осталось на складе'] && 
//        $bd['игрушка детская велосипед']['осталось на складе']>=3){
//    $bd['игрушка детская велосипед']['diskont'] = "30%";
//    $notice[] = 'Вы заказали '.$bd['игрушка детская велосипед']['количество заказано'].
//        'шт. "игрушка детская велосипед", автоматически Вы получаете скидку 30%!';
//        }
function ParseCart($product,$param){
    global $sum;
    global $notice;
    global $diskont;
    
    
    
    
    
    if ($param['осталось на складе']>=$param['количество заказано'])
        {
        $PriceInsight = $param['цена'] * $param['количество заказано'];
    }
    else{
        $PriceInsight = $param['цена'] * $param['осталось на складе'];
        $notice[]='Товар '.$product.': нехватка на складе = '.($param['количество заказано']-$param['осталось на складе']).'шт';
    }
    $PriceInsight = $param['цена'] * $param['осталось на складе'];
    
    
    //делаем условие для скидки
    
    if ($param['diskont'] == 'diskont1') {
$param['diskont'] = "10%";
}
elseif ($param['diskont'] == 'diskont2') {
$param['diskont'] = "20%";}
else {
$param['diskont'] = "0%";
}
if($product == 'игрушка детская велосипед' && $param['осталось на складе']>=3 && $param['количество заказано']>=3){
$param['diskont'] = "30%";}
    
    
    
    //считаем скидку
    
     if ($param['diskont'] == "10%") {
                $diskont = $PriceInsight * 0.9;
            } if ($param['diskont'] == "20%") {
                 $diskont = $PriceInsight * 0.8;
            } if ($param['diskont'] == "30%") {
                $diskont = $PriceInsight* 0.7;
            } if ($param['diskont'] == "0%") {
                $diskont = $PriceInsight * 1;
                $notice[]='Товар '.$product.': не имеет скидки ';
            }
        
    
    
    //Выводим все в колонки
    echo '<tr>';
    echo '<td style="background-color:blue;color:white;">'.$product.'</td>';
    echo '<td style="border:1px solid #06266F;">'.$param['цена'].'</td>';
    echo '<td style="border:1px solid #06266F;">'.$param['количество заказано'].'</td>';
    echo '<td style="border:1px solid #06266F;">'.$param['осталось на складе'].'</td>';
    echo '<td style="border:1px solid #06266F;">'.$PriceInsight.'</td>';
    echo '<td style="border:1px solid #06266F;">'.$param['diskont'].'</td>';
    echo '<td style="border:1px solid #06266F;">'.$diskont.'</td>';
    
    echo '</tr>';
    
    $sum['цена'] += $param['цена'];
    $sum['количество заказано'] += $param['количество заказано'];
    $sum['осталось на складе'] += $param['осталось на складе'];
    $sum['цена с наличием на складе'] += $PriceInsight;
    $sum['diskont']+=$diskont;
   
    
}
?>
<table style="border:2px solid black;">
    <tr><td style="border:1px solid #06266F;"><b>Название</b></td>
    <td style="border:1px solid #06266F;"><b>Цена</b></td>
    <td style="border:1px solid #06266F;"><b>Количество заказано</b></td>
    <td style="border:1px solid #06266F;"><b>Осталось на складе</b></td>
     <td style="border:1px solid #06266F;"><b>Цена с наличием на складе</b></td>
     <td style="border:1px solid #06266F;"><b>Дисконт</b></td>
     <td style="border:1px solid #06266F;"><b>Цена со скидкой</b></td>
     
     
    </tr>

<?php
 
    
//Приводим к удобочитаемому виду
echo '<p>';
foreach ($bd as $key => $value) {
    echo $key.'<br>';
    print_r($value);
    echo "\n<p>\n";
    ParseCart($key,$value);
    
    
    
    
}
if ($bd['игрушка детская велосипед']['осталось на складе'] && 
        $bd['игрушка детская велосипед']['количество заказано']>=3){
    $bd['игрушка детская велосипед']['diskont'] = "30%";
    $notice[] = 'Вы заказали '.$bd['игрушка детская велосипед']['количество заказано'].
        'шт. "игрушка детская велосипед", автоматически Вы получаете скидку 30%!';
        }
?>
    

    <tr style="background-color:#1D7373;color:#fff;" colspan="2">
        <td><b>Итого: <?=count($bd)?></b></td>
        <td><b><?=$sum['цена']?></b></td>
        <td><b><?=$sum['количество заказано']?></b></td>
        <td><b><?=$sum['осталось на складе']?></b></td>
        <td><b><?=$sum['цена с наличием на складе']?></b></td>
        <td></td>
        <td><b><?=$sum['diskont']?></b></td>
        
    
    </tr>
   
    
        
        
    
    
</table>

<td colspan="5"><b>Уведомления: <?=  join("<br>",$notice)?></b></td>

<?