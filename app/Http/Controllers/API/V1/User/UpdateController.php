<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id): JsonResponse
    {
        $statusCode = 500;
        $responseBody = [
            'success' => false,
            'result' => 'Undefined error'
        ];

        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'result' => 'User not found'
                ], 404);
            }

            $payload = $request->validate([
                'full_name' => 'required|string',
                'role' => 'required|string',
                'efficiency' => 'required|numeric',
            ]);

            $user->update($payload);

            $statusCode = 200;
            $responseBody = [
                'success' => true,
                'result' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'role' => $user->role,
                    'efficiency' => $user->efficiency
                ]
            ];
        } catch (ValidationException $e) {
            $responseBody['result'] = $e->validator->errors()->first();
            $statusCode = 422;
        } catch (Exception $e) {
            $responseBody['result'] = $e->getMessage();
            Log::info('App::User::UpdateController: ' . $e->getMessage());
        } finally {
            return response()->json($responseBody, $statusCode);
        }
    }
}
