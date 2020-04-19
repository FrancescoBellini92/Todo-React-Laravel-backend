<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {   
        $where_conditions = [['user_id', $request->user_id]];
        if ($request->name) {
            array_push($where_conditions,['name', 'like', '%'.$request->name.'%']);
        }
        $result = Todolist::where($where_conditions)->paginate(999);
        return $this->getResult($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request ->input('user_id');
        $name = $request ->input('name');
        $todolist = new Todolist();
        $todolist->name = $name;
        $todolist->user_id = $user_id;
        $success = $todolist->save();

        return $this->getResult($todolist->toArray(), $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        return $this->getResult($todolist->toArray());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $todolist->name = $request->name;
        $success = $todolist->save();
        return $this->getResult($todolist->toArray(), $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $success = $todolist->delete();
        return $this->getResult($todolist->toArray(), $success);
    }

    private function getResult($data, $success = true) {
        return response()->json([
            'result' => $data,
            'success' => $success
        ]);
    }
}
