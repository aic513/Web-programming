//--------------------------------Очистка полей формы OPEN--------------------------------------//    
var clear_form = function () {
    $(
            
            ':input', '#form')
            .removeAttr('checked')
            .removeAttr('selected')
            .not(':button, :submit, :reset, #addEdit, :checkbox, :radio')
            .val('');
            error_message();
            
           
};        //------------------------------Очистка полей формы CLOSE----------------------------------//



//------------------------------------Уведомления,что БД пуста OPEN------------------------//
 var notice_empty = function() {
    if ($('#ads_list').html() == 0) {
        $('#notice_info').fadeIn();
    }
    else if ($('#ads_list').html() != 0) {
        $('#notice_info').fadeOut('fast');
    }
};//------------------------------------Уведомления,что БД пуста CLOSE------------------------//



//------------------------------------Очистка сообщений об ошибке OPEN------------------------------//
var error_message = function () {
    if ($('.err_msg').html() == 0) {
        $.noop();
    }
    else if ($('.err_msg').html() != 0) {
        $('.err_msg').remove();
    }
}; //------------------------------------Очистка сообщений об ошибке CLOSE------------------------------//
 
 

 
$('document').ready(function () {                  // устанавливаем обработчик готовности дерева DOM (.ready)
    
    
             //--------------------------------------Удаление объявления OPEN--------------------------------------------------//


    var delete_function = function() { //определяем функцию удаления
    var tr = $(this).closest('tr'); //находим ближайший родительский tr
    var id = tr.children('td:first').html(); //находим первый td в этом tr
    var number = { "del_ad": id }; //определяем параметр для ф-ии getJSON
    $.getJSON('ajax_controller.php?action=delete',
         number,
         function(response) {
             tr.fadeOut('slow', function() { //медленно скрываем строку
                 if (response.status == 'success') {
                     $('#container').removeClass('alert-info').addClass('alert-success');
                     $('#container_info').html(response.message);
                     $('#container').fadeIn('slow');
                 } else if (response.status == 'error') {
                     $('#container').removeClass('alert-success').addClass('alert-danger');
                     $('#container_info').html(response.message);
                     $('#container').fadeIn('slow');
                 }
                 setTimeout(function() { //самоисчезание через 3 секунды
                     $('#container').fadeOut('slow');
                 }, 3000);
                 $(this).remove(); //удаляем строку из DOM
                 notice_empty();
                 if ($('#form [name = id]').val() == id) {
                    error_message();
                    clear_form();}
                $('a.submit').html('Добавить объявление');      // меням название кнопки submit
                $('#addEdit').val('add');                       // сбрасываем addEdit - переключатель 
             });
         }); // Close getJSON()
 }; //--------------------------------------Удаление объявления CLOSE--------------------------------------------------//

   
   
                                //-----------------------Очистка базы OPEN--------------------------//
    var clBase_function = function() {
        var info = { 'base': 'is_removed' };
        $.getJSON('ajax_controller.php?action=clear_base',
            info,
            function(response) {
                $('#ads_list').fadeOut('slow', function() {
                    if (response.status == 'success') {
                        $('#container_clearbase').removeClass('alert-danger').addClass('alert-info');
                        $('#container_clearbase_info').html(response.message);
                        $('#container_clearbase').fadeIn('slow');
                        setTimeout(function() {
                            $('#container_clearbase').fadeOut('slow');
                        }, 3000);
                        $('tbody tr').remove();
                    } else if (response.status == 'error') {
                        $('#container_clearbase').removeClass('alert-info').addClass('alert-danger');
                        $('#container_clearbase_info').html(response.message);
                        $('#container_clearbase').fadeIn('slow');
                        setTimeout(function() {
                            $('#container_clearbase').fadeOut('slow');
                        }, 3000);
                    }
                    clear_form();
                    error_message();
                    $('a.submit').html('Добавить объявление');      // меням название кнопки submit
                    $('#addEdit').val('add');                       // сбрасываем addEdit - переключатель 
                    
                });
            });
    };                         //-----------------------Очистка базы CLOSE--------------------------//
    
    
    
    
                    //--------------------------------Добавление объявления OPEN-------------------------------------//
    
    var submit_function = function () { // сохранить/добавить объявление
        var info_form = $('#form').serialize();


        $.ajax({
            type: "POST",
            data: info_form,
            url: "ajax_controller.php?action=submit_add&addEdit=" + $('#addEdit').val(),
            dataType: "json",
            success: function (data)
            {

                if (data.status == 'success') {
                    $.each(data.all_fields, function (key, value) {
                        $('#form [name = ' + value + '] + font').remove();
                    });
                    if (data.actions == 'add') { // добавление
                        $('#ads_list').append("<tr style='background-color:#d8fffe' hidden id='r" + data.id + "'>\n\
                    <td>" + data.id + "</td>\n\
                    <td>" + data.seller_name + "</td>\n\
                    <td>" + data.phone + "</td>\n\
                    <td><a class='edit_link'>" + data.title + "</a></td>\n\
                    <td>" + data.description + "</td>\n\\n\
                    <td>" + data.price + "</td>\n\
                    <td><a class='delete btn btn-danger'>Удалить</a></td></tr>");
                        $("#r" + data.id).fadeIn('fast');
                        $("#ads_list").fadeIn('fast');

                    } else if (data.actions == 'edit') { //редактирование
                        $('#r' + data.id + ' td:eq(0)').html(data.id);
                        $('#r' + data.id + ' td:eq(1)').html(data.seller_name);
                        $('#r' + data.id + ' td:eq(2)').html(data.phone);
                        $('#r' + data.id + ' td:eq(3)').html("<a class='edit_link'>" + data.title + "</a>");
                        $('#r' + data.id + ' td:eq(4)').html(data.description);
                        $('#r' + data.id + ' td:eq(5)').html(data.price);

                    }
                    ;
                    clear_form();
                    error_message();
                    $('a.submit').html('Добавить объявление'); // меням название кнопки submit
                    $('#addEdit').val('add'); // сбрасываем addEdit - переключатель добавить/сохранить
                }
                else if (data.status == 'error') { //уведомление,если какое-то обязательно поле пустое
                    $.each(data.all_fields, function (key, value) {
                        $('#form [name = ' + value + '] + font').remove();
                    });
                    $.each(data.fields, function (key, value) {
                        $('#form [name = ' + value + ']').after('<font class="err_msg" color="red">' + data.message + '</font>');
                    });
                }
            }
        });
    };

                     //--------------------------------Добавление объявления CLOSE-------------------------------------//
    
    
    
    
                             //------------Вывод данных в форму OPEN--------------//
 var edit_function = function() {
        var tr = $(this).closest('tr'); //находим ближайший родительский tr
        var id = tr.children('td:first').html(); //находим первый td в этом tr
        var info_edit = { "id": id }; //определяем параметр для ф-ии getJSON
        $.ajax({
            type: "POST",
            data: info_edit,
            url: 'ajax_controller.php?action=edit_add',
            dataType: "json",
            success: function(data) {
                clear_form();
                $.each(data, function(key, value) {     //проверяем поля
                    var path = '#form [name = ' + key + ']';
                    if (key == 'privat' || key == 'allow_mails') {
                        $(path + '[value = ' + value + ']').prop('checked', true);
                    } else if (key == 'category_id' || key == 'location_id') {
                        $(path + ' [value = ' + value + ']').prop('selected', true);
                    } else {
                        $(path).val(value);
                    }
                    $('#addEdit').val('edit');
                    $('a.submit').html('Сохранить объявление');
                });
            }


        });
    }; //------------Вывод данных в форму CLOSE--------------//
    
               
            
            
    
                //-------------------------JS CONTROLLER----------------------//
 
    $('table.table').on('click', 'a.delete', delete_function); // Удаление объявления
    $('a.clForm_button').on('click', function () {
        clear_form();
        $('a.submit').html('Добавить объявление');      // меням название кнопки submit
        $('#addEdit').val('add');                       // сбрасываем addEdit - переключатель добавить/сохранить
    });//Очищаем форму

    $('a.clBase_button').on('click', clBase_function);//Очищаем базу
    $('a.submit').on('click', submit_function);//добавление
    $('table.table').on('click', 'a.edit_link', edit_function);//редактирование
   
    
    
    
    
    
    
    
   


   

    


});    //  Close ready()
