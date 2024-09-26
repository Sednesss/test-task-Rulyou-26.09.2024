<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShowController extends Controller
{
    public function __invoke(Request $request, $id = null): JsonResponse
    {
        try {
            if ($id) {
                $user = User::find($id);

                if ($user) {
                    return response()->json([
                        'success' => true,
                        'result' => [
                            'users' => [
                                $user
                            ]
                        ]
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'result' => 'User not found'
                ], 404);
            } else {
                $query = User::query();

                $role = $request->query('role');
                $fullName = $request->query('full_name');
                $efficiency = $request->query('efficiency');

                if ($role) {
                    $query->where('role', $role);
                }

                if ($fullName) {
                    $query->where('full_name', 'LIKE', '%' . $fullName . '%');
                }

                if ($efficiency) {
                    $query->where('efficiency', $efficiency);
                }

                $users = $query->get();

                return response()->json([
                    'success' => true,
                    'result' => [
                        'users' => $users
                    ]
                ]);
            }
        } catch (Exception $e) {
            $responseBody['result'] = $e->getMessage();
            Log::info('App::User::ShowController: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'result' => $e->getMessage()
            ], 500);
        }
    }
}
