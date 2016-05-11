<?php /* Smarty version 2.6.25-dev, created on 2016-05-11 13:37:47
         compiled from form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'form.tpl', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1 align="center"><strong>Доска объявлений</strong></h1>
<form style="margin-left: 30%;" method="post"> <font size="4">
    <div> 
        <label class="form-label-radio">
                              </label>
    </div>
    
    <div> 
        <label for="fld_seller_name">
            <b id="your-name">Ваше имя </b>
        </label>
        <input type="text" maxlength="40" value="<?php echo $this->_tpl_vars['show']->getsellername(); ?>
" name="seller_name" id="fld_seller_name">
    </div>
    <div>
        <label for="fld_email">Электронная почта</label>
        <input type="text" value="<?php echo $this->_tpl_vars['show']->getemail(); ?>
" name="email" id="fld_email">
    </div>
    <div>
          </div>
    <div>
        <label id="fld_phone_label" for="fld_phone">Номер телефона</label>
        <input type="text" value="<?php echo $this->_tpl_vars['show']->getphone(); ?>
" name="phone" id="fld_phone">
    </div>
    <div class="form-group">
        <label for="region" class="col-sm-2 control-label">Город</label>
        <?php echo smarty_function_html_options(array('name' => 'location_id','options' => $this->_tpl_vars['city'],'selected' => $this->_tpl_vars['show']->getlocationid()), $this);?>

    </div>
    <div class="form-group">
        <label for="fld_category_id" class="form-label">Категория</label> 
        <?php echo smarty_function_html_options(array('name' => 'category_id','options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['show']->getcategoryid()), $this);?>

    </div> 
    <div id="f_title">
        <label for="fld_title">Название объявления</label>
        <input type="text" maxlength="50" value="<?php echo $this->_tpl_vars['show']->gettitle(); ?>
" name="title" id="fld_title">
    </div>
    <div>
        <label for="fld_description" id="js-description-label">Описание объявления</label>
        <br>
        <textarea name="description" cols="80" rows="5" maxlength="3000" id="fld_description"><?php echo $this->_tpl_vars['show']->getdescription(); ?>
</textarea>
    </div>
    <div id="price_rw"> 
        <label id="price_lbl" for="fld_price">Цена</label> 
        <input type="text" maxlength="9" value="<?php echo $this->_tpl_vars['show']->getprice(); ?>
" name="price" id="fld_price">&nbsp;
        <span id="fld_price_title">руб.</span> 
    </div>
    
    <input type="submit" value="<?php if (isset ( $_GET['click_id'] )): ?>Сохранить<?php else: ?>Добавить<?php endif; ?>объявление" id="form_submit" name="confirm_add">
    <input type="submit" value="Очистить форму" id="form_submit" name="clear_form">
    <div>
        <input <?php if (! isset ( $_GET['click_id'] )): ?>hidden=""<?php endif; ?> type="submit" value="Назад" id="enter_id" name="back">
        <input type="submit" value="Очистить базу объявлений" id="clear_base" name="clear_base">
    </div>
    <input type=hidden name=id_r value=<?php if (isset ( $_GET['click_id'] )): ?><?php echo $_GET['click_id']; ?>
<?php endif; ?>>
</form>
<hr>
 <?php if (! isset ( $_GET['click_id'] )): ?>                           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'show_all.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>