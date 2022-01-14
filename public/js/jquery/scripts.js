$(document).ready(() => {
    $('a.flag').click(e => {
        e.preventDefault();
        $.get(e.currentTarget.href, res => {
            $(e.currentTarget).parents('.comment-meta').append(res)

        });

    });

});