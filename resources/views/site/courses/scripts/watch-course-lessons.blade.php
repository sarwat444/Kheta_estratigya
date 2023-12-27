<script>
    $(document).on('click', '.play', function () {
        $(this).addClass('active');
        let previewVideoArea = $('#free-course-lessons').find('.modal-body .free-video');
        previewVideoArea.empty();
        let lessonTitle = $(this).find('p').eq(0).text();
        let lessonIframe = $(this).data('lesson-iframe');
        previewVideoArea.append(`<h1 class="lesson-title">${lessonTitle}</h1>
                                <div style="padding:56.25% 0 0 0;position:relative;">
                                   ${lessonIframe}
                                </div>`);
    });
</script>
