<script>
    $("#store-section-from").on('submit', function (event) {
        event.preventDefault();
        let formData = new FormData($('#store-section-from')[0]);
        $.ajax({
            'url': $(this).attr('action'),
            type: $(this).attr('method'),
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $("#submit-form").attr('disabled', true);
            },
            success: function (response) {
                toast(response.type, response.message);
                location.reload();
            },
            error: function (response) {
                $("#submit-form").attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (key, value) {
                        toast("error", value[0]);
                    });
                } else {
                    toast("error", "something went wrong");
                }
            },
        });
    });
</script>
