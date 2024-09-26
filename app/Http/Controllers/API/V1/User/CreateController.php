<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request): string
    {
        $payload = $request->all();
        
        $id = 1;
        if (true) {

            return json_encode([
                'success' => true,
                'result' => [
                    'id' => $id
                ]
            ]);
        }
    }
}
