<?php

namespace App\Libs;

use Illuminate\Support\Carbon;

class Response
{
    public static function json($data = null, $message, $status = 200, $trace = null)
    {
        return response()->json([
            'status_code' => $status,
            'is_error' => $status >= 400,
            'message' => $message,
            'data' => $data,
            // "timestamp" => Carbon::now(),
            "traces" => $trace
        ], $status);
    }
}
