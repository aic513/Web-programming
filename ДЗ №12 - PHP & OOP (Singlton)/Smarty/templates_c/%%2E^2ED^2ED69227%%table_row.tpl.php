<?php /* Smarty version 2.6.25-dev, created on 2016-05-29 23:56:00
         compiled from table_row.tpl */ ?>
<tr style="background-color:#d8fffe">
    <td><?php echo $this->_tpl_vars['ad']->getid(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getsellername(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getphone(); ?>
</td>
    <td><a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?click_id=<?php echo $this->_tpl_vars['ad']->getid(); ?>
'><?php echo $this->_tpl_vars['ad']->gettitle(); ?>
<a></td>
    <td><?php echo $this->_tpl_vars['ad']->getdescription(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getprice(); ?>
</td>
    <td><a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>
?del_ad=<?php echo $this->_tpl_vars['ad']->getid(); ?>
'>Удалить</a></td>
</tr>