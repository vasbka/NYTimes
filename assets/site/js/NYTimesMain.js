jQuery(function ($) {
    $(document).ready(function () {
        alert('123');
    });
    $(document).find('.nytimes_button_add').click(function (e) {
        var userName, userMessage, data;
        alert('1');
        userName = $(this).parent().find('.nytimes_user_name').val();
        userMessgae = $(this).parent().find('.nytimes_message').val();

        data = {
            action: 'guest_book',
            user_name: userName,
            message: userMessage
        };

        console.log(data);
        console.log(ajaxurl+'?action=guest_book');

        $.post( ajaxurl, data, function (response) {
            alert('Получено с сервера: ' + response.data.message);
            console.log(response);
        });
        return false;
    })
});

