function switchState(rId)
{
    $('#s_' + rId).removeClass('off');
    $('#s_' + rId).removeClass('on');
    $('#s_' + rId).addClass('loading');
    
    $.get('?switchState=' + rId, function(callbackData){
        
        $('#s_' + rId).removeClass('loading');
        
        if (callbackData == 0)
        {
            $('#s_' + rId + ' .mover').animate( { 'margin-left': 1 }, 1000);
            $('#s_' + rId).addClass('off');
        }
        else if (callbackData == 1)
        {
            var moveWidth = $('#s_' + rId).width() - $('#s_' + rId + ' .mover').width() - 1;
            $('#s_' + rId + ' .mover').animate( { 'margin-left': moveWidth }, 1000);
            $('#s_' + rId).addClass('on');
        }
        else
        {
            $('#s_' + rId).addClass('loading');
            alert(callbackData);
        }
        
    });
    
}