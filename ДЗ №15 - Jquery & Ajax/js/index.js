$('document').ready(function () {
    $('a.delete').on('click', function () {
        var tr = $(this).closest('tr');
        var id = tr.children('td:first').html();
        
        $('#container').load('ajax_delete.php?action=delete&del_ad=' + id,
                            function(){ //success
                                tr.fadeOut('slow',function(){
                                    $(this).remove();
                                    
                                });
                            });
                        });
                        

    

});