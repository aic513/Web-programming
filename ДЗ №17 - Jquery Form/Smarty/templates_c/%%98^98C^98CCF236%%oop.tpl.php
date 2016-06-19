<?php /* Smarty version 2.6.25-dev, created on 2016-06-19 15:31:01
         compiled from oop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'oop.tpl', 53, false),)), $this); ?>
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
</head>
<body style="cursor:pointer;">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10">
                <form class="form-horizontal" id="form" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['add']->getid(); ?>
">
                    <div class="form-group">
                        <label for="seller_name" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="seller_name" class="form-control" id="seller_name" placeholder="Введите имя" value="<?php echo $this->_tpl_vars['add']->getsellername(); ?>
"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Почта</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Введите адрес электронной почты" value="<?php echo $this->_tpl_vars['add']->getemail(); ?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="allow_mails" value="1" name="allow_mails" <?php if ($this->_tpl_vars['add']->getallowmails() == 1): ?>checked<?php endif; ?>> <span>Я не хочу получать вопросы по объявлению по e-mail</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Введите номер телефона" value="<?php echo $this->_tpl_vars['add']->getphone(); ?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-sm-2 control-label">Город</label>
                        <div class="col-sm-10">
                            <select style="cursor:pointer; text-align-last: center;font-style:italic;" name="location_id" class="form-control">
                                <option>Выберите город</option>
                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['city'],'selected' => $this->_tpl_vars['add']->getlocationid()), $this);?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-10">
                            <select style="cursor:pointer;text-align-last: center;font-style:italic;" name="category_id" class="form-control">
                                <option>Выберите катеригорию</option>
                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['add']->getcategoryid()), $this);?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Название</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Введите название" maxlength="50" value="<?php echo $this->_tpl_vars['add']->gettitle(); ?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control" cols="80" rows="3" maxlength="3000" placeholder="Введите информацию о товаре/услуге"><?php echo $this->_tpl_vars['add']->getdescription(); ?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Цена</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price" placeholder="Введите цену в рублях" value="<?php echo $this->_tpl_vars['add']->getprice(); ?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio-inline">
                                <label style="cursor:pointer;">
                                    <input type="radio" <?php if ($this->_tpl_vars['ad']->privat == 0): ?> checked="" <?php endif; ?> value="0" name="privat" id="radio_private">Частное лицо</label>
                            </div>
                            <div class="radio-inline">
                                <label style="cursor:pointer;">
                                    <input type="radio" <?php if ($this->_tpl_vars['ad']->privat == 1): ?> checked="" <?php endif; ?> value="1" name="privat" id="radio_company">Компания</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" id="addEdit" value="add">
                            <button id="submit_add" class="btn btn-success submit">Добавить объявление</button>
                            <a class="btn btn-primary clForm_button">Очистить форму</a>
                            <a class="btn btn-default clBase_button">Очистить базу</a>
                        </div>
                    </div>
                </form>
                <div id="container" class="col-sm-offset-2 alert alert-success alert-dismissible" role="alert" style="display:none;">
                    <a style="vertical-align: top;" class="close" onclick="$('#container').fadeOut('slow');"><span style="vertical-align:middle;" aria-hidden="true">&times;</span></a>
                    <div id="container_info"></div>
                    <div id="notice_info">В базе данных больше нет объявлений</div>    
                </div>
                <div id="container_clearbase" class="col-sm-offset-2 alert alert-info alert-dismissible" role="alert" style="display:none;">
                    <a style="vertical-align: top;" class="close" onclick="$('#container_clearbase').fadeOut('slow');"><span style="vertical-align:middle;" aria-hidden="true">&times;</span></a>
                    <div id="container_clearbase_info"></div>
                </div>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'table.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
     <script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
      <script src="js/index.js?<?php echo time(); ?>"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   </body>
</html>