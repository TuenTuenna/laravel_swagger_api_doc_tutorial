<?php

namespace App\OA\Resource;

/**
 * @OA\Schema(
 *     title="TodoResource",
 *     description="Todo resource",
 *     @OA\Xml(
 *         name="TodoResource"
 *     )
 * )
 */

class TodoResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\OA\Model\Todo[]
     */
    private $data;
}
