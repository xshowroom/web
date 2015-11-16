<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_Upload extends Controller_Base
{

    const MSG_KEY_1 = 'upload_failed';
    const MSG_KEY_2 = 'upload_success';
    
    public $uploadService;

    public function before()
    {
        $this->uploadService = new Business_Upload();
    }

    public function action_image()
    {
        $res = $this->uploadService->image();
        
        $status = empty($res) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg    = empty($res) ? __(self::MSG_KEY_1) : __(self::MSG_KEY_2);
        
        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
            'data'   => $res,
        ));
    }

} // End Welcome
