{include file="header.tpl"}

<h1 align="center"><strong>Доска объявлений</strong></h1>
<form style="margin-left: 30%;" method="post"> <font size="4">
    <div> 
        <label class="form-label-radio">
            <input type="radio" value="1" checked="" {if $print_ad.privat eq 1}checked{/if} name="privat">Частное лицо
            <input type="radio" value="2" {if $print_ad.privat eq 2}checked{/if} name="privat">Компания
        </label>
    </div>
    
    <div> 
        <label for="fld_seller_name">
            <b id="your-name">Ваше имя </b>
        </label>
        <input type="text" maxlength="40" value="{$print_ad.seller_name}" name="seller_name" id="fld_seller_name">
    </div>
    <div>
        <label for="fld_email">Электронная почта</label>
        <input type="text" value="{$print_ad.email}" name="email" id="fld_email">
    </div>
    <div>
        <label for="allow_mails"> <input type="checkbox" value="checked" {if isset($print_ad.allow_mails)}checked{/if} name="allow_mails" id="allow_mails">
            <span>Я не хочу получать вопросы по объявлению по e-mail</span>
        </label>
    </div>
    <div>
        <label id="fld_phone_label" for="fld_phone">Номер телефона</label>
        <input type="text" value="{$print_ad.phone}" name="phone" id="fld_phone">
    </div>
    <div class="form-group">
        <label for="region" class="col-sm-2 control-label">Город</label>
        {html_options name=location_id options=$city selected=$print_ad.location_id}
    </div>
    <div class="form-group">
        <label for="fld_category_id" class="form-label">Категория</label> 
        {html_options name=category_id options=$category selected=$print_ad.category_id}
    </div> 
    <div id="f_title">
        <label for="fld_title">Название объявления</label>
        <input type="text" maxlength="50" value="{$print_ad.title}" name="title" id="fld_title">
    </div>
    <div>
        <label for="fld_description" id="js-description-label">Описание объявления</label>
        <br>
        <textarea name="description" cols="80" rows="5" maxlength="3000" id="fld_description">{$print_ad.description}</textarea>
    </div>
    <div id="price_rw"> 
        <label id="price_lbl" for="fld_price">Цена</label> 
        <input type="text" maxlength="9" value="{$print_ad.price}" name="price" id="fld_price">&nbsp;
        <span id="fld_price_title">руб.</span> 
    </div>
    
    <input type="submit" value="{if isset($smarty.get.click_id)}Сохранить{else}Добавить{/if}объявление" id="form_submit" name="confirm_add">
    <input type="submit" value="Очистить форму" id="form_submit" name="clear_form">
    <div>
        <input {if !isset($smarty.get.click_id)}hidden=""{/if} type="submit" value="Назад" id="enter_id" name="back">
        <input type="submit" value="Очистить базу объявлений" id="clear_base" name="clear_base">
    </div>
    <input type=hidden name=id_r value={if isset($smarty.get.click_id)}{$smarty.get.click_id}{/if}>
</form>
<hr>
 {if !isset($smarty.get.click_id)}                   {*если кликнули по объявлению- прячем список объявлений*}
        {include file='show_all.tpl'}
    {/if}
{include file='footer.tpl'}