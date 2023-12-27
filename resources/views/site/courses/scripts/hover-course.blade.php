<script>
    $(document).ready(function () {
        $('.course-item-02').hover(function (event) {
            event.preventDefault();
            let course_id = $(this).data('course-id');
            let url = '{{ route('site.courses.information',':id') }}';
            url = url.replace(':id', course_id);
            if (course_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        let rate = (response.data.rates_avg_rate) ? (response.data.rates_avg_rate * 20) : 0;
                        response.data.rates_avg_rate = response.data.rates_avg_rate ?? 0;
                        $('.course-item-hover__category').html(response.data.category.name);
                        $('.course-item-hover__title').html(response.data.title);
                        $('.course-item-hover__rating').html(`
                                <div class="rating-star">
                                    <div class="rating-label hover__rating" style="width: ${rate}%;"></div>
                                </div>
                                <div class="rating-average">
                                    <span class="rating-average__average">${parseFloat(response.data.rates_avg_rate).toFixed(2)}</span>
                                    <span class="rating-average__total">/5</span>
                                </div>
                                `);
                        $('.course-item-hover__meta').html(`
                                <span>${response.data.lessons_count} lessons</span>
                                <span>${hours_minutes_seconds_from_seconds(response.data.lessons_sum_duration)}</span>
                            `);
                        $('.course-item-hover__benefits-title').html(`course prerequisites`);
                        let prerequisites = ``;
                        response.data.prerequisites.forEach(function (prerequisite) {
                            prerequisites += `<li>${prerequisite.course_prerequisites}</li>`;
                        });
                        $('.course-item-hover__benefits-list').html(prerequisites);
                    },
                    error: function (response) {
                        toast('error', 'Something went wrong');
                    }
                });
            }
        });
    });
</script>
