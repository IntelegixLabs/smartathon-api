<?php

namespace App\Helpers;

class ResponseHelper
{
    /**
     * Creates a success payload and returns.
     *
     * @param  string  $title
     * @param  string  $detail
     * @param  int  $status  An HTTP status code
     * @return json
     */
    public function success(
        $title = 'Success',
        $message = 'The request completed successfully',
        $status = 200
    ) {
        $payload = [
            'title' => $title,
            'message' => $message,
        ];

        return response($payload, $status)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Creates an error payload and returns.
     *
     * @param  string  $title
     * @param  string  $detail
     * @param  int  $status  An HTTP status code
     * @return json
     */
    public function error(
        $message = 'Internal Server Error',
        $exception = 'Internal server error. Please try again later.',
        $status = 500
    ) {
        $errors = [
            'message' => $message,
            'exception' => $exception,
        ];

        return response($errors, $status)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Creates a validation error payload and returns.
     *
     * @param  string  $key
     * @param  string  $error
     * @return json
     */
    public function validationError($key, $error)
    {
        $errors = [
            'errors' => [
                ('data.' . $key) => [$error],
            ],
            'message' => 'Invalid data.',
        ];

        return response($errors, 422)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Returns 'data' payload with proper headers.
     *
     * @param  array  $data  The PHP array which needs to be returned as JSON
     * @return json
     */
    public function payload($data = [], $status = 200)
    {
        return response(['data' => $data], $status)->withHeaders([
            'Content-Type' => 'application/json',
        ]);
    }
}
