<?php

if (! function_exists('make_response')) {
    /**
     * JSON ответ для фронта
     *
     * @param int         $status  Статус ответа
     * @param null|string $message Сообщение о результате обращения
     * @param mixed       $data    Данные полученные в результате обращения
     * @param array|null  $errors  Список ошибок, возникших во время обращения
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function make_response(int $status, ?string $message = null, $data = null, array $errors = null)
    {
        $responseData = [];

        if (! empty($message)) {
            $responseData['message'] = $message;
        }

        /**
         * Добавляем блок данных только при их наличии
         */
        if (! empty($data)) {
            $responseData['data'] = $data;
        }

        /**
         * Добавляем блок ошибок только при их наличии
         */
        if (! empty($errors)) {
            $responseData['errors'] = $errors;
        }

        return response()->json(
            $responseData,
            $status,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}

if (! function_exists('make_lite_response')) {
    /**
     * JSON ответ для фронта
     *
     * @param int         $status  Статус ответа
     * @param mixed       $data    Данные полученные в результате обращения
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function make_lite_response(int $status, $data = null, array $errors = null): \Illuminate\Http\JsonResponse
    {
        $responseData = [];

        /**
         * Добавляем блок данных только при их наличии
         */
        if (! empty($data)) {
            $responseData['data'] = $data;
        }

        return response()->json(
            $responseData,
            $status,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }
}
