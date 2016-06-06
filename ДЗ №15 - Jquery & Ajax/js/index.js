$('document').ready(function () {                              // устанавливаем обработчик готовности дерева DOM (.ready)
    $('a.delete').on('click', function () {                    //всем ссылкам с классом delete привязываем ф-ию on с событием click
        var tr = $(this).closest('tr');                        //находим ближайший родительский tr
        var id = tr.children('td:first').html();               //находим первый td в этом tr
        $('input,select,textarea,checkbox').val('');

        $('#container').load('ajax_delete.php?action=delete&del_ad=' + id, //выполняется ajax-запрос и полученные данные записываются в container
                function () { //success
                    tr.fadeOut('slow', function () {                         //медленно скрываем строку
                        $(this).remove();                                    //удаляем строку из DOM
                        clear_form();                                        //очищаем поля в форме



                    });
                });


    });

});

function clear_form() {                                              //функция очистки формы
    $(':input', '#form')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');


}