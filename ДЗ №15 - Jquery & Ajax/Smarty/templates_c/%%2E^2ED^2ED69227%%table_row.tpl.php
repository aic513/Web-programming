<?php /* Smarty version 2.6.25-dev, created on 2016-06-05 19:11:49
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
    <td><a class="delete btn btn-danger">Удалить</a></td>
</tr>

  <div id="container"></div>