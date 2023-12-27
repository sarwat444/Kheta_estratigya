<script>
    $('.add-cart').on('click', function (e) {
        e.preventDefault();
        let url = "{{route('site.cart.store',':id')}}";
        let item = $(this).data('item');
        url = url.replace(':id', item);
        let token = "{{csrf_token()}}";
        $.ajax({
            url: url,
            method: "POST",
            data: {_token: token},
            success: function (response) {
                toast('success', response.message);
                location.reload();
            },
            error: function (response) {
                if (response.status === 422) {
                    toast('error', response.responseJSON.message);
                } else {
                    toast('error', 'Something went wrong! Please try again later.');
                }
            }

        });
    });
</script>
