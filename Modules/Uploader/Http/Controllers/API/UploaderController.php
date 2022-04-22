<?php

namespace Modules\Uploader\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Uploader\Http\Requests\API\AvatarUploaderRequest;
use Modules\Uploader\Http\Requests\API\FileUploaderRequest;
use Modules\Uploader\Http\Requests\API\ImageUploaderRequest;

class UploaderController extends Controller
{
    /**
     * Upload avatar method.
     * @return file_name
     */
    public function upload_avatar(AvatarUploaderRequest $request){

        if(!in_array(request()->file->getClientOriginalExtension(),['jpg','jpeg','png'])){
            return responseErrorData(['responseJSON'=>__('Extension Error')],422);
        }
        $name = time().'.'.request()->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads/'.$request->upload_dir), $name);
        return responseSuccessData(['file'=>$name]);
    }
    public function upload_image(ImageUploaderRequest $request){
        if(!in_array(request()->file->getClientOriginalExtension(),['jpg','jpeg','png'])){
            return responseErrorData(['responseJSON'=>__('Extension Error')],422);
        }
        $name = time().'.'.request()->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads/'.$request->upload_dir), $name);
        return responseSuccessData(['file'=>$name]);
    }
    public function upload_file(FileUploaderRequest $request){
        if(!in_array(request()->file->getClientOriginalExtension(),['xls','xlsx','doc','docx','pdf'])){
            return responseErrorData(['responseJSON'=>__('Extension Error')],422);
        }
        $name = time().'.'.request()->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads/'.$request->upload_dir), $name);
        return responseSuccessData(['file'=>$name]);
    }
}
