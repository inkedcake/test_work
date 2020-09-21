$(document).ready(function(){
    $('#clients').change(function () {
        var e = document.getElementById("phone");
        $('#phone').val($(this).find(':selected').data('phone'));
    });

    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-";
    if ((currentdate.getMonth()+1) < 10){
        datetime += '0'+(currentdate.getMonth()+1)  + "-";
    }else {
        datetime += (currentdate.getMonth()+1)  + "-";
    }
    datetime += currentdate.getDate();
    $.each($('.date_time_end'), function( index, value ) {
        var item = value.closest('tr');
        if (value.innerHTML.split(' ')[0] > datetime){
         $(item).addClass('table-success');
       }else if (value.innerHTML.split(' ')[0] < datetime){
           $(item).addClass('table-danger');
       }else{
           $(item).addClass('table-warning');
           alert('Call today to '
               +$(item).find("td:eq(0)").text()
           +'on phone number:'+
               $(item).find("td:eq(1)").text()
           )
       }

    });

    $('#btn_submit').click(function(){
        var manager_id    = $('#managers').find(':selected').val();
        var client_id    = $('#clients').find(':selected').val();
        var date_time = $('#date_time').val();
        var text_task = $('#inlineFormInputText').val();
        $.ajax({
            url: "/task/addTask",
            type: "post",
            data: {
                "manager_id": manager_id,
                "client_id": client_id,
                "date_time": date_time,
                "text_task": text_task
            },
            error:function(){$("#erconts").html("Произошла ошибка!");},
            beforeSend: function() {
                $("#erconts").html("Отправляем данные...");
            },
            success: function(result){
                $('#erconts').html(result);
                alert('Task added to chosen manager');
                    }
        });
    });
    $('#btn_submit_note').click(function(){
        var full_name    = $('#clients').find(':selected').val();
        var remind_at = $('#remind_at').val();
        var phone = $('#phone').val();
        $.ajax({
            url: "/calendar/addNote",
            type: "post",
            data: {
                "full_name": full_name,
                "remind_at": remind_at,
                "phone": phone
            },
            error:function(){$("#erconts").html("Произошла ошибка!");},
            beforeSend: function() {
                $("#erconts").html("Отправляем данные...");
            },
            success: function(result){
                $('#erconts').html(result);
                alert('Task added to chosen manager');
            }
        });
    });
});