<?php
declare(strict_types=1);

namespace App\Core\Controller;

final readonly class CURL
{
    public static function call(
        string $method, 
        string $path, 
        array|null $data = null
    ){
        
        $allowed_methods = ['GET', 'POST', 'PUT', 'DELETE'];
        if (!in_array($method, $allowed_methods)) {
            echo HTTPError::renderErrorView(405);
        }

        if (!session()->has('jwt_token')) {
            echo HTTPError::renderErrorView(401);
        }

        $token = session()->get('jwt_token');
        $full_url =getenv('api_URL') . $path;
        $ch = curl_init($full_url);

        $headers = [
            'Authorization: Bearer ' . $token,
            'Accept: application/json',
        ];

        if ($method === 'POST' || $method === 'PUT') {
            $postData = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Content-Length: ' . strlen($postData);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Set method
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method === 'PUT' || $method === 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        $response = curl_exec($ch);
        $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $return_data = json_decode($response, true);

        $http_success_codes = [200, 201, 204];
        if (!in_array($http_status_code, $http_success_codes)) {
            log_message('error', $path . ' API error. Status: ' . $http_status_code . ', response: ' . $response);
            echo HTTPError::renderErrorView($http_status_code);
        }

        if (json_last_error() !== JSON_ERROR_NONE || !isset($return_data['data'])) {
            log_message('error', 'JSON decode error: ' . json_last_error_msg());
            echo HTTPError::renderErrorView(status_code: 500);
        }
        return [
            'data' => $return_data,
            'kode' => $http_status_code
        ];    
    }
}