<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

abstract class ApiController extends Controller
{
    public function index() {
        $allRecords = $this->repo->all();
        return $this->apiResponse('ok', $allRecords);
    }

    public function show($id) {
       $record = $this->repo->findById($id);
        return $this->apiResponse('ok', $record);
    }

    public function apiResponse($message, $data, $contentType = 'application/json') {
        return (new Response(['message' => $message, 'data' => $data], 200))->header('Content-Type', $contentType);
    }

    public function apiErrorResponse($message, $data, $statusCode = 500, $contentType = 'application/json') {
        return (new Response(['message' => $message, 'errors' => $data], $statusCode))->header('Content-Type', $contentType);
    }


}
