<?php

namespace App\OA\Request;


/**
 * @OA\Schema(
 *      title="Todo request",
 *      description="Todo request body data",
 *      type="object",
 *      required={"title", "content"}
 * )
 */

class TodoRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of the new todo",
     *      example="A nice todo"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="content",
     *      description="Content of the new todo",
     *      example="This is new todo's description"
     * )
     *
     * @var string
     */
    public $content;
}
