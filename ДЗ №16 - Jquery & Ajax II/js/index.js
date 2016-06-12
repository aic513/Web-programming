$('document').ready(function () {                                  // устанавливаем обработчик готовности дерева DOM (.ready)
    $('a.delete').on('click', function () {                            //всем ссылкам с классом delete привязываем ф-ию on с событием click
        var tr = $(this).closest('tr');                                    //находим ближайший родительский tr
        var id = tr.children('td:first').html();                   //находим первый td в этом tr
                       
        var number = {"del_ad": id};
        $.getJSON('ajax_controller.php?action=delete',
                number,
                function (response) {
                    tr.fadeOut('slow', function () {                         //медленно скрываем строку
                        if(response.status=='success'){
                            $('#container').removeClass('alert-info').addClass('alert-success');
                            $('#container_info').html(response.message);
                            $('#container').fadeIn('slow');
                        }
                        else if (response.status=='error'){
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
    });        //Close on()


    function clear_form() {                                              //функция очистки полей формы
        $(':input', '#form')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');
    };
    
    function notice_empty() {
        if ($('#ads_list').html() == 0) {
            $('#notice_info').fadeIn();
        }
        else if ($('#ads_list').html() != 0) {
            $('#notice_info').fadeOut('fast');
        }
    }

    
});    //  Close ready()
