<tr {if $ad->gettype() eq 1}{if $ad->getcolor() eq 1}class="success"{/if}{/if} >
    <td>{$ad->getid()}</td>
    <td><a href='{$smarty.server.SCRIPT_NAME}?click_id={$ad->getid()}'>{$ad->gettitle()}<a></td>
                <td>{$ad->getdescription()}</td>
                <td><a href='{$smarty.server.SCRIPT_NAME}?del_ad={$ad->getid()}'>Удалить</a></td>
                </tr>
