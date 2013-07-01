var timeout;
var resultString;
$(function(){
    $('.container').on('click', '.questionList .opt', function () {
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
            result = jQuery.parseJSON(result);
            $.each(result, function( i, item ) {
                str +="<tr><td>"+item.firstName+" "+item.lastName+"</td><td>"+item.score+"</td><td><a href='list.php?type=view&user="+item.id+"' class='btn'>View</a><a href='list.php?type=contribution&user="+item.id+"' class='btn'>Contributions</a></td></tr>";
            });
            $('.toppers tbody').html(str);
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
    $('.container').on('click', '.pagination ul li', function(){
        if ($(this).hasClass('noClick')) {
            return;
        }
        var page = $(this).children(1).html();
        if ($(this).hasClass('prev')) {
            page = parseInt($('.pagination ul li.active').children(1).html())-1;
        }
        if ($(this).hasClass('next')) {
            page = parseInt($('.pagination ul li.active').children(1).html())+1;
        }
        loadHomeQuestionList(page);
    });
    loadHomeQuestionList(1);
});
function loadHomeQuestionList(page) {
    $.post('listAjax.php', {page:page}, function(result){
        $('.questionContainer').html(result).fadeIn();
    });
}
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