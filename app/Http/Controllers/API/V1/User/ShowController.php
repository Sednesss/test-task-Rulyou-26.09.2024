<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request): string
    {
        dd($request->all());

        return json_encode(123);
    }
}
