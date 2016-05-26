<?php /* Smarty version 2.6.25-dev, created on 2016-05-24 21:38:20
         compiled from oop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'oop.tpl', 52, false),)), $this); ?>
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

<body style="width:400px;margin:0 auto;">
    <br>
    <form class="form-horizontal" method="POST">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['add']->getid(); ?>
">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name="seller_name" class="form-control" id="inputEmail3" placeholder="Введите имя" value="<?php echo $this->_tpl_vars['add']->getsellername(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Почта</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Введите адрес электронной почты" value="<?php echo $this->_tpl_vars['add']->getemail(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" name="allow_mails" <?php if ($this->_tpl_vars['add']->getallowmails() == 1): ?>checked<?php endif; ?>> <span>Я не хочу получать вопросы по объявлению по e-mail</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Телефон</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Введите номер телефона" value="<?php echo $this->_tpl_vars['add']->getphone(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Город</label>
            <div class="col-sm-10">
                 <?php echo smarty_function_html_options(array('name' => 'location_id','options' => $this->_tpl_vars['city'],'selected' => $this->_tpl_vars['add']->getlocationid()), $this);?>

            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Категория</label>
            <div class="col-sm-10">
                <?php echo smarty_function_html_options(array('name' => 'category_id','options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['add']->getcategoryid()), $this);?>

            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Введите название" maxlength="50" value="<?php echo $this->_tpl_vars['add']->gettitle(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" cols="80" rows="5" maxlength="3000" placeholder="Введите информацию о товаре/услуге"><?php echo $this->_tpl_vars['add']->getdescription(); ?>
</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Цена</label>
            <div class="col-sm-10">
                <input type="text" name="price" class="form-control" id="inputEmail3" placeholder="Введите цену в рублях" value="<?php echo $this->_tpl_vars['add']->getprice(); ?>
">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="optionsRadios1" value="0" checked> Частное лицо
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="optionsRadios2" value="1" <?php if ($this->_tpl_vars['add']->gettype() == 1): ?>checked<?php endif; ?>>Компания
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" name="color" <?php if (( $this->_tpl_vars['add']->gettype() == 1 )): ?> <?php if (( $this->_tpl_vars['add']->getcolor() == 1 )): ?>checked<?php endif; ?><?php endif; ?>>Выделить объявление цветом (только для компании)
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-default"><?php if ($this->_tpl_vars['add']->getid()): ?>Сохранить<?php else: ?>Добавить<?php endif; ?> объявление</button>
                <button type="submit" name="clear_form" class="btn btn-default">Очистить форму</button>
                <button type="submit" name="clear_base" class="btn btn-default">Очистить базу</button>
            </div>
        </div>
    </form>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'table.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>

</html>