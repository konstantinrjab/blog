$(document).ready(function () {
    $('button.article__button_like').click(function () {
        var button = this;
        var article_id = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: 'application/core/like.php',
            dataType: 'json',
            data: {
                'article_id': +article_id,
                'like': true
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

    $('button.article__button_comment').click(function () {
        var article_id = $(this).attr('article_id');
        var parent_id = $(this).attr('parent_id');
        var textarea = $('textarea[article_id="' + article_id + '"][parent_id="' + parent_id + '"]');
        var text = $(textarea).val();

        if (text.length) {
            sendComment(article_id, parent_id, text, textarea)
        }
    });

    // on reply
    $('div.article__comment').click(function () {
        var article_id = $(this).attr('article_id');
        var comment_id = $(this).attr('comment_id');
        //show btn and textarea
        var textarea = $('textarea[parent_id="' + comment_id + '"]');
        var button = $('button[parent_id="' + comment_id + '"]');
        $(textarea).show();
        $(button).show();
        // var text = $(textarea).val();
        //
        // if (text.length) {
        //     sendComment(article_id, parent_id, text)
        // }
    });
});

function sendComment(article_id, parent_id, text, textarea) {
    $.ajax({
        type: 'POST',
        url: 'application/core/comment-ajax.php',
        dataType: 'html',
        data: {
            'article_id': article_id,
            'comment': true,
            'text': text,
            'parent_id': parent_id
        },
        success: function (data) {
            // data = $.parseJSON(data);
            if (data === 'login error') {
                alert('You have to sign in');
            } else {
                comment_area = $('div.article__comments_area[article_id="' + article_id + '"]');
                $(comment_area).empty();
                $(textarea).val('');
                $(comment_area).append(data);
            }
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
    });
}