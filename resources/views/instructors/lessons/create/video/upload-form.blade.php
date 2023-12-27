<form id="upload-video-course" action="{{$uploadLink}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gy-6">
        <div class="col-12">

            <div class="dashboard-content-box">
                <h4 class="dashboard-content-box__title">{{__('instructor-dashboard.Upload Lesson Video Information')}}</h4>
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="file_data" class="form-label">{{__('instructor-dashboard.Lesson Video')}}</label>
                            <input type="file" name="file_data" id="file_data" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="progress progress-xl mb-5">
                                <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuemin="0"
                                     aria-valuemax="100">0%
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="dashboard-settings__btn">
        <button type="submit" id="submit-form-upload" class="btn btn-primary btn-hover-secondary">{{__('instructor-dashboard.Upload')}}</button>
    </div>
</form>
<input type="hidden" id="lesson_id" value="{{$lessonId}}">


