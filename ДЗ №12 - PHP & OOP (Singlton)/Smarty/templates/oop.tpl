<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Наше объявление</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body style="margin:0 auto;">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8">
    <form class="form-horizontal" method="POST" >
        <input type="hidden" name="id" value="{$add->getid()}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name="seller_name" class="form-control" id="inputEmail3" placeholder="Введите имя" value="{$add->getsellername()}">
            </div>
            </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Почта</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Введите адрес электронной почты" value="{$add->getemail()}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" name="allow_mails" {if $add->getallowmails() eq 1}checked{/if}> <span>Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Телефон</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Введите номер телефона" value="{$add->getphone()}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Город</label>
            <div class="col-sm-10">
                 {html_options name=location_id options=$city selected=$add->getlocationid()}
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Категория</label>
            <div class="col-sm-10">
                {html_options name=category_id options=$category selected=$add->getcategoryid()}
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Введите название" maxlength="50" value="{$add->gettitle()}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" cols="80" rows="5" maxlength="3000" placeholder="Введите информацию о товаре/услуге">{$add->getdescription()}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Цена</label>
            <div class="col-sm-10">
                <input type="text" name="price" class="form-control" id="inputEmail3" placeholder="Введите цену в рублях" value="{$add->getprice()}">
            </div>
        </div>
       <div class="form-group">
                          
                                <div class="radio-inline">
                                    <label><input type="radio" 
                                        {if $ad.private eq 0} 
                                            checked="" 
                                        {/if}
                                                  value="0" name="private">Частное лицо</label> 
                                </div>            
                                <div class="radio-inline">
                                    <label><input type="radio" 
                                        {if $ad.private eq 1} 
                                            checked="" 
                                        {/if}
                                                  value="1" name="private">Компания</label> 
                                </div>            
                                      
                        </div>            
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-success">{if $add->getid()}Сохранить{else}Добавить{/if} объявление</button>
                <button type="submit" name="clear_form" class="btn btn-primary">Очистить форму</button>
                <button type="submit" name="clear_base" class="btn btn-default">Очистить базу</button>
            </div>
        </div>
    </form>
                {include file = 'table.tpl'}
                </div>
                </div>
    </div>
</body>

</html>
