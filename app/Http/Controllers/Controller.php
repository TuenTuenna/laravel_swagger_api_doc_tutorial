<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      version="3.3.6",
 *      title="정대리 프로젝트",
 *      description="api 문서 만들기 튜토리얼",
 *      @OA\Contact(
 *          email="dev_jeongdaeri@email.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

/**
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_TEST_HOST,
 *      description="테스트 서버"
 *  )
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_REAL_HOST,
 *      description="실 서버"
 *  )
 *
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
