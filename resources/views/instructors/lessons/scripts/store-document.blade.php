<script>
    $("#store-lesson-document-from").submit(function (event) {
        event.preventDefault();
        let formData = new FormData($('#store-lesson-document-from')[0]);
        let submitButton = $(this).find('#submit-button');
        $.ajax({
            'url': $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                submitButton.attr('disabled', true);
            },
            success: function (response) {
                toast(response.type, response.message);
                window.location.href = response.next;
            },
            error: function (response) {
                submitButton.attr('disabled', false);
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
