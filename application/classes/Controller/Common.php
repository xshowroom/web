<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @author liyashuai
 */
class Controller_Common extends Controller
{

    public function before()
    {
    }

    public function action_userInfo()
    {
        $user = $_SESSION['opUser'];
        $status = empty($user) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg    = empty($user) ? 'guest' : 'already logged in';
        
        if (empty($user)) {
            $data = array();
        } else {
            $data = array(
                'userId' => $user['id'],
                'email' => $user['email'],
                'roleType' => $user['role_type'],
                'lastLoginTime' => $user['last_login_time'],
            );
        }

        echo json_encode(array(
            'status' => $status,
            'msg'      => $msg,
            'data' => $data,
        ));
    }

}
