<?php /* Smarty version 2.6.25-dev, created on 2016-06-06 00:14:24
         compiled from table.tpl */ ?>
<br>
<div class="table-responsive">
<table style="font-style:italic; font-family:Consolas;" class="table table-condensed table-hover table-bordered">
   <thead>
                <tr>
                  <th>#id</th>
                  <th style="background-color:#bbeeff;">Имя</th>
                   <th style="background-color:#EACEAA;">Телефон</th>
                  <th class="success">Название</th>
                  <th class="warning">Описание</th>
                  <th class="danger">Цена</th>
                  <th class="active">Действия</th>
                </tr>
              </thead>
              <tbody>
                 <?php echo $this->_tpl_vars['ads_rows']; ?>

              
              </tbody>
</table>
</div>