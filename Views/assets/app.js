$(document).ready(function(){
    $('#clients').change(function () {
        var e = document.getElementById("inlineFormInputGroupPhone2");
        $('#inlineFormInputGroupPhone2').val($(this).find(':selected').data('phone'));
    })

    $('#btn_submit').click(function(){
        var manager_id    = $('#managers').find(':selected').val();
        var client_id    = $('#clients').find(':selected').val();
        var date_time = $('#date_time').val();
        var text_task = $('#inlineFormInputText').val();
        $.ajax({
            url: "/dashboard/addTask",
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
});