<script>
    $('.watch-free-lessons-btn').on('click', function () {
        let previewUrl = "{{route('site.courses.lessons.preview',$course->id)}}";
        let modal = $('#free-course-lessons');
        let lessonsArea = modal.find('.modal-body .free-lessons .content');
        let previewVideoArea = modal.find('.modal-body .free-video');
        $.ajax({
            url: previewUrl,
            type: "GET",
            beforeSend: function () {
                previewVideoArea.empty();
                lessonsArea.empty();
            },
            success: function (response) {
                if (response.lessons.length > 0) {
                    modal.modal('show');
                    $.each(response.lessons, function (index, value) {
                        if (index === 0) {
                            previewVideoArea.append(`<h1 class="lesson-title">${response.lessons[index].title}</h1>
                                <div style="padding:56.25% 0 0 0;position:relative;">
                                   ${response.lessons[index].embed}
                                </div>`);
                        }
                        lessonsArea.append(`<div class="row item play ${index === 0 ? 'active' : ''}" data-lesson-iframe='${value.embed}'>
                                    <div class="col-md-11">
                                        <p>${value.title}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="lesson-time">${hours_minutes_seconds_from_seconds(value.duration)}</p>
                                    </div>
                                    </div>`);
                    });

                } else {
                    toast('error', 'there is no free lessons');
                }
            },
            error: function (error) {
                if (error.responseJSON.errors) {
                    $.each(error.responseJSON.errors, function (key, message) {
                        toast('error', message);
                    });
                } else {
                    toast('error', "Something went wrong");
                }
            }
        });
    });
</script>
