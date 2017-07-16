<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/admin
     *    - or -
     *        http://example.com/index.php/admin/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        //load helpers
        $this->load->helper(array('url', 'cookie', 'form'));

        $this->load->library("pagination");


    }

    public function _output($output)
    {
        $data = array(
            'base_url' => base_url(),
        );
        echo $this->load->view('templates/header', '', true)
            . $this->load->view('templates/navigation', '', true)
            . $this->load->view('templates/msg', '', true)
            . $output
            . $this->load->view('templates/footer', '', true);
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {
        //get the posted values
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        //set validations
        $this->form_validation->set_rules("email", "Email", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            //validation fails
            $this->load->view('admin/login');
        } else {
            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                //check if username and password is correct
                $this->load->model('User_model');
                $user_result = $this->User_model->get_user($email, $password);
                if ($user_result > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        'admin' => $email,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("admin/dashboard");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid email and password!</div>');
                    redirect('admin/index');
                }
            } else {
                redirect('admin/index');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/index');
    }

    function check_login()
    {
        if (!$this->session->userdata('admin')) {
            redirect('admin/index');
        }
    }

    function dashboard()
    {
        $this->check_login();
        $this->load->model('Marketplaces_model');
        $data['marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();

        $this->load->view('admin/dashboard', $data);
    }

    function new_reviewer()
    {
        $this->check_login();

        $marketplace = $this->input->post("marketplace");
        $user_id = $this->input->post("username");


        $this->load->model('Reviewers_model');

        if (strlen($user_id) == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username</div>');
            redirect('admin/dashboard');
        } elseif ($this->Reviewers_model->check_reviewer_by_amazon_id($user_id)) {


            redirect('admin/reviewer/' . $user_id);
        }


        // scrape customer reviews from amazon


        include_once('simple_html_dom.php');

        $url = 'https://www.' . $marketplace . '/gp/cdp/member-reviews/' . $user_id;
//        $url = 'https://www.amazon.fr/gp/profile/amzn1.account.AECDQFKX3VYRGUXL3EICU4Q4IDRA?ie=UTF8';
        $html = new simple_html_dom();
        $html->load_file($url);
        $page = $html->find('td[valign=top]', 1);
//        echo ($page);
//        return;
        $pagination = $page->find('table', 0)->find('td', 1)->find('a');


        $this->scraper($url, $user_id);

        foreach ($pagination as $num) {
            $num = $num->plaintext;
            $newUrl = $url . '?page=' . $num;
            $this->scraper($newUrl, $user_id);
        }


        $url = 'https://www.' . $marketplace . '/gp/pdp/profile/' . $user_id;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($curl);

        curl_close($curl);

        //scrape what we can
        $name = substr($html, (strpos($html, "public-name-text") + 18));
//        echo($name);

        $name = substr($name, 0, strpos($name, "</span>"));
        echo "user name: " . $name;

        $ranking = substr($html, (strpos($html, "<div aria-expanded")));
        $ranking = substr($ranking, (strpos($ranking, "#") + 1));
//        echo $ranking; Exit(0);
        $ranking = substr($ranking, 0, strpos($ranking, "</span>"));
        $ranking = str_replace(',', '', $ranking);
        $ranking = str_replace('.', '', $ranking);
        echo "</br>user ranking: " . $ranking;
//exit(0);
        $data = array(
            'amazon_user_id' => $user_id,
            'amazon_user_name' => $name,
            'ranking' => $ranking,
            'home_marketplace' => $marketplace
        );

        if (strlen($name)) {
            $this->Reviewers_model->insert_data($data);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">user not found, please try again</div>');
            redirect('admin/dashboard');
        }
    }

    function scraper($url, $user_id)
    {

        $html = new simple_html_dom();
        $html->load_file($url);
        $page = $html->find('td[valign=top]', 1);
        $reviews_table = $page->find('table', 1);
        if (!$reviews_table) {
            return true;
        }

        $main_trs = $reviews_table->find('tr[valign=top]');

        foreach ($main_trs as $tr) {

            $td = $tr->getElementByTagName('td[width=52%]');

            $title = $td->find('tr', 0)->plaintext;
            $price = $td->find('.price', 0);
            if ($price) {
                $price = $price->plaintext;
                echo $price;
                //$price = explode(':', $price);
                //print_r($price);
                //$price=$price[1];
                //$price = str_replace('$', '', $price);
            } else {
                $price = '0';
            }
            $tr1 = $tr->next_sibling();
            $star = $tr1->find('div span img', 0);
            if (!$star) {
                $star = $tr1->find('div span span', 0);

            }
            $star = $star->title;
            $star = $star[0];
            $comment = $tr1->find('div[class=reviewText]', 0)->plaintext;

            $data = [
                'reviewer_id' => $user_id,
                'title' => utf8_encode($title),
                'price' => $price,
                'star' => $star,
                'comment' => utf8_encode($comment)
            ];

            $this->load->model('Reviewers_model');
            $this->Reviewers_model->insert_customer_reviews($data);
        }
        return true;
    }

    function reviewer($amazon_reviewer_id)
    {
        $this->check_login();

        $this->load->model('Reviewers_model');
        $reviewer = $this->Reviewers_model->get_reviewer_by_amazon_id($amazon_reviewer_id);
        if (!count($reviewer)) {
            redirect('admin/dashboard/');
        }

        /*  foreach ($reviewer[0] as $key => $value) {
              if ($key != 'id') {
                  if ($key == 'prime_member') {
                      if ($value) $memeber = "yes";
                      elseif ($value == 0) $memeber = "no";
                      else $memeber = "-";
                      echo $key . " : " . $memeber . "</br>";
                  } else {
                      echo $key . " : " . $value . "</br>";
                  }
              }
          }
          */
        echo '<br>';
        echo 'user name : ' . $reviewer[0]->amazon_user_name;
        echo '<br>';
        echo 'user ranking : ' . $reviewer[0]->ranking;
        echo '<br>';
        echo "<a href='" . site_url('admin/edit_reviewer/' . $amazon_reviewer_id) . "'>edit</a>";
//        print_r($reviewer);
    }

    function edit_reviewer($amazon_reviewer_id)
    {
        $this->check_login();
        $this->load->model('Reviewers_model');
        $reviewer = $this->Reviewers_model->get_reviewer_by_amazon_id($amazon_reviewer_id);
        if (!count($reviewer)) {
            redirect('admin/dashboard/');
        }

        $data = array(
            'amazon_reviewer_id' => $amazon_reviewer_id,
            'amazon_user_name' => '',
            'ranking' => '',
            'profile_email_address' => '',
            'profile_website' => '',
            'home_marketplace' => '',
            'shipping_country' => '',
            'prime_member' => '',
            'average_stars' => '',
            'average_words' => ''
        );

        $this->load->model('Marketplaces_model');
        $data['marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('amazon_user_name', 'amazon_user_name', 'trim|required');
            $this->form_validation->set_rules('profile_email_address', 'email', 'trim|valid_email');
//            $this->form_validation->set_rules('ranking ', 'ranking ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                //save data
                $data = array(
                    'amazon_user_name' => $this->input->post('amazon_user_name'),
                    'ranking' => $this->input->post('ranking'),
                    'profile_email_address' => $this->input->post('profile_email_address'),
                    'profile_website' => $this->input->post('profile_website'),
                    'home_marketplace' => $this->input->post('home_marketplace'),
                    'shipping_country' => $this->input->post('shipping_country'),
                    'prime_member' => $this->input->post('prime_member'),
                    'average_stars' => $this->input->post('average_stars'),
                    'average_words' => $this->input->post('average_words'),
                    'payment' => $this->input->post('payment'),
                    'paypal_email' => $this->input->post('paypal_email'),
                    'bank_details' => $this->input->post('bank_details'),
                    'address' => $this->input->post('address'),
                );

                $this->Reviewers_model->update_data($amazon_reviewer_id, $data);
                redirect('admin/reviewer/' . $amazon_reviewer_id);
            } else {
                $data['home_marketplace'] = $this->input->post('home_marketplace');

                //form had errors
//                $data = array(
//                    'error' => ' ',
//                );
//                $this->load->view('admin/edit_reviewer', $data);
            }
            $data['amazon_user_id'] = $amazon_reviewer_id;
//            var_dump($data);
        } else {
            $reviewer = $this->Reviewers_model->get_reviewer_by_amazon_id($amazon_reviewer_id);
            $data = $reviewer[0];

            $data->marketplaces = $this->Marketplaces_model->get_all_marketplaces();
        }
// var_dump($data);

        $this->load->view('admin/edit_reviewer', $data);
    }

    function reviewers()
    {
        $this->check_login();
        $this->load->model('Reviewers_model');
        $data['reviewers'] = $this->Reviewers_model->getAllReviewers();
        $this->load->view('admin/reviewers', $data);

    }

    function reviewer_profile($amazon_reviewer_id)
    {
        $this->check_login();

        $this->load->model('Reviewers_model');
        $reviewer = $this->Reviewers_model->get_reviewer_by_amazon_id($amazon_reviewer_id);
        if (!count($reviewer)) {
            redirect('admin/dashboard/');
        }
        $data['reviewer'] = $reviewer[0];
        // $data['count']=$this->Reviewers_model->reviews_count($amazon_reviewer_id);
        $customer_reviewes = $this->Reviewers_model->get_customer_reviews($amazon_reviewer_id);
        $star_sum = 0;
        $word_sum = 0;
        foreach ($customer_reviewes->result() as $review) {

            $star_sum += intval($review->star);
            $words = explode(' ', $review->comment);
            $word_sum += count($words);
        }

        $star_count = $customer_reviewes->num_rows();
        if ($star_count == 0) {

            $data['words_media'] = 0;
            $data['stars_media'] = 0;
        } else {
            $data['stars_media'] = $star_sum / $star_count;
            $data['words_media'] = $word_sum / $star_count;
        }


        // $this->load->view('admin/reviewer_profile',$data);

        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/reviewer_profile/" . $amazon_reviewer_id;
        $config["total_rows"] = $this->Reviewers_model->reviews_count($amazon_reviewer_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->Reviewers_model->fetch_customer_reviews($config["per_page"], $page, $amazon_reviewer_id);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('admin/reviewer_profile', $data);


    }


//    campaigns

    function campaigns()
    {
        $this->check_login();
        $config = array();
        $config["base_url"] = base_url() . "index.php/Admin/campaigns";
        $this->load->model('Campaign_model');
        $config["total_rows"] = $this->Campaign_model->campaigns_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['campaigns'] = $this->Campaign_model->list_campaigns($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('admin/campaigns/list', $data);
    }

    function create_campaign()
    {
        $this->load->model('Client_model');
        $data['clients'] = $this->Client_model->clients();

        $this->load->model('Marketplaces_model');
        $data['all_marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('client', 'client', 'trim|required|numeric');
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('start_date', 'start_date', 'trim|required|date');
            if (count($this->input->post('marketplaces')) == 0)
                $this->form_validation->set_rules('marketplaces', 'marketplaces', 'trim|required');
            if (!$this->input->post('no_end')) {
                $this->form_validation->set_rules('end_date', 'end_date', 'trim|required|date');
            }


            if ($this->form_validation->run() == TRUE) {

                $marketplace_to_save = implode(',', $this->input->post('marketplaces'));

                $data = array(
                    'client_id' => $this->input->post('client'),
                    'name' => $this->input->post('name'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'marketplaces' => $marketplace_to_save,

                );

                $this->load->model('Campaign_model');
                $campaign_id=$this->Campaign_model->insert_data($data);
                $this->session->set_flashdata('add', 'campaign created successfully');
                redirect('admin/view_campaign/'.$campaign_id);
            }
        }

        $this->load->view('admin/campaigns/create', $data);
    }

    function edit_campaign()
    {
        $campaign_id = $this->uri->segment(3);
        $this->load->model('Client_model');
        $data['clients'] = $this->Client_model->clients();

        $this->load->model('Marketplaces_model');
        $data['all_marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();

        $this->load->model('Campaign_model');
        $data['campaign'] = $this->Campaign_model->getCampaign($campaign_id);

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('client', 'client', 'trim|required|numeric');
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('start_date', 'start_date', 'trim|required|date');
            if (count($this->input->post('marketplaces')) == 0)
                $this->form_validation->set_rules('marketplaces', 'marketplaces', 'trim|required');
            if (!$this->input->post('no_end')) {
                $this->form_validation->set_rules('end_date', 'end_date', 'trim|required|date');
            }


            if ($this->form_validation->run() == TRUE) {

                $marketplace_to_save = implode(',', $this->input->post('marketplaces'));


                $data = array(
                    'client_id' => $this->input->post('client'),
                    'name' => $this->input->post('name'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'marketplaces' => $marketplace_to_save,

                );

                $this->load->model('Campaign_model');
                $this->Campaign_model->update_data($campaign_id, $data);
                $this->session->set_flashdata('add', 'campaign updated successfully');
                redirect('admin/campaigns');
            }
        }

        $this->load->view('admin/campaigns/edit', $data);
    }

    function delete_campaign()
    {
        $this->check_login();

        $id = $this->uri->segment(3);
        $this->load->model('Campaign_model');
        $this->Campaign_model->delete_campaign($id);
        $this->session->set_flashdata('delete', 'campaign deleted successfully');
        redirect('admin/campaigns');
    }

    function view_campaign()
    {
        $this->check_login();

        $id = $this->uri->segment(3);
        $this->load->model('Campaign_model');
        $campaign = $this->Campaign_model->getCampaign($id);
        $data['campaign']=$campaign;
        $config = array();
        $config["base_url"] = base_url() . "index.php/Admin/view_campaign/".$id;
        $this->load->model('Offer_model');
        $config["total_rows"] = $this->Offer_model->offers_count($id);
        $config["per_page"] = 15;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['offers'] = $this->Offer_model->list_offers($config["per_page"], $page,$id);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('admin/campaigns/view', $data);
    }

//    offers

//    function offers()
//    {
//        $this->check_login();
//        $config = array();
//        $config["base_url"] = base_url() . "index.php/Admin/offers";
//        $this->load->model('Offer_model');
//        $config["total_rows"] = $this->Offer_model->offers_count();
//        $config["per_page"] = 15;
//        $config["uri_segment"] = 3;
//        $this->pagination->initialize($config);
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['offers'] = $this->Offer_model->list_offers($config["per_page"], $page);
//        $data["links"] = $this->pagination->create_links();
//        $this->load->view('admin/offers/list', $data);
//    }

    function create_offer()
    {
        $campaign_id = $this->uri->segment(3);
        $this->load->model('Campaign_model');
        $data['campaign'] = $this->Campaign_model->getCampaign($campaign_id);

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('marketplace', 'marketplace', 'trim|required');
            $this->form_validation->set_rules('asin', 'asin', 'trim|required');
            $this->form_validation->set_rules('item', 'item', 'trim|required');
            $this->form_validation->set_rules('qty', 'quantity', 'trim|required|numeric');
            $this->form_validation->set_rules('super_url', 'super url', 'trim|required');


            if ($this->form_validation->run() == TRUE) {


                $data = array(
                    'marketplace' => $this->input->post('marketplace'),
                    'asin' => $this->input->post('asin'),
                    'item' => $this->input->post('item'),
                    'qty' => $this->input->post('qty'),
                    'super_url' => $this->input->post('super_url'),
                    'campaign_id' => $campaign_id,

                );

                $this->load->model('Offer_model');
                $this->Offer_model->insert_data($data);
                $this->session->set_flashdata('add', 'offer created successfully');
                redirect('admin/view_campaign/'.$campaign_id);
            }
        }

        $this->load->view('admin/offers/create', $data);
    }

    function edit_offer()
    {
        $offer_id = $this->uri->segment(3);
        $this->load->model('Offer_model');
        $data['offer'] = $this->Offer_model->getOffer($offer_id);
        $campaign_id = $data['offer']->campaign_id;
        $this->load->model('Campaign_model');
        $data['campaign'] = $this->Campaign_model->getCampaign($campaign_id);

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');
            $this->form_validation->set_rules('marketplace', 'marketplace', 'trim|required');
            $this->form_validation->set_rules('asin', 'asin', 'trim|required');
            $this->form_validation->set_rules('item', 'item', 'trim|required');
            $this->form_validation->set_rules('qty', 'quantity', 'trim|required|numeric');
            $this->form_validation->set_rules('super_url', 'super url', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'marketplace' => $this->input->post('marketplace'),
                    'asin' => $this->input->post('asin'),
                    'item' => $this->input->post('item'),
                    'qty' => $this->input->post('qty'),
                    'super_url' => $this->input->post('super_url'),
                    'campaign_id' => $campaign_id,
                );

                $this->load->model('Offer_model');
                $this->Offer_model->update_data($offer_id,$data);
                $this->session->set_flashdata('add', 'offer updated successfully');
                redirect('admin/view_campaign/'.$campaign_id);
            }
        }

        $this->load->view('admin/offers/edit', $data);
    }

    function delete_offer()
    {
        $this->check_login();

        $campaign_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->load->model('Offer_model');
        $this->Offer_model->delete_offer($id);
        $this->session->set_flashdata('delete', 'offer deleted successfully');
        redirect('admin/view_campaign/'.$campaign_id);
    }

    function view_offer()
    {
        $this->check_login();

        $id = $this->uri->segment(3);
        $this->load->model('Offer_model');
        $offer = $this->Offer_model->getOffer($id);
        $this->load->view('admin/offers/view', ['offer' => $offer]);
    }

//    profile
    function profile()
    {

        $this->load->view('admin/profile.php');
    }
}
