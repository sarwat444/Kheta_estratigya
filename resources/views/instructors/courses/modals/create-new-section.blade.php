<div class="modal fade" id="create-new-section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.instructors.sections.store')}}" id="store-new-section">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <div class="mb-2">
                        <label for="name" class="col-form-label">{{__('instructor-dashboard.Section Name')}}</label>
                        <input type="text" name="name" placeholder="{{__('instructor-dashboard.Section Name')}}" class="form-control" id="name"
                               required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary section-btn" style="background-color: #eee;" data-bs-dismiss="modal">{{__('instructor-dashboard.close')}}</button>
                        <button type="submit" class="btn btn-primary section-btn " id="submit-button">{{__('instructor-dashboard.save')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
