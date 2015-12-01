(function($) {
    var html = '';
    var template = $.trim($('#messageTemplate').text());

    $(document).keydown(function(e) {
        if (e.ctrlKey && e.which == 13) {
            $('.message-write form').submit();
        }
    });

    var imgValue = Math.floor(Math.random() * 20 + 1);
    $('#img').val(imgValue)
             .next().attr('src', 'public/img/' + imgValue + '.png');

    $.ajax({
        url: '/api/getMessages.php',
        method: 'get',
        dataType: 'json',
        success: function(data) {
            var time;
            var data = data.reverse();

            $.each(data, function(index, data) {
                time = moment(data.created_at).fromNow();

                html += template.replace(/{{ name }}/, data.name)
                                .replace(/{{ message }}/, data.message)
                                .replace(/{{ img }}/, data.img)
                                .replace(/{{ time }}/, time);
            });

            $('.message-box').append(html);
            html = '';
        },
        error: function(error) {
            console.log(error);
        }
    });

    $('.message-write form').on('submit', function(e) {
        e.preventDefault();

        var $this = $(this);

        if ($.trim($('#name').val()) === '' || $.trim($('#message').val()) === '') {
            $('#name').focus();

            return;
        }

        $.ajax({
            url: $this.attr('action'),
            method: $this.attr('method'),
            data: $this.serializeArray(),
            dataType: 'json',
            success: function(data) {
                insertToDomAndClearTheForm(data);
                console.log(data);
            },
            error: function(error) {
                console.log(error);
            }
        });

    });

    function insertToDomAndClearTheForm (data) {
        var name = data.name;
        var message = data.message;
        var img = data.img;
        var time = moment(data.created_at).fromNow();

        html += template.replace(/{{ name }}/, name)
                        .replace(/{{ message }}/, message)
                        .replace(/{{ img }}/, img)
                        .replace(/{{ time }}/, time);

        $('.message-box').append(html);
        html = '';

        $('#name').val('');
        $('#message').val('');
    }
})(jQuery);
