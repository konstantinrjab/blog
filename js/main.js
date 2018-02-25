$(document).ready(function () {

    $('button.article__like').click(function () {
        var button = this;
        var article_id = $(this).attr('id');
        // console.log('click on ' + article_id);

        $.ajax({
            type: 'POST',
            url: 'application/core/like.php',
            data: 'article_id=' + article_id,
            success: function (data) {
                data = $.parseJSON(data);
                console.log(data);

                // $('span[id="' + article_id + '"]').text(data['count']);
                $(button).children('span').text(data['count']);

                if(data['action'] === 'add'){
                    $(button).children('i').show();
                } else {
                    $(button).children('i').hide();
                }
            }
        });
    });
});