<?php /* Smarty version 2.6.25-dev, created on 2016-05-11 23:32:04
         compiled from show_all.tpl */ ?>
<ul>
    <?php $_from = $this->_tpl_vars['print_ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Id'] => $this->_tpl_vars['i']):
?>              <li><div align='left'>
            <a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?click_id=<?php echo $this->_tpl_vars['i']->getid(); ?>
'> <?php echo $this->_tpl_vars['i']->gettitle(); ?>

            </a>
            | Цена: <?php echo $this->_tpl_vars['i']->getprice(); ?>
 | Продавец: <?php echo $this->_tpl_vars['i']->getsellername(); ?>
 | 
            <a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?del_ad=<?php echo $this->_tpl_vars['i']->getid(); ?>
'>Удалить</a><br></li>
    <?php endforeach; else: ?> Advertisements doesn't exist
    <?php endif; unset($_from); ?>
</ul>
