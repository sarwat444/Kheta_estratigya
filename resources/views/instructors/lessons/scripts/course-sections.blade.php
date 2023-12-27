<script>
    $(document).ready(function () {
        $('.select2.course').on('change', function () {
            let course = $(this).val();
            let route = '{{ route("dashboard.instructors.courses.sections", ":course") }}';
            route = route.replace(':course', course);
            $.ajax({
                url: route,
                type: 'GET',
                success: function (response) {
                    if (response.sections.length > 0) {
                        let rows = '<option disabled selected>{{__('instructor-dashboard.Select Section')}}</option>';
                        $.each(response.sections, function (index, section) {
                            rows += '<option value="' + section.id + '">' + section.name + '</option>';
                        });
                        $('.sections').html(rows);
                    } else {
                        $('.sections').html('<option disabled selected>{{__('instructor-dashboard.No Sections Please add one')}}</option>');
                    }
                },
                error: function (response) {
                    toast('error', 'Something went wrong');
                }
            });
        });
    });
</script>
