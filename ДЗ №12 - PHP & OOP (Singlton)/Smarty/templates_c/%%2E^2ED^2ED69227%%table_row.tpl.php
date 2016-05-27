<?php /* Smarty version 2.6.25-dev, created on 2016-05-27 16:18:58
         compiled from table_row.tpl */ ?>
<tr >
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