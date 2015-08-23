<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    public function index() {
        return $this->model->all();
    }

    public function show($id) {
        return $this->model->findById($id);
    }
}