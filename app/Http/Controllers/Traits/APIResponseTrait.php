<?php

namespace App\Http\Controllers\Traits;

trait ApiResponseTrait {

    // Default Status for API Response
    protected $status = 200;

    // Additional Response Data
    protected $responseData = [];

    // Response Message
    protected $responseMessage;

    // Additional Headers
    protected $headers = [];

    /**
     * Set the Status Code for Response 
     * 
     * @param integer Status Code
     * @return $this
     */
    protected function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * Set the Response Message
     * 
     * @param $message String
     * @return $this
     */ 
    protected function setMessage($message) {
        $this->responseMessage = $message;
        return $this;
    }

    /**
     * Set the Response Data
     * 
     * @param $data Array
     * @return $this
     */ 
    protected function setData($data) {
        $this->responseData = $data;
        return $this;
    }

    /**
     * Response Success
     * 
     * @param $data Array 
     */ 
    protected function respondSuccess($message = null) {
        if($message) {
            $this->setMessage($message);
        }
        $this->setStatus(200);
        return $this->sendResponse();
    }

    /**
     * Response Success Created
     * 
     * @param $data Array 
     */ 
    protected function respondCreated($data = null, $message = null) {
        $this->responseMessage = $message === null ? __('messages.flash.success_created_generic') : $message;
        $this->setStatus(201);
        if($data) {
            $this->setData($data);
        }
        return $this->sendResponse();
    }

    /**
     * Response Unauthorized 
     * 
     * @param $message String
     */ 
    protected function respondUnauthorized($message = null) {
        $this->responseMessage = $message === null ? __('messages.error_unauthorized') : $message;
        $this->setStatus(401);
        return $this->sendResponse();
    }

    /**
     * Response Forbidden 
     * 
     * @param $message String
     */ 
    protected function respondForbidden($message = null) {
        $this->responseMessage = $message === null ? __('messages.error_forbidden') : $message;
        $this->setStatus(403);
        return $this->sendResponse();
    }

    /**
     * Response Not Found 
     * 
     * @param $message String
     */ 
    protected function respondNotFound($message = null) {
        $this->responseMessage = $message === null ? __('messages.error_not_found') : $message;
        $this->setStatus(404);
        return $this->sendResponse();
    }

    /**
     * Response Unprocessable Entity 
     * 
     * @param $message String
     */ 
    protected function respondUnprocessable($message = null) {
        $this->responseMessage = $message === null ? __('messages.error_unprocessable') : $message;
        $this->setStatus(422);
        return $this->sendResponse();
    }

    /**
     * Response with General Error
     * 
     * @param $message String
     */ 
    protected function respondWithError($message = null, $status = 500) {
        $this->responseMessage = $message === null ? __('messages.error_generic') : $message;
        $this->setStatus($status);
        return $this->sendResponse();
    }

    /**
     * Respond
     * 
     * @return Illuminate\Http\Response 
     */ 
    protected function sendResponse() {
        $content = [];
        $content['status'] = $this->status;
        // Check if theres Response Data
        if($this->responseData) {
            $content['data'] = $this->responseData;
        }
        // Check if theres Response Message
        if($this->responseMessage) {
            $content['message'] = $this->responseMessage;
        }

        // Return Json Response
        return response()->json($content, $this->status);
    }
}
