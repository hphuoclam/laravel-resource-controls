<?php
/**
 * Created by PhpStorm.
 * User: reishou
 * Date: 10/18/17
 * Time: 9:21 PM
 */

namespace Infrastructure\Traits;

use Infrastructure\Helpers\HashHelper;

trait ResponseTrait
{
    protected function success($data)
    {
        if (!is_string($data)) {
            $data = HashHelper::hashResponse(json_decode(json_encode($data), true));
        }

        return response()->json(
            [
                'status' => true,
                'data'   => $data,
                'error'  => [
                    'code'    => 0,
                    'message' => [],
                ],
            ]
        );
    }

    protected function error($message, $status = 400)
    {
        $decode = is_string($message) ? json_decode($message) : '';
        if ($decode) {
            $message = $decode;
        }

        return response()->json(
            [
                'status' => false,
                'data'   => null,
                'error'  => [
                    'code'    => $status,
                    'message' => is_array($message) ? $message : [$message],
                ],
            ],
            $status
        );
    }

    protected function notFound()
    {
        return $this->error('RESOURCE_NOT_FOUND', 404);
    }

    protected function notAuthorize()
    {
        return $this->error('NOT_AUTHORIZE_FOR_THIS_URI', 401);
    }
}
