$(document).ready(function () {
    $('button.article__like').click(function () {
        var button = this;
        var article_id = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: 'application/core/like.php',
            dataType: 'json',
            data: {
                'article_id': + article_id,
                'like':true
            },
            success: function (data) {
                // data = $.parseJSON(data);
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
        commentButtonClick(article_id);

        $.ajax({
            type: 'POST',
            url: 'application/core/comment-ajax.php',
            dataType: 'html',
            data: {
                'article_id': article_id,
                'comment':true,
                'text': text,
                'parent_id': parent_id
            },
            success: function (data) {
                // data = $.parseJSON(data);
                if (data === 'guest') {
                    alert('You have to log in');
                } else {
                    comment_area = $('div.article__comments[article_id="' + article_id + '"]');
                    $(comment_area).empty();
                    $(comment_area).append(data);
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
}