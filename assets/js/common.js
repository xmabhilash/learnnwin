
$(function(){
    $('.questionList .opt').on('click', function () {
        var obj = this;
        $.post('ajax.php', {ajax:'getAnswer', id:$(this).attr('id')}, function(result) {
            if ($(obj).text() != result) {
                $(obj).addClass('btn-danger');
                $('.'+$(obj).attr('id')+result).addClass('btn-success');
            } else {
                $(obj).addClass('btn-success');
            }
            $(obj).removeClass('opt');
        })
    });
});