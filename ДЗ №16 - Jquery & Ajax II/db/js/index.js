 //--------------------------------Очистка полей формы OPEN--------------------------------------//    
var clear_form = function () {
    $(
            ':input', '#form')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
};        //------------------------------Очистка полей формы CLOSE----------------------------------//
    
//------------------------------------Уведомления,что БД пуста OPEN------------------------//
function notice_empty() {
    if ($('#ads_list').html() == 0) {
        $('#notice_info').fadeIn();
    }
    else if ($('#ads_list').html() != 0) {
        $('#notice_info').fadeOut('fast');
    }
};       //------------------------------------Уведомления,что БД пуста CLOSE------------------------//
 

 
$('document').ready(function () {                  // устанавливаем обработчик готовности дерева DOM (.ready)
    
    
             //--------------------------------------Удаление объявления OPEN--------------------------------------------------//


    var delete_function = function () {                     //определяем функцию удаления
        var tr = $(this).closest('tr');                     //находим ближайший родительский tr
        var id = tr.children('td:first').html();            //находим первый td в этом tr

        var number = {"del_ad": id};                       //определяем параметр для ф-ии getJSON
        $.getJSON('ajax_controller.php?action=delete',
                number,
                function (response) {
                    tr.fadeOut('slow', function () {                         //медленно скрываем строку
                        if (response.status == 'success') {
                            $('#container').removeClass('alert-info').addClass('alert-success');
                            $('#container_info').html(response.message);
                            $('#container').fadeIn('slow');
                        }
                        else if (response.status == 'error') {
                            $('#container').removeClass('alert-success').addClass('alert-danger');
                            $('#container_info').html(response.message);
                            $('#container').fadeIn('slow');
                        }
                        setTimeout(function () {               //самоисчезание через 3 секунды
                            $('#container').fadeOut('slow');
                        }, 3000);
                        $(this).remove(); //удаляем строку из DOM
                        notice_empty();
                        clear_form(); //очищаем поля в форме
                    });
                });  // Close get()
    };        //--------------------------------------Удаление объявления CLOSE--------------------------------------------------//
    
            
    
    
               
            
            
    
    
    $('a.delete').on('click', delete_function); // Удалить объявление (всем ссылкам с классом delete привязываем ф-ию on с событием click)
    $('a.clForm_button').on('click',clear_form);
 


   

    


});    //  Close ready()
