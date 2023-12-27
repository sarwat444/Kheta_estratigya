<script>
    $(function () {
        $('#user-login-modal').on('submit', function (event) {
            event.preventDefault();
            let form = $(this);
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: form.serialize(),
                beforeSend: function () {
                    form.find('.loader-area').html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');
                    form.find('button[type="submit"]').prop('disabled', true);
                },
                success: function (response) {
                    if (response.success === true) {
                        window.location.href = response.redirect;
                    }
                    window.location.reload();
                },
                error: function (response) {
                    form.find('button[type="submit"]').prop('disabled', false);
                    form.find('.loader-area').html('');
                    if (response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function (index, value) {
                            toast('error', value[0]);
                        });
                    } else {
                        toast('error', 'Something went wrong');
                    }
                }
            });
        });
    });
</script>
