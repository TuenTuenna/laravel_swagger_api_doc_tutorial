<?php

namespace App\OA\Model;


/**
 *
 * @OA\Schema(
 *     title="Todo model",
 *     description="할 일 모델 입니다.",
 *     @OA\Xml(
 *         name="Todo"
 *     )
 * )
 */

class Todo
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title of a blog",
     *      example="A nice blog"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="content",
     *      description="할 일 내용 입니다.",
     *      example="할 일 내용 예시"
     * )
     *
     * @var string
     */
    public $content;


    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    //
}
