<script>
    $("#update-course-from").on('submit', function (event) {
        event.preventDefault();
        let formData = new FormData($('#update-course-from')[0]);
        let submitBtn = $(this).find('#submit-form');
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                submitBtn.attr('disabled', true);
            },
            success: function (response) {
                toast(response.type, response.message);
                window.location.href = response.next;
            },
            error: function (response) {
                submitBtn.attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (key, value) {
                        toast("error", value[0]);
                    });
                } else {
                    toast("error", "{{__('instructor-dashboard.something went wrong')}}");
                }
            },
        });
    });
</script>
