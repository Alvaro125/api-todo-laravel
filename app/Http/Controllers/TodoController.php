<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getAll() {

        $todos = $this->getTodos();

        return response()->json($todos);

    }

    public function getById($id) {

        $todo = null;

        foreach($this->getTodos() as $_todo) {
            if ($_todo['id'] == $id)
                $todo = $_todo;
        }

        return $todo ? response()->json($todo) : abort(404);

    }

    public function getTodobyStatus($status) {

        $todos = [];

        foreach($this->getTodos() as $_todo) {
            if ($_todo['completed'] == $status)
                $todos[] = $_todo;
        }

        return response()->json($todos);

    }

    public function store(Request $request) {

        $validate = $request->validate([
            'id' => 'numeric',
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'completed' => 'required'
        ]);
        $article = Todo::create([
            'title' => 'Cozinhar', 'description' => 'description', 'completed' => true
        ]);
        return response()->json($request->all());

    }

    protected function getTodos() {
        return Todo::all();

    }
}
