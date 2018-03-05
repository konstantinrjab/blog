$(document).ready(function () {
    $('button.article__like').click(function () {
        var button = this;
        var article_id = $(this).attr('id');
        console.log('click on ' + article_id);

        $.ajax({
            type: 'POST',
            url: 'application/core/like.php',
            dataType: 'json',
            data: 'article_id=' + article_id,
            success: function (data) {
                // data = $.parseJSON(data);
                console.log(data);
                if (data === 'guest') {
                    alert('You have to log in');
                }

                $(button).children('span').text(data['count']);

                if (data['action'] === 'add') {
                    $(button).children('i').show();
                } else {
                    $(button).children('i').hide();
                }
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });

    $('button.comment__button_call').click(function () {
        var article_id = $(this).attr('article_id');
        console.log('!!! ' + article_id);
        commentButtonClick(article_id)
    });

    $('button.comment__button_send').click(function () {
        // var button_send = this;
        var article_id = $(this).attr('article_id');
        var textarea = $('textarea[article_id="' + article_id + '"]');
        var parent_id = 0;
        var text = $(textarea).val();
        if ($(this).attr('parent_id')) {
            parent_id = $(this).attr('parent_id');
        }

        console.log(textarea);
        console.log($('textarea[article_id="' + article_id + '"]').val());
        console.log('click on ' + article_id);
        console.log('parent ' + parent_id);
        console.log('text ' + text);
        commentButtonClick(article_id);

        $.ajax({
            type: 'POST',
            url: 'application/core/comment.php',
            dataType: 'json',
            data: {
                'article_id': article_id,
                'text': text,
                'parent_id': parent_id
            },
            success: function (data) {
                // data = $.parseJSON(data);
                console.log(data);
                if (data === 'guest') {
                    alert('You have to log in');
                }
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
});

function commentButtonClick(article_id) {
    var button_call = $('button.comment__button_call[article_id="' + article_id + '"]');
    var textarea = $('textarea[article_id="' + article_id + '"]');
    var button_send = $('button.comment__button_send[article_id="' + article_id + '"]');

    if ($(textarea).is(':visible')) {
        $(textarea).hide();
        $(button_send).hide();
        $(button_call).text('Comment');

    } else {
        $(button_call).text('Cancel');
        $(textarea).show();
        $(button_send).show();
    }

    console.log('click on ' + article_id);
}