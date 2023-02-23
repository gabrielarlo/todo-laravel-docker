<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function list(): JsonResponse
    {
        $list = Todo::orderBy('done')->orderBy('updated_at', 'DESC')->get();
        $incomplete = Todo::where('done', false)->count();
        $complete = Todo::where('done', true)->count();

        return res(compact('list', 'incomplete', 'complete'));
    }

    public function details(Todo $todo): JsonResponse
    {
        return res($todo);
    }

    public function add(Request $request): JsonResponse
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|max:256',
        ]);
        if ($v->fails()) {
            return vRes($v);
        }

        $t = Todo::create($request->all());

        return res($t);
    }

    public function update(Request $request, Todo $todo): JsonResponse
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required|max:256',
        ]);
        if ($v->fails()) {
            return vRes($v);
        }

        if ($todo->done) {
            return eRes('Item is already set to done');
        }

        $todo->update($request->all());

        return res($todo);
    }

    public function delete(Todo $todo): JsonResponse
    {
        $todo->delete();

        return res();
    }

    public function toggleStatus(Todo $todo): JsonResponse
    {
        $todo->done = ! $todo->done;
        $todo->save();

        return res($todo);
    }
}
