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
        $opUser = $_SESSION['opUser'];
        $status = empty($opUser) ? STATUS_ERROR : STATUS_SUCCESS;
        $msg    = empty($opUser) ? 'guest' : 'already logged in';
        
        if (empty($opUser)) {
            $data = array();
        } else {
            $data = array(
                'userId' => $opUser['id'],
                'email' => $opUser['email'],
                'displayName' => $opUser['display_name'],
                'roleType' => $opUser['role_type'],
                'lastLoginTime' => $opUser['last_login_time'],
            );
        }

        echo json_encode(array(
            'status'    => $status,
            'msg'       => $msg,
            'data'      => $data,
        ));
    }

}
