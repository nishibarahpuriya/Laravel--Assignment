<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class CommonHelper extends Controller
{


    public function handleException($exception){


        if(\Request::ajax()){
            if($exception instanceof HttpExceptionInterface) {
                $response = [
                    'status' => 'failed',
                    'message' => $exception->getMessage()
                ];
                return response()->json($response);
            }else{
                if (env('APP_ENV') === 'production'){
                    $response = [
                        'status' => 'failed',
                        'message' => 'Something went wrong.'
                    ];
                    return response()->json($response);
                }
                else{
                    $response = [
                        'status' => 'failed',
                        'message' => $exception->getMessage()
                    ];
                    return response()->json($response);
                }
            }
        }
        else{
            if($exception instanceof HttpExceptionInterface) {
                abort($exception->getStatusCode());
            }else{
                if (env('APP_ENV') === 'production')
                    abort(500);
                else{
                    throw $exception;
                }
                // return view('errors.custom',['exception'=>$exception]);
            }
        }
    }


    public function failedResponse($message,$data=[]){
        $response=[
            'status' => 'faild',
            'message'=> $message,
            'data' => $data
        ];
        return $response;
    }
    public function successResponse($message,$data=[]){
        $response=[
            'status' => 'success',
            'message'=> $message,
            'data' => $data
        ];
        return $response;
    }

}
