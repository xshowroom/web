<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Api_User extends Controller_BaseReqLogin
{
    const OLD_PASSWORD_ERROR = 'OLD_PASSWORD_ERROR';
    const CHANGE_PASSWORD_SUCCESS = 'CHANGE_PASSWORD_SUCCESS';

    public $userService;

    public function before()
    {
        parent::before();
        $this->userService = new Business_User();
    }

    public function action_changePassword()
    {
        $userId  = $this->opUser['id'];
        $old = trim(Request::current()->getParam('old'));
        $new = trim(Request::current()->getParam('new'));

        if ($this->userService->checkPassword($userId, md5($old)))
        {
            $this->userService->changePassword($userId, md5($new));

            $status = STATUS_SUCCESS;
            $msg    = self::CHANGE_PASSWORD_SUCCESS;
        }
        else
        {
            $status = STATUS_ERROR;
            $msg = self::OLD_PASSWORD_ERROR;
        }

        echo json_encode(array(
            'status' => $status,
            'msg'    => __($msg),
            'data'   => '',
        ));
    }

    public function action_updateUserInfo()
    {
        $userId  = $this->opUser['id'];
        $roleType= $this->opUser['role_type'];

        $res = $this->userService->updateUser($userId, $roleType);

        echo json_encode(array(
            'status' => STATUS_SUCCESS,
            'msg'    => '',
            'data'   => $res,
        ));
    }
}
