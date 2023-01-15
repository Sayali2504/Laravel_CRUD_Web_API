<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller {

    public function apiItem($data, $message = false) {
        return response()->json(
                        [
                            "statusCode" => 200,
                            "message" => $message ? $message : 'Data retrieval successfully',
                            "data" => $data
                        ], 200);
    }

    /**
     * Api Validate error response
     */
    public function apiErrorValidateInfo($message = false) {

        return response()->json(['statusCode' => 422,
                    'name' => 'Error',
                    'message' => $message ? $message : 'Error validation'
                        ], 422);
    }

    public function apiErrorUnauthorized($message = false) {

        return response()->json(['statusCode' => 401,
                    'name' => 'Error',
                    'message' => $message ? $message : 'Unauthorized'
                        ], 401);
    }

    public function apiValidate($errors, $message = false) {

        return response()->json(
                        [
                            "statusCode" => 422,
                            "name" => 'ValidateErrorException',
                            "message" => $message ? $message : 'Error Validation',
                            "data" => $errors
                        ], 422);
    }

    /**
     * Api Collection response
     */
    public function apiCollection($data, $total = 0, $message = false) {

        return response()->json([
                    'statusCode' => 200,
                    'message' => $message ? $message : 'Data retrieval successfully',
                    'data' => $data,
                    'total' => $total,
                        ], 200);
    }

    public function apiCreated($data, $message = false) {
        return response()->json(
                        [
                            "statusCode" => 201,
                            "message" => $message ? $message : 'Created Successfully',
                            "data" => $data
                        ], 201);
    }

    public function apiUpdated($data, $message = false) {
        return response()->json(
                        [
                            "statusCode" => 202,
                            "message" => $message ? $message : 'Updated Successfully',
                            "data" => $data
                        ], 202);
    }

    public function apiDeleted($data, $message = false) {
        return response()->json(
                        [
                            "statusCode" => 202,
                            "message" => $message ? $message : 'Record Deleted Successfully',
                            "data" => $data
                        ], 202);
    }

    public function apiSuccess($data, $message = false) {
        return response()->json(
                        [
                            "statusCode" => 200,
                            "message" => $message ? $message : 'Success',
                            "data" => $data
                        ], 200);
    }

    public function apiNotfound($message = false) {
        return response()->json(
                        [
                            "statusCode" => 404,
                            "message" => $message ? $message : 'Record Not Found'
                        ], 404);
    }

}
