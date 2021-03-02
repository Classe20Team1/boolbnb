<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Http\Resources\ServiceResource;
class ServiceController extends Controller
{
    public function index()
    {
        return ServiceResource::collection(Service::all());
    }
}
