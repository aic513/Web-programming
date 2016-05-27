<?php /* Smarty version 2.6.25-dev, created on 2016-05-27 13:02:41
         compiled from install.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>INSTALL</title>
        </head>
    <body style="position:relative;">
        <fieldset style="border-radius:5px;border-color:grey;width:20%;margin:0 auto;margin-top: 10%">
            <legend style="text-align:center;">Please, enter information</legend>
            <form  method="post" action="install.php" style="margin-left:17%">
                        <div class="input">
                            <label for="ServerName">Server Name</label><br>
                            <input type="text" class="form-control" id="ServerName" name="ServerName" placeholder="Server Name" value="localhost">
                        </div>
                        <div class="input">
                            <label for="UserName">User name:</label><br>
                            <input type="text" class="form-control" id="UserName" name="UserName" placeholder="User Name" value="root">
                        </div>
                        <div class="input">
                            <label for="Password">Password</label><br>
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Input Password" value="">
                        </div>
                        <div class="input">
                            <label for="Database">Database:</label><br>
                            <input type="text" class="form-control" id="Database" name="Database" placeholder="Database" value="main_bd">
                        </div>
                        <input type="submit" id="form_submit" value="INSTALL" name="INSTALL" style="background: linear-gradient(to bottom, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 50%,rgba(32,124,202,1) 51%,rgba(125,185,232,1) 100%); color: #fff; font-size: 16px; width: 150px; border-radius: 5px; border-color:blue;padding:10px 0; margin-top:10px; margin-left:5%;cursor:pointer;" >
                </form>      
            </fieldset>
    </body>
</html>