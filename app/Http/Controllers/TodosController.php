<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req) 
    {
        $list = $req ->list_id ? : 1;
        $result = Todo::where('list_id', $list)
        ->select(['id', 'todo','list_id','completed'])
        ->orderBy('id', 'DESC')
        ->paginate(20);

        return $this->getResult($result->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['list_id', 'todo', 'completed']);
        $data['list_id'] = $data['list_id'] ? : 1;
        $data['user_id'] = 1;
        $todo = Todo::create($data);
        return $this->getResult($todo->toArray());
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $this->getResult($todo->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->todo = $request->todo;
        $todo->completed = (int) $request->completed;
        $success = $todo->save();
        return $this->getResult($todo->toArray(), $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $success = $todo->delete();
        return $this->getResult($todo->toArray(), $success);
    }

    private function getResult($data, $success = true) {
        return response()->json([
            'result' => $data,
            'success' => $success
        ]);
    }
}
