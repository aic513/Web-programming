{*вывод объявлений вместо функции show_all из 7-го ДЗ*}
<ul>
    {foreach from=$print_ad key=Id item=i}      {* foreach($items as $Id => $i)*}
        <li><div align='left'>
            <a href='{$smarty.server.SCRIPT_NAME}?click_id={$i->getid()}'> {$i->gettitle()}
            </a>
            | Цена: {$i->getprice()} | Продавец: {$i->getsellername()} | 
            <a href='{$smarty.server.SCRIPT_NAME}?del_ad={$i->getid()}'>Удалить</a><br></li>
    {foreachelse} Advertisements doesn't exist
    {/foreach}
</ul>
