$(document).ready(function () {

    $('button.article__like').click(function () {
        var article_id = $(this).attr('id');
        // console.log('click on ' + article_id);

        $.ajax({
            type: 'POST',
            url: 'application/core/like.php',
            data: 'article_id=' + article_id,
            success: function (data) {
                $('like-count[id="' + article_id + '"]').text(data);
            }
        });
    });
});