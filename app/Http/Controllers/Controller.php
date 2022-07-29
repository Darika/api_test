<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="localhost:8000",
 *   basePath="/",
 *   @OA\Info(
 *     title="Blog ads API",
 *     version="1.0.0"
 *   ),
 *     @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('home');
    }
}
