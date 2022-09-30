<?php

namespace App\Libs;

use Illuminate\Http\Response as HttpResponse;
// use Illuminate\Support\Carbon;

class Response
{
    private array $headers = [];

    public function json(array|object|null $data = null, array|string|object $message, int $status = HttpResponse::HTTP_OK, $excp = null, $file = null, $line = null, $trace = null)
    {
        $response = [
            'status_code' => $status,
            'status_text' => HttpResponse::$statusTexts[$status] ?? 'Unknown',
            'is_error' => $status >= HttpResponse::HTTP_BAD_REQUEST,
            'message' => $message,
            'data' => $data,
            // 'timestamp' => Carbon::now()->toDateTimeString(),
        ];
        if (config('app.debug')) {
            $debug = [];
            $debug['exception'] = $excp;
            $debug['file'] = $file;
            $debug['line'] = $line;
            $debug['trace'] = $trace;
            $response['debug'] = $debug;
        }

        return response()->json($response, $status, $this->getHeaders());
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    private function getHeaders()
    {
        return $this->headers;
    }
}
