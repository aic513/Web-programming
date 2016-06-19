<?php /* Smarty version 2.6.25-dev, created on 2016-06-16 22:08:10
         compiled from table_row.tpl */ ?>

<tr id="r<?php echo $this->_tpl_vars['ad']->getid(); ?>
"  style="background-color:#d8fffe">
    <td><?php echo $this->_tpl_vars['ad']->getid(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getsellername(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getphone(); ?>
</td>
    <td><a class="edit_link"><?php echo $this->_tpl_vars['ad']->gettitle(); ?>
</a></td>
    <td><?php echo $this->_tpl_vars['ad']->getdescription(); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getprice(); ?>
</td>
    <td><a class="delete btn btn-danger">Удалить</a></td>
</tr>
