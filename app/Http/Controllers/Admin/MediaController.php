<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use Storage;
use App\Admin;
use App\Helpers\MediaHelper;
class MediaController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMedia($id)
    {
        try{
            // $item = \Spatie\MediaLibrary\Models\Media::where('id', $id)->first();
            if($id){
                MediaHelper::deleteImg($id);
                // @unlink($item->getPath());
                // $item->delete();
                return ['success' => true];
            }
            return ['success' => false];
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
