<div class="media" id="media-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}">
    <a href="javascript: void(0);">
        <img id="media-preview-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}" src="{{ $attributes->get('image_name')? asset('uploads'.'/'.$attributes->get('upload_dir')).'/'.$attributes->get('image_name'): asset('uploads'.'/default-image.png') }}" class="rounded mr-75" alt="image" height="150" width="350">
        <div class="progress progress-bar-info mt-1 mb-2">
            <div id="progress-bar-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100" style="width:0%"></div>
        </div>
    </a>
    <div class="media-body mt-25">
        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
            <label for="select-files-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                <span>{{ __('Upload New') }}</span>
                <input id="select-files-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}" type="file" hidden="">
            </label>
        </div>
        <p class="text-muted ml-1 mt-50"><small>{{ __('Allowed') }} "JPG,PNG"
                {{ __('Max size of') }} "1024" {{ __('Kilobyte') }}</small></p>
    </div>

    <input value="{{ $attributes->get('image_name')}}" type="hidden" name="{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}" id="field-{{$attributes->get('input_name')?$attributes->get('input_name'):'image'}}">
</div>
@push('scripts')
    <script>
        $('#select-files-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').on('change',function (){
            var percentage = 0;
            $('.progress #progress-bar-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').css("width", percentage+'%', function() {
                return $(this).attr("aria-valuenow", percentage) + "%";
            });
            $('#upload-form-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').remove();
            $('body').append('<form enctype="multipart/form-data" method="post" action="{{ route('single.image.uploader') }}" id="upload-form-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}"' +
                '">@csrf<form/>');
            var new_input = $(this).clone();
            new_input.attr('name','file');
            new_input.attr('id','uploader-input-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image'  }}');
            $('#upload-form-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}')
                .append(new_input);
            $('#upload-form-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}')
                .append('<input type="hidden" name="upload_dir" value="{{ $attributes->get('upload_dir')?$attributes->get('upload_dir'):'general' }}">');

            $('#upload-form-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').ajaxSubmit({
                beforeSend: function () {
                    var percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentage = percentComplete;
                    $('.progress #progress-bar-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').css("width", percentage+'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                complete: function (xhr) {
                    $("#media-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }} .text-danger").remove();

                    if(xhr.status == 422){
                        var percentage = 0;
                        $('.progress #progress-bar-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').css("width", percentage+'%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        });
                        $("#media-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}").append('<p class="clearfix text-danger">'+xhr.responseJSON.message+'</p>');
                    }else if(xhr.status == 500){
                        $("#media-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}").append('<p class="clearfix text-danger">'+xhr.statusText+'</p>');
                    }else{
                        $('#media-preview-{{ $attributes->get('input_name')?$attributes->get('input_name'):'image' }}').attr('src','{{ asset('uploads'.'/'.$attributes->get('upload_dir')).'/' }}'+xhr.responseJSON.file);
                        $('#field-{{$attributes->get('input_name')?$attributes->get('input_name'):'image'}}').val(xhr.responseJSON.file);
                    }
                }
            });
        });
    </script>
@endpush