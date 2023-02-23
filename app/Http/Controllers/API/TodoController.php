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
        $t = Todo::orderBy('done')->get();

        return res($t);
    }

    public function details(Todo $todo): JsonResponse
    {
        return res($todo);
    }

    public function add(Request $request): JsonResponse
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'nullable|max:256',
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
            'description' => 'nullable|max:256',
        ]);
        if ($v->fails()) {
            return vRes($v);
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
