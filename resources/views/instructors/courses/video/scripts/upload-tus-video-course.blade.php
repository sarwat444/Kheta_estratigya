<script>
    $(document).on('click','#submit-form-upload',function(e){
        e.preventDefault();
        let uploadUrl = $("#upload-video-course").attr('action');
        let file = document.getElementById('file_data').files[0];
        let submitButton = $("#submit-form-upload");
        submitButton.attr('disabled', true);
        submitButton.html('<i class="fa fa-spinner fa-spin"></i> uploading...');
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
                toast('success','video uploaded successfully');
                console.log("Download %s from %s", upload.file.name, upload.url)
            }
        })
        upload.start();
    });
</script>
