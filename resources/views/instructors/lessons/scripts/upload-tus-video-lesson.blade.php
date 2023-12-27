<script>
    $(document).on('click','#submit-form-upload',function(e){
        e.preventDefault();
        let uploadUrl = $("#upload-video-course").attr('action');
        let file = document.getElementById('file_data').files[0];
        let submitButton = $("#submit-form-upload");
        submitButton.attr('disabled', true);
        submitButton.html('<i class="fa fa-spinner fa-spin"></i>uploading...');
        let upload = new tus.Upload(file, {
            uploadUrl: uploadUrl,
            onError: function(error) {
                toast('error','error upload video');
                console.log('error: ' + error);
                submitButton.attr('disabled', false);
                submitButton.html('Upload');
            },
            onProgress: function(bytesUploaded, bytesTotal) {
                let percentage = (bytesUploaded / bytesTotal * 100).toFixed(2);
                let progress = $("#progress-bar");
                progress.css('width',percentage+'%');
                progress.text(percentage+'%');
            },
            onSuccess: function() {
                submitButton.html(`uploaded successfully`);
                submitButton.attr('disabled', true);
                submitButton.html(`uploaded successfully`);
                toast('success','video uploaded successfully');
                let lesson_id = $("#lesson_id").val();
                let route = "{{route('dashboard.instructors.lessons.video.uploaded',':lesson_id')}}";
                route = route.replace(':lesson_id',lesson_id);
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {_token:'{{csrf_token()}}'},
                    success: function(response){
                        if(response.type === 'success') {
                            toast(response.type, response.message);
                            window.location.href = response.next;
                        } else {
                            toast(response.type, response.message);
                        }
                    },
                    error: function(response){
                        toast('error','an error occurred while assigning the video to folder');
                    }
                });
                console.log("Download %s from %s", upload.file.name, upload.url)
            }
        })
        upload.start();
    });
</script>
