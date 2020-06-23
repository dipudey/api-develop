<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{
    public function apiExceptions($request,$e){
        if ($this->isModel($e)) {
          return $this->ModelResponse($e);
        }

        if ($this->isHttp($e)) {
          return $this->HttpResponse($e);
        }
    }

    private function isModel($e){
      return $e instanceof ModelNotFoundException;
    }

    private function isHttp($e){
      return $e instanceof NotFoundHttpException;
    }

    private function ModelResponse($e){
      return response()->json([
        'error' => "Model Not Foud"
      ],Response::HTTP_NOT_FOUND);
    }

    private function HttpResponse($e){
      return response()->json([
        'error' => "Route Not Found"
      ],Response::HTTP_NOT_FOUND);
    }
}
