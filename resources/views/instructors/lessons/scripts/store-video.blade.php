<script>
    $("#store-lesson-video").on('submit', function (event) {
        event.preventDefault();
        let formData = new FormData($('#store-lesson-video')[0]);
        let submitButton = $(this).find('#submit-button');
        $.ajax({
            'url': $(this).attr('action'),
            type: $(this).attr('method'),
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                submitButton.attr('disabled', true);
            },
            success: function (data) {
                toast(data.type, data.message);
                $("#upload-form-content").html(data.form);
            },
            error: function (data) {
                submitButton.attr('disabled', false);
                if (data.responseJSON.errors) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        toast("error", value[0]);
                    });
                } else {
                    toast("error", "something went wrong");
                }
            },
        });
    });
</script>
