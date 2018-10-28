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
                echo 'NANAI';
                break;
        }
    }
}