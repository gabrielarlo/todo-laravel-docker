<?php

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

function res($data = null, string $msg = 'Success', int $code = 200): JsonResponse
{
    return response()->json([
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
    ]);
}

function vRes(Validator $validator): JsonResponse
{
    return res($validator->errors(), 'Validation Failed', 412);
}

function eRes(string $msg = '', int $code = 400, $data = null): JsonResponse
{
    return res($data, $msg, $code);
}
