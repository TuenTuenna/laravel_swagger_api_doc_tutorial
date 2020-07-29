<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Todo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{

    /**
     * @OA\Get(
     *      path="/todos",
     *      operationId="getTodosList",
     *      tags={"할 일 관련"},
     *      summary="모든 할 일 목록 가져오기",
     *      description="모든 할 일 목록을 가져온다.",
     *      @OA\Response(
     *          response=200,
     *          description="응답 성공"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 데이터 목록 가져오기
    public function index()
    {
        //
        $allTodos = Todo::all();
//        $allTodos = Todo::select('id', 'title', 'content')->get();

        $filteredTodos = TodoResource::collection($allTodos);

        return $filteredTodos;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 새 데이터를 만드는 화면을 반환
//    public function create()
//    {
//        //
//    }



    /**
     * @OA\Post(
     *      path="/todos",
     *      operationId="storeTodo",
     *      tags={"할 일 관련"},
     *      summary="할 일 추가하기",
     *      description="할 일을 추가하고 추가된 할 일을 반환한다.",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TodoRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="응답 성공 새 할 일 만들어짐",
     *          @OA\JsonContent(ref="#/components/schemas/Todo")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 새 데이터를 추가
    public function store(TodoRequest $request)
    {
        //
        $userInputData = $request->all();

        $newTodo = Todo::create($userInputData);

        return new TodoResource($newTodo);

    }


    /**
     * @OA\Get(
     *      path="/todos/{id}",
     *      operationId="getTodoById",
     *      tags={"할 일 관련"},
     *      summary="특정 할 일 가져오기",
     *      description="특정 할 일 아이템을 가져온다.",
     *     @OA\Parameter(
     *          name="id",
     *          description="Todo_id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="응답 성공",
     *          @OA\JsonContent(ref="#/components/schemas/Todo")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 특정 데이터를 가져오기
//    public function show($id)
        public function show(Todo $todo)
    {
        // select * from todos where id = 2
//        $fetchedTodo = Todo::find($id);

        $filteredTodo = new TodoResource($todo);

        return $filteredTodo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 기존 데이터를 수정하는 화면을 반환
//    public function edit($id)
//    {
//        //
//    }


    /**
     * @OA\Put(
     *      path="/todos/{id}",
     *      operationId="updateTodo",
     *      tags={"할 일 관련"},
     *      summary="기존 할 일 수정하기",
     *      description="기존 할 일을 수정하고 수정된 할 일을 반환한다.",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Todo_id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TodoRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="응답 성공",
     *          @OA\JsonContent(ref="#/components/schemas/Todo")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 기존 데이터를 수정해서 -> 수정된 데이터를 반환
//    public function update(Request $request, $id)
        public function update(TodoRequest $request, Todo $todo)
    {
        //
//        $fetchedTodo = Todo::find($id);
        $todo->update($request->all());

        $updatedTodo = new TodoResource($todo);

        return $updatedTodo;
    }


    /**
     * @OA\Delete(
     *      path="/todos/{id}",
     *      operationId="deleteTodo",
     *      tags={"할 일 관련"},
     *      summary="기존 할 일 삭제하기",
     *      description="기존 할 일을 삭제한다.",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Todo_id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=204,
     *          description="NO CONTENT",
     *          @OA\JsonContent(ref="#/components/schemas/Todo")
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 기존 데이터를 삭제한다.
//    public function destroy($id)
    public function destroy(Todo $todo)
    {
        //
//        $fetchedTodo = Todo::find($id);
        $todo->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
