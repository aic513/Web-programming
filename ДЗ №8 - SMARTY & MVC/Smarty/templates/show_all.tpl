{*вывод объявлений вместо функции show_all*}
<ul>
    {foreach from=$add key=Id item=i name='add'}      {* foreach($items as $Id => $i)*}
        <li><div align='left'>
            <a href='{$smarty.server.SCRIPT_NAME}?click_id={$Id}'> {$i.title}  
            </a>
            | Цена: {$i.price} | Продавец: {$i.seller_name} | 
            <a href='{$smarty.server.SCRIPT_NAME}?del_ad={$myId}'>Удалить</a><br></li>
    {foreachelse} объявления отсутствуют
    {/foreach}
</ul>
