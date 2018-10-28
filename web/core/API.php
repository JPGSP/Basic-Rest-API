<?php
/**
 * Created by PhpStorm.
 * User: crowd2fund
 * Date: 28/10/2018
 * Time: 19:52
 */

class API
{
    public function run() {
        header('Content-Type: application/JSON');

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                echo 'GET';
                break;
            case 'POST':
                echo 'POST';
                break;
            case 'PUT':
                echo 'PUT';
                break;
            case 'DELETE':
                echo 'DELETE';
                break;
            default:
                echo 'NOT MORE METHODS SUPPORTED';
                break;
        }
    }

    /**
     * @param int    $code
     * @param string $status
     * @param string $message
     */
    public function response($code = 200, $status = '', $message = '') {
        $http_response_header($code);

        if(!empty($status) && !empty($message)) {
            $response = array("status" => $status, $message=>$message);
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
