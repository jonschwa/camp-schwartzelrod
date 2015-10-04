<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

abstract class ApiController extends Controller
{
    public function index() {
        $allRecords = $this->repo->all();
        return $this->apiResponse($allRecords, 'application/json');
    }

    public function show($id) {
       $record = $this->repo->findById($id);
        return $this->apiResponse($record, 'application/json');
    }

    public function apiResponse($data, $contentType) {
        return (new Response($data, 200))->header('Content-Type', $contentType);
    }


}
