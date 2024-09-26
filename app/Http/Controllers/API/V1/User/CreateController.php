<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $statusCode = 500;
        $responseBody = [
            'success' => false,
            'result' => 'Undefined error'
        ];

        try {
            $payload = $request->all();

            $user = User::create([
                'full_name' => $payload['full_name'],
                'role' => $payload['role'],
                'efficiency' => $payload['efficiency']
            ]);

            $statusCode = 200;
            $responseBody = [
                'success' => true,
                'result' => [
                    'id' => $user->id
                ]
            ];
        } catch (Exception $e) {
            $responseBody['result'] = $e->getMessage();
            Log::info('App::User::CreateController: ' . $e->getMessage());
        } finally {
            return response()->json($responseBody, $statusCode);
        }
    }
}
