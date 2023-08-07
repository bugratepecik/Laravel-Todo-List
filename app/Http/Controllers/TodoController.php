<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        return view('pages.todos', ['todos' => Todo::all()->sortBy('id')]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    { 
        $todo = new Todo;
        $todo->task = $request->input('task');

        $todo->dueDate = $request->input('dueDate');
        $todo->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id)
    {   
        $todo = Todo::find($id);
        if ($request->has('task')) {
            $todo->task = $request->input('task');
        }else {
            $todo->status = $request->input('status');
        }
        if($request->has('dueDate')){
            $todo->dueDate = $request->input('dueDate');
        }
        
        $todo->save();        
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::find($id)->delete();
        return back();
    }
}
