<script>
    $(function () {
        $('.grid-or-list').on('click', function () {
            let selectedTab = $(this).data('bs-target');
            localStorage.setItem('selectedTab', selectedTab);
        });
    });
    $(function () {
        let selectedTab = localStorage.getItem('selectedTab');
        if (selectedTab) {
            if (selectedTab === '#list') {
                let btn = $('.grid-or-list[data-bs-target="#list"]');
                btn.addClass('active');
                let btn2 = $('.grid-or-list[data-bs-target="#grid"]');
                btn2.removeClass('active');
                $('#grid').removeClass('active show');
                $('#list').addClass('active show');
            } else {
                let btn = $('.grid-or-list[data-bs-target="#grid"]');
                btn.addClass('active');
                $('#list').removeClass('active show');
                $('#grid').addClass('active show');
            }
        }
    });
</script>
