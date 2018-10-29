<?php

require 'Database.php';

class API
{
    public function run() {
        //header('Content-Type: application/JSON');

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getPeople();
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

    public function getPeople() {
        $db = new Database();
        $resultado = $db->get('SELECT * FROM people');
        var_dump($resultado);
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
