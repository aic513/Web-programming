<tr style="background-color:#d8fffe">
    <td>{$ad->getid()}</td>
    <td>{$ad->getsellername()}</td>
    <td>{$ad->getphone()}</td>
    <td><a href='{$smarty.server.SCRIPT_NAME}?click_id={$ad->getid()}'>{$ad->gettitle()}<a></td>
    <td>{$ad->getdescription()}</td>
    <td>{$ad->getprice()}</td>
    <td><a class="delete btn btn-danger">Удалить</a></td>
</tr>

  <div id="container"></div>
