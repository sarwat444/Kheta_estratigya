<script>
    $(document).ready(function () {
        let lastViewedElement = $('.last-viewed').first();
        if (lastViewedElement.length) {
            $('#collapse_section_'+lastViewedElement.data('section-id')).collapse('show');
            playLesson(lastViewedElement.data('course-id'), lastViewedElement.data('section-id'), lastViewedElement.data('lesson-id'));
        }
    });
</script>
