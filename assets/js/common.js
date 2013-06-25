
$(function(){
    $('.questionList .opt').on('click', function () {
        var obj = this;
        $.post('ajax.php', {ajax:'getAnswer', id:$(this).attr('id'), choice:$(obj).text()}, function(result) {
            if ($(obj).text() != result) {
                $(obj).addClass('btn-danger');
                $('.'+$(obj).attr('id')+result).addClass('btn-success');
            } else {
                $(obj).addClass('btn-success');
                $.post('ajax', {ajax:'updateScore'}, function(result){
                   $('.btn-score').html('Score:'+result);
                });
            }
            $(obj).removeClass('opt');
        })
    });
});