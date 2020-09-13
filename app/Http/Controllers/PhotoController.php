<?php

namespace App\Http\Controllers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class PhotoController extends Controller
{
    public function getPhoto(Request $request){

      if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['Please login or register!'], 404);
      }

      $dataFormat = $request->get('format');
      $dataPaginate = $request->get('paginate');

      if(!is_numeric($dataPaginate)){
        $errorMessage = "Bad pagination format!";
        return response()->json(compact('errorMessage'));

      } else{

    $photos = DB::table('photos')->orderBy('name')->paginate($dataPaginate);

      foreach ($photos as $photo){
        $imageInfo [] = [
          'name'  => $photo->name,
          'describtion' => $photo->describtion,
          'link' => $photo->link,
        ];
      }

     $data = [
       'data' => $imageInfo,
      ];

      if($dataFormat == "json"){
        return response()->json(compact('photos'));
      }
      elseif($dataFormat == "xml"){
        return response()->xml($data);
      }
      else {
        $errorMessage = "Bad data format!";
        return response()->json(compact('errorMessage'));
      }
}
    }
}
