<?php /* Smarty version 2.6.25-dev, created on 2016-05-24 21:26:13
         compiled from table_row.tpl */ ?>
<tr <?php if ($this->_tpl_vars['ad']->gettype() == 1): ?><?php if ($this->_tpl_vars['ad']->getcolor() == 1): ?>class="success"<?php endif; ?><?php endif; ?> >
    <td><?php echo $this->_tpl_vars['ad']->getid(); ?>
</td>
    <td><a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?click_id=<?php echo $this->_tpl_vars['ad']->getid(); ?>
'><?php echo $this->_tpl_vars['ad']->gettitle(); ?>
<a></td>
                <td><?php echo $this->_tpl_vars['ad']->getdescription(); ?>
</td>
                <td><a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?del_ad=<?php echo $this->_tpl_vars['ad']->getid(); ?>
'>Удалить</a></td>
                </tr>