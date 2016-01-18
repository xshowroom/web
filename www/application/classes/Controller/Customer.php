<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Customer extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('customer_support');
     	$opUser = $_SESSION['opUser'];

        if(!empty($opUser)) {
            $view->set('user', $opUser);
            $view->set('userAttr', $opUser['userAttr']);
        }


        $faqList = array(
            array('question' => 'Do you charge subscription fee?', 'answer' => '- No. Xshowroom is free for buyers and only charge the brand when transaction is made.'),
            array('question' => 'Do you shoot my collections?', 'answer' => '- No. Brands can upload their own look-book and flat images when they are ready. Sketches can also be uploaded.'),
            array('question' => 'How do I get training to use the website?', 'answer' => '- Yes. We have user manual and customer support to help you with Xshowroom.'),
            array('question' => 'Can buyers pay their orders offline?', 'answer' => '- Yes. Buyers’ PO’s do not require a payment online. The brand can set-up it’s own payment and delivery conditions and negotiate with buyers directly.'),
            array('question' => 'How long does it take to set up my virtual showroom?', 'answer' => '- It takes between a few minutes to a couple of hours to set-up your brand profile and upload your collections. The upload is done through spreadsheets carefully verified by our teams instantly.'),
            array('question' => 'Can my agents and distributors use Xshowroom? ', 'answer' => ' - Yes. Xshowroom offers a type of account especially dedicated to agents. The brand can assign specific settings like geographical zone and particular price-lists for each agent account.'),
            array('question' => 'Do you have a physical showroom?', 'answer' => '- Yes, our sister company Project Crossover is a multi-brand showroom. Due to limited space we will select the suitable brands for our physical showroom.'),
        );

        $view->set('faqList', $faqList);

        $this->response->body($view);
    }
}
