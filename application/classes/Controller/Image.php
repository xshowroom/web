<?php defined('SYSPATH') || die('No direct script access.');

class Controller_Image extends Controller
{

	public $verifyCodeService;

	public function before()
	{
		$this->verifyCodeService = new Business_VerifyCode();
	}

	public function action_index()
	{
		$codeVal = $this->verifyCodeService->generateCodeValue();
		ob_clean();
    	Header("Content-type: image/png");
    	$this->verifyCodeService->generateCodeImage($codeVal);
    	exit(0);
	}

}