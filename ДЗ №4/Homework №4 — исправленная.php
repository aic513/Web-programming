<?php
header('Content-type: text/html; charset=utf-8');
$ini_string = '
[игрушка мягкая мишка белый]
цена = ' . mt_rand(1, 10) . ';
количество заказано = ' . mt_rand(1, 10) . ';
осталось на складе = ' . mt_rand(0, 10) . ';
diskont = diskont' . mt_rand(0, 2) . ';
    
[одежда детская куртка синяя синтепон]
цена = ' . mt_rand(1, 10) . ';
количество заказано = ' . mt_rand(1, 10) . ';
осталось на складе = ' . mt_rand(0, 10) . ';
diskont = diskont' . mt_rand(0, 2) . ';
    
[игрушка детская велосипед]
цена = ' . mt_rand(1, 10) . ';
количество заказано = ' . mt_rand(1, 10) . ';
осталось на складе = ' . mt_rand(0, 10) . ';
diskont = diskont' . mt_rand(0, 2) . ';
';
$bd = parse_ini_string($ini_string, true);
#print_r($bd);
//Сначала прописываем все функции
$diskont = array(); // переменная-скидка
$sum = array(); //переменная-счетчик
$notice = array(); //уведомления

function ParseCart($product, $param) {
    global $sum;
    global $notice;
    static $diskont;

    //                                               --ЛОГИКА OPEN--

    if ($param['осталось на складе'] >= $param['количество заказано']) {
        $PriceInsight = $param['цена'] * $param['количество заказано'];
    } else {
        $PriceInsight = $param['цена'] * $param['осталось на складе'];
        $notice[] = 'Товар ' . $product . ': нехватка на складе = ' . ($param['количество заказано'] - $param['осталось на складе']) . 'шт';
    }
    $PriceInsight = $param['цена'] * $param['осталось на складе'];


    if ($product == 'игрушка детская велосипед' && $param['осталось на складе'] >= 3 && $param['количество заказано'] >= 3) {
        $param['diskont'] = "30%";
        $diskont = $PriceInsight * 0.7;
        $notice[] = 'Вы заказали ' . $param['игрушка детская велосипед']['количество заказано'] .
                'шт. "игрушка детская велосипед", автоматически Вы получаете скидку 30%!';
    }

    switch ($param['diskont']) {
        case 'diskont1':
            $param['diskont'] = "10%";
            $diskont = $PriceInsight * 0.9;
            break;
        case 'diskont2':
            $param['diskont'] = "20%";
            $diskont = $PriceInsight * 0.8;
            break;
        case 'diskont0':
            $param['diskont'] = "0%";
            $diskont = $PriceInsight * 1;
            $notice[] = 'Товар ' . $product . ': не имеет скидки ';
            break;
    }
    
    
    //--РАСЧЕТ ЗНАЧЕНИЙ ДЛЯ ГРАФЫ ИТОГО OPEN--    
    $sum['цена'] += $param['цена'];
    $sum['количество заказано'] += $param['количество заказано'];
    $sum['осталось на складе'] += $param['осталось на складе'];
    $sum['цена с наличием на складе'] += $PriceInsight;
    $sum['diskont']+=$diskont;
    //--РАСЧЕТ ЗНАЧЕНИЙ ДЛЯ ГРАФЫ ИТОГО CLOSE-- 
       
                                                                // --ЛОГИКА CLOSE--
                                                                
                                  //--ВЫВОД OPEN--
    function_Show($param, $product, $PriceInsight, $diskont);
                                  //--ВЫВОД CLOSE--
}

//СДЕЛАЛИ ФУНКЦИЮ ДЛЯ ВЫВОДА ЗНАЧЕНИЙ В ЯЧЕЙКИ OPEN--
function function_Show($param, $product, $PriceInsight, $diskont) {
    echo '<tr>';
    echo '<td style="background-color:blue;color:white;">' . $product . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $param['цена'] . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $param['количество заказано'] . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $param['осталось на складе'] . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $PriceInsight . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $param['diskont'] . '</td>';
    echo '<td style="border:1px solid #06266F;">' . $diskont . '</td>';
    echo '</tr>';
}

//СДЕЛАЛИ ФУНКЦИЮ ДЛЯ ВЫВОДА ЗНАЧЕНИЙ В ЯЧЕЙКИ CLOSE--
?>


<table style="border:2px solid black;border-collapse:collapse;">
    <tr><td style="border:1px solid #06266F;"><b>Название</b></td>
        <td style="border:1px solid #06266F;"><b>Цена</b></td>
        <td style="border:1px solid #06266F;"><b>Количество заказано</b></td>
        <td style="border:1px solid #06266F;"><b>Осталось на складе</b></td>
        <td style="border:1px solid #06266F;"><b>Цена с наличием на складе</b></td>
        <td style="border:1px solid #06266F;"><b>Дисконт</b></td>
        <td style="border:1px solid #06266F;"><b>Цена со скидкой</b></td>


    </tr>


<?php
//Приводим к удобочитаемому виду,перебирая массив по порядку
echo '<p>';
foreach ($bd as $key => $value) {
    ParseCart($key, $value);
}
?>

    <tr style="background-color:#1D7373;color:#fff;" colspan="2">
        <td><b>Итого: <?= count($bd) ?></b></td>
        <td><b><?= $sum['цена'] ?></b></td>
        <td><b><?= $sum['количество заказано'] ?></b></td>
        <td><b><?= $sum['осталось на складе'] ?></b></td>
        <td><b><?= $sum['цена с наличием на складе'] ?></b></td>
        <td></td>
        <td><b><?= $sum['diskont'] ?></b></td>
    </tr>
</table>

<td colspan="5"><b>Уведомления: <?= join("<br>", $notice) ?></b></td>

<?