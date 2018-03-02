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

    $('button.comment__button_call').click(function(){
        var article_id = $(this).attr('id')
        commentButtonClick(article_id)
    });

    $('button.comment__button_send').click(function () {
        // var button_send = this;
        var article_id = $(this).attr('id');
        // var textarea = $('textarea[id="' + article_id + '"]');
        // var button_send = $('button.comment__button_send[id="' + article_id + '"]');
        commentButtonClick(article_id);

        console.log('click on ' + article_id);
    });

    function search() {
        alert(1);
    }
});

function commentButtonClick(article_id) {
    var button_call = $('button.comment__button_call[id="' + article_id + '"]');
    var textarea = $('textarea[id="' + article_id + '"]');
    var button_send = $('button.comment__button_send[id="' + article_id + '"]');

    if ($(textarea).is(':visible')) {
        $(textarea).hide();
        $(button_send).hide();
        console.log('1');
        $(button_call).text('Comment');

    } else {
        $(button_call).text('Cansel');
        $(textarea).show();
        $(button_send).show();
        console.log('2');
    }

    console.log('click on ' + article_id);
}