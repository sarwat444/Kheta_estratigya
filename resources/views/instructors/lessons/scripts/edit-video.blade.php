<script>
    $('#update-lesson-video').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        let button = form.find('button');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            beforeSend: function () {
                button.attr('disabled', true);
            },
            success: function (response) {
                button.attr('disabled', false);
                toast(response.type, response.message);
            },
            error: function (error) {
                button.attr('disabled', false);
                if (error.responseJSON.errors) {
                    $.each(error.responseJSON.errors, function (key, value) {
                        toast('error', value[0]);
                    });
                } else {
                    toast('error', 'something went wrong');
                }
            }
        });
    });
</script>
