<script>
    function playLesson(courseId, sectionId, lessonId) {
        $('.play-lesson').find('.live-icon').each(function () {
            $(this).empty();
        });
        let lessonPlayedNow = $('#play_lesson_' + lessonId);
        let section_id = sectionId;
        let course_id = courseId;
        let lesson_id = lessonId;
        let workingLiveIconArea = lessonPlayedNow.find('.live-icon');
        let CompletedArea = lessonPlayedNow.next().find('span').eq(0);
        let lessonMediaPreview = $('.lesson-media-preview');
        let lessonMediaPreviewTitle = $('.course-title');
        let _token = '{{csrf_token()}}';
        let urlLessonPreview = '{{route('site.courses.me.watch.lesson',['course_id','section_id','lesson_id'])}}';
        urlLessonPreview = urlLessonPreview.replace('course_id', course_id).replace('section_id', section_id).replace('lesson_id', lesson_id);
        $.ajax({
            url: urlLessonPreview,
            type: 'GET',
            beforeSend: function () {
                lessonMediaPreview.html('<div class="text-center" style="margin-top: 25%"><i class="fa fa-spinner fa-spin fa-10x fa-fw"></i></div>');
            },
            success: function (response) {
                if(response.data.type === Video){
                    lessonMediaPreview.html(response.data.embed);
                    lessonMediaPreviewTitle.html(`<h1>${response.data.title}</h1>`);
                    let player = new Vimeo.Player(lessonMediaPreview.find('iframe'));
                    let is_completed = (response.data.lesson_progress.is_completed === LESSON_COMPLETED);
                    let previous_time_completed = function () {
                        if (is_completed) {
                            return 0;
                        }
                        return response.data.lesson_progress.time_completed - BackTOSecondInVideo;
                    };
                    let is_pause = false;
                    player.play();
                    player.setCurrentTime(previous_time_completed());
                    workingLiveIconArea.html(`<div class="video__icon"><div class="circle--outer"></div><div class="circle--inner"></div></div>`);
                    setInterval(function () {
                        player.getCurrentTime().then(function (seconds) {
                            let lesson_id = response.data.lesson_progress.lesson_id;
                            let section_id = response.data.lesson_progress.section_id;
                            let course_id = response.data.lesson_progress.course_id;
                            let urlCollectLessonProgress = '{{route('site.courses.me.watch.lesson.progress',['course_id','section_id','lesson_id'])}}';
                            urlCollectLessonProgress = urlCollectLessonProgress.replace('course_id', course_id).replace('section_id', section_id).replace('lesson_id', lesson_id);
                            if (!is_pause && !is_completed && seconds > previous_time_completed()) {
                                $.ajax({
                                    url: urlCollectLessonProgress,
                                    type: 'POST',
                                    data: {_token: _token, time_completed: seconds, is_completed: is_completed},
                                    success: function (response) {
                                        console.log('lesson progress collected successfully');
                                    },
                                    error: function (response) {
                                        console.log(response);
                                    }
                                });
                            }
                        });
                    }, 3000);
                    player.on('play', function (data) {
                        workingLiveIconArea.html(`<div class="video__icon"><div class="circle--outer"></div><div class="circle--inner"></div></div>`);
                        is_pause = false;
                    });
                    player.on('pause', function (data) {
                        workingLiveIconArea.empty();
                        is_pause = true;
                    });
                    player.on('ended', function (data) {
                        workingLiveIconArea.empty();
                        CompletedArea.html(`<i class='fa fa-check-circle></i>`);
                        if (!is_completed) {
                            let urlLessonComplete = '{{route('site.courses.me.mark.complete.lesson',['course_id','section_id','lesson_id'])}}';
                            urlLessonComplete = urlLessonComplete.replace('course_id', course_id).replace('section_id', section_id).replace('lesson_id', lesson_id);
                            $.ajax({
                                url: urlLessonComplete,
                                type: 'POST',
                                data: {_token: _token, is_completed: true, time_completed: data.seconds},
                                success: function (response) {
                                    is_completed = true;
                                    console.log('lesson progress collected successfully and lesson marked as completed');
                                },
                                error: function (response) {
                                    console.log(response);
                                }
                            });
                        }
                    });
                }else{
                    CompletedArea.html(`<i class='fa fa-check-circle></i>`);
                    lessonMediaPreviewTitle.html(`<h1>${response.data.title}</h1>`);
                    lessonMediaPreview.html(`<a href="${response.data.embed}" target="_blank"><img src="{{asset('assets/site/images/document/url-icon.jpg')}}"></a>`);
                }

            },
            error: function (response) {
                lessonMediaPreview.html('<div class="text-center" style="margin-top: 25%"><i class="fa fa-spinner fa-spin fa-10x fa-fw"></i></div>');
                workingLiveIconArea.empty();
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (index, value) {
                        toast('error', value[0]);
                    });
                } else {
                    toast('error', 'something went wrong');
                }
            }

        });
    }
</script>
