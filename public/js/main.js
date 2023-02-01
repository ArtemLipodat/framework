$(document).ready(() => {
    $('#userAdd').submit(function(e) {
        e.preventDefault();

        let form = $(this),
            actionUrl = form.attr('action'),
            type = form.attr('method');

        $.ajax({
            type: type,
            url: actionUrl,
            data: form.serialize(),
            success: function(r) {
                $('#jsForm').html(r)
            }
        });
    });
})