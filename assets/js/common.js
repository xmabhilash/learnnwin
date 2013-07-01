var timeout;
var resultString;
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

    $('.addGroup').on('click', function(){
        $('#myModal').modal('hide');
        $.post('ajax.php', $('#groupModel').serialize(), function(){

        });
    });
    $('#topperModal').on('show', function () {
        $.post('ajax.php', {ajax:'getToppers'}, function(result){
            var str = '';
            $.each(result, function( i, item ) {

            });
        });

    });
    $('#editor-box').keyup(function(event) {
        if (event.which == 32) {

        } else {
            clearTimeout(timeout);
            timeout = setTimeout('dotransilation()', 300);
        }
    });
    $('#suggestion-box').on('click', 'ol li', function(){
        var string = $('#editor-box').html().trim();
        var stringArray  = string.split(" ");
        stringArray[stringArray.length-1] = $(this).text()+' ';
        $('#editor-box').html(stringArray.join(" "));
    });
});
function dotransilation()
{
    var string = $('#editor-box').text();
    var stringArray  = string.split(" ");
    var key = stringArray[stringArray.length-1];
    $.post('ajax.php', {ajax:'translate', key: key}, function(result){
        var options = jQuery.parseJSON(result);
        if (options.length >1){
            if (options[0] == 'SUCCESS') {
                var choices = resultString = options[1][0][1];
                $str = '<ol>';
                for (var i=0;i<choices.length;i++)
                {
                    $str += '<li>'+choices[i]+'</li>';
                }
                $str += '</ol>';
                $('#suggestion-box').html($str);
            }
        }
    });
}