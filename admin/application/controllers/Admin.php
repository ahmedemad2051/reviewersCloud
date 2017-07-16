<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/admin
     * 	- or -
     * 		http://example.com/index.php/admin/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        //load helpers
        $this->load->helper(array('url', 'cookie', 'form'));
        $this->load->library('pagination');
    }

    public function _output($output) {
        $data = array(
            'base_url' => base_url(),
        );
        echo $this->load->view('templates/header', '', true)
        . $this->load->view('templates/navigation', '', true)
        . $this->load->view('templates/msg', '', true)
        . $output
        . $this->load->view('templates/footer', '', true);
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function login() {
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
                if ($user_result > 0) { //active user record is present
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

    function logout() {
        $this->session->sess_destroy();
        redirect('admin/index');
    }

    function check_login() {
        if (!$this->session->userdata('admin')) {
            redirect('admin/index');
        }
    }

    function dashboard() {
        $this->check_login();

        $this->load->view('admin/dashboard');
    }

//    User

    function users()
    {
        $this->check_login();

        $config = array();
        $config["base_url"] = base_url()."index.php/Admin/users";
        $this->load->model('User_model');
        $config["total_rows"] = $this->User_model->users_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['users']=$this->User_model->list_users($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('admin/users/list',$data);
    }

    function new_user() {
        $this->check_login();

        $data = array(
//            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'type' => '0',
            'create_campaign' => '0',
            'edit_campaign' => '0',
            'delete_campaign' => '0',
            'archive_campaign' => '0',
            'create_reviewer' => '0',
            'edit_reviewer' => '0',
            'archive_reviewer' => '0'
        );


        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                //save data
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'type' => $this->input->post('type'),
                    'create_campaign' => $this->input->post('create_campaign'),
                    'edit_campaign' => $this->input->post('edit_campaign'),
                    'delete_campaign' => $this->input->post('delete_campaign'),
                    'archive_campaign' => $this->input->post('archive_campaign'),
                    'create_reviewer' => $this->input->post('create_reviewer'),
                    'edit_reviewer' => $this->input->post('edit_reviewer'),
                    'archive_reviewer' => $this->input->post('archive_reviewer')
                );

                $this->load->model('User_model');
                $this->User_model->insert_data($data);
                redirect('admin/dashboard');
            } else {
                //form had errors
//                $data = array(
//                    'error' => ' ',
//                );
//                $this->load->view('admin/edit_reviewer', $data);
            }
        }

        $this->load->view('admin/new_user', $data);
    }

    function edit_user() {
        $this->check_login();

        $id=$this->uri->segment(3);

        $this->load->model('User_model');
        $user=$this->User_model->getUser($id);
        if($user->num_rows() > 0)
            $user=$user->result();
        else
            redirect('admin/users');
        $data = array(
            'id' => $user[0]->id,
            'first_name' =>$user[0]->first_name ,
            'last_name' => $user[0]->last_name,
            'email' => $user[0]->email,
            'password' =>'',
            'type' => $user[0]->type,
            'create_campaign' => $user[0]->create_campaign,
            'edit_campaign' => $user[0]->edit_campaign,
            'delete_campaign' => $user[0]->delete_campaign,
            'archive_campaign' => $user[0]->archive_campaign,
            'create_reviewer' => $user[0]->create_reviewer,
            'edit_reviewer' => $user[0]->edit_reviewer,
            'archive_reviewer' => $user[0]->archive_reviewer
        );


        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
//            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                //save data
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'type' => $this->input->post('type'),
                    'create_campaign' => $this->input->post('create_campaign'),
                    'edit_campaign' => $this->input->post('edit_campaign'),
                    'delete_campaign' => $this->input->post('delete_campaign'),
                    'archive_campaign' => $this->input->post('archive_campaign'),
                    'create_reviewer' => $this->input->post('create_reviewer'),
                    'edit_reviewer' => $this->input->post('edit_reviewer'),
                    'archive_reviewer' => $this->input->post('archive_reviewer')
                );
                if($this->input->post('password') !='')
                    $data['password']=md5($this->input->post('password'));

                $this->User_model->update_data($user[0]->id,$data);
                $this->session->set_flashdata('add', 'user updated successfully');
                redirect('admin/users');
            } else {
                //form had errors
//                $data = array(
//                    'error' => ' ',
//                );
//                $this->load->view('admin/edit_reviewer', $data);
            }
        }

        $this->load->view('admin/users/edit_user', $data);
    }

    function delete_user()
    {
        $this->check_login();

        $id=$this->uri->segment(3);
        $this->load->model('User_model');
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('delete', 'user deleted successfully');
        redirect('admin/users');
    }

    function view_user()
    {
        $this->check_login();

        $id=$this->uri->segment(3);
        $this->load->model('User_model');
        $user=$this->User_model->getUser($id);
        $this->load->view('admin/users/view_user',['user'=>$user->result()[0]]);
    }


//    Clients


    function clients()
    {
        $this->check_login();

        $config = array();
        $config["base_url"] = base_url()."index.php/Admin/clients";
        $this->load->model('Client_model');
        $config["total_rows"] = $this->Client_model->clients_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['clients']=$this->Client_model->list_clients($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('admin/clients/list',$data);
    }

    function new_client() {
        $this->check_login();

        $data = array(
//            'id' => '',
            'amazon_name' => '',
            'contact_first_name' => '',
            'contact_last_name' => '',
            'contact_phone' => '',
            'contact_fax' => '',
            'contact_email' => '',
            'contact_password' => '',
            'amazon_id' => '',
            'marketplaces' => '',
            'categories' => '',
            'company_name' => '',
            'billing_address_1' => '',
            'billing_address_2' => '',
            'billing_department' => '',
            'billing_city' => '',
            'billing_zip' => '',
            'billing_state' => '',
            'billing_cycle' => '',
            'billing_country' => ''
        );

        $this->load->model('Marketplaces_model');
        $data['all_marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();
        $this->load->model('Amazon_categories_model');
        $data['all_categories'] = $this->Amazon_categories_model->get_all_categories();

        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('amazon_name', 'amazon_name', 'trim|required');
            $this->form_validation->set_rules('contact_first_name', 'contact_first_name', 'trim|required');
            $this->form_validation->set_rules('contact_last_name', 'contact_last_name', 'trim|required');
            $this->form_validation->set_rules('contact_phone', 'contact_phone', 'trim|required');
            $this->form_validation->set_rules('contact_fax', 'contact_fax', 'trim|required');
            $this->form_validation->set_rules('contact_email', 'contact_email', 'trim|valid_email|required');
            $this->form_validation->set_rules('contact_password', 'contact_password', 'trim|required');
            $this->form_validation->set_rules('amazon_id', 'amazon_id', 'trim|required');
//            $this->form_validation->set_rules('marketplaces', 'marketplaces', 'trim|required');
//            $this->form_validation->set_rules('categories', 'categories', 'trim|required');
            $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
            $this->form_validation->set_rules('billing_address_1', 'billing_address_1', 'trim|required');
            $this->form_validation->set_rules('billing_address_2', 'billing_address_2', 'trim|required');
            $this->form_validation->set_rules('billing_department', 'billing_department', 'trim|required');
            $this->form_validation->set_rules('billing_city', 'billing_city', 'trim|required');
            $this->form_validation->set_rules('billing_zip', 'billing_zip', 'trim|required');
            $this->form_validation->set_rules('billing_state', 'billing_state', 'trim|required');
            $this->form_validation->set_rules('billing_country', 'billing_country', 'trim|required');
            $this->form_validation->set_rules('billing_cycle', 'billing_cycle', 'trim|required');

            //repopulate dinamic checkboxes!!!
            foreach ($data['all_marketplaces'] as $special) {
                $this->form_validation->set_rules($special->marketplace, '', 'trim');
            }
            foreach ($data['all_categories'] as $special) {
                $this->form_validation->set_rules($special->category, '', 'trim');
            }

            if ($this->form_validation->run() == TRUE) {
                //save data
//                 $special_data = explode('*', lang('company_vehicles'));
//        $company_vehicles = ' ';
//        foreach ($special_data as $special) {
//            $company_vehicles .= $this->input->post($special) . ',';
//        }
//                
                $marketplace_to_save = '';
                foreach ($data['all_marketplaces'] as $special) {
                    $marketplace_to_save .= $this->input->post('marketplace_'.$special->id). ',';
                }
                $categories_to_save = '';
                foreach ($data['all_categories'] as $special) {
                    $categories_to_save .= $this->input->post('category_'.$special->id). ',';
                }


                $data = array(
                    'amazon_name' => $this->input->post('amazon_name'),
                    'contact_first_name' => $this->input->post('contact_first_name'),
                    'contact_last_name' => $this->input->post('contact_last_name'),
                    'contact_phone' => $this->input->post('contact_phone'),
                    'contact_fax' => $this->input->post('contact_fax'),
                    'contact_email' => $this->input->post('contact_email'),
                    'contact_password' => $this->input->post('contact_password'),
                    'amazon_id' => $this->input->post('amazon_id'),
                    'marketplaces' => $marketplace_to_save,
                    'categories' => $categories_to_save,
                    'company_name' => $this->input->post('company_name'),
                    'billing_address_1' => $this->input->post('billing_address_1'),
                    'billing_address_2' => $this->input->post('billing_address_2'),
                    'billing_department' => $this->input->post('billing_department'),
                    'billing_city' => $this->input->post('billing_city'),
                    'billing_zip' => $this->input->post('billing_zip'),
                    'billing_state' => $this->input->post('billing_state'),
                    'billing_cycle' => $this->input->post('billing_cycle'),
                    'billing_country' => $this->input->post('billing_country')
                );

                $this->load->model('Client_model');
                $this->Client_model->insert_data($data);
                redirect('admin/dashboard');
            } else {
                //form had errors
//                $data = array(
//                    'error' => ' ',
//                );
//                $this->load->view('admin/edit_reviewer', $data);
            }
        }

        $this->load->view('admin/new_client', $data);
    }

    function edit_clients()
    {
        $this->check_login();

        $id=$this->uri->segment(3);
        $this->load->model('Client_model');
        $client=$this->Client_model->getClient($id);
        if($client->num_rows() > 0)
            $client=$client->result();
        else
            redirect('admin/clients');



        $data = array(
            'id' =>$client[0]->id ,
            'amazon_name' => $client[0]->amazon_name,
            'contact_first_name' => $client[0]->contact_first_name,
            'contact_last_name' => $client[0]->contact_last_name,
            'contact_phone' => $client[0]->contact_phone,
            'contact_fax' => $client[0]->contact_fax,
            'contact_email' => $client[0]->contact_email,
            'contact_password' => $client[0]->contact_password,
            'amazon_id' => $client[0]->amazon_id,
            'marketplaces' => $client[0]->marketplaces,
            'categories' => $client[0]->categories,
            'company_name' => $client[0]->company_name,
            'billing_address_1' => $client[0]->billing_address_1,
            'billing_address_2' => $client[0]->billing_address_2,
            'billing_department' => $client[0]->billing_department,
            'billing_city' => $client[0]->billing_city,
            'billing_zip' => $client[0]->billing_zip,
            'billing_state' => $client[0]->billing_state,
            'billing_cycle' => $client[0]->billing_cycle,
            'billing_country' => $client[0]->billing_country
        );

        $this->load->model('Marketplaces_model');
        $data['all_marketplaces'] = $this->Marketplaces_model->get_all_marketplaces();
        $this->load->model('Amazon_categories_model');
        $data['all_categories'] = $this->Amazon_categories_model->get_all_categories();




        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('amazon_name', 'amazon_name', 'trim|required');
            $this->form_validation->set_rules('contact_first_name', 'contact_first_name', 'trim|required');
            $this->form_validation->set_rules('contact_last_name', 'contact_last_name', 'trim|required');
            $this->form_validation->set_rules('contact_phone', 'contact_phone', 'trim|required');
            $this->form_validation->set_rules('contact_fax', 'contact_fax', 'trim|required');
            $this->form_validation->set_rules('contact_email', 'contact_email', 'trim|valid_email|required');
            $this->form_validation->set_rules('contact_password', 'contact_password', 'trim|required');
            $this->form_validation->set_rules('amazon_id', 'amazon_id', 'trim|required');
//            $this->form_validation->set_rules('marketplaces', 'marketplaces', 'trim|required');
//            $this->form_validation->set_rules('categories', 'categories', 'trim|required');
            $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
            $this->form_validation->set_rules('billing_address_1', 'billing_address_1', 'trim|required');
            $this->form_validation->set_rules('billing_address_2', 'billing_address_2', 'trim|required');
            $this->form_validation->set_rules('billing_department', 'billing_department', 'trim|required');
            $this->form_validation->set_rules('billing_city', 'billing_city', 'trim|required');
            $this->form_validation->set_rules('billing_zip', 'billing_zip', 'trim|required');
            $this->form_validation->set_rules('billing_state', 'billing_state', 'trim|required');
            $this->form_validation->set_rules('billing_country', 'billing_country', 'trim|required');
            $this->form_validation->set_rules('billing_cycle', 'billing_cycle', 'trim|required');

            //repopulate dinamic checkboxes!!!
            foreach ($data['all_marketplaces'] as $special) {
                $this->form_validation->set_rules($special->marketplace, '', 'trim');
            }
            foreach ($data['all_categories'] as $special) {
                $this->form_validation->set_rules($special->category, '', 'trim');
            }

            if ($this->form_validation->run() == TRUE) {
                //save data
//                 $special_data = explode('*', lang('company_vehicles'));
//        $company_vehicles = ' ';
//        foreach ($special_data as $special) {
//            $company_vehicles .= $this->input->post($special) . ',';
//        }
//
                $marketplace_to_save = '';
                foreach ($data['all_marketplaces'] as $special) {
                    $marketplace_to_save .= $this->input->post('marketplace_'.$special->id). ',';
                }
                $categories_to_save = '';
                foreach ($data['all_categories'] as $special) {
                    $categories_to_save .= $this->input->post('category_'.$special->id). ',';
                }


                $data = array(
                    'amazon_name' => $this->input->post('amazon_name'),
                    'contact_first_name' => $this->input->post('contact_first_name'),
                    'contact_last_name' => $this->input->post('contact_last_name'),
                    'contact_phone' => $this->input->post('contact_phone'),
                    'contact_fax' => $this->input->post('contact_fax'),
                    'contact_email' => $this->input->post('contact_email'),
                    'contact_password' => $this->input->post('contact_password'),
                    'amazon_id' => $this->input->post('amazon_id'),
                    'marketplaces' => $marketplace_to_save,
                    'categories' => $categories_to_save,
                    'company_name' => $this->input->post('company_name'),
                    'billing_address_1' => $this->input->post('billing_address_1'),
                    'billing_address_2' => $this->input->post('billing_address_2'),
                    'billing_department' => $this->input->post('billing_department'),
                    'billing_city' => $this->input->post('billing_city'),
                    'billing_zip' => $this->input->post('billing_zip'),
                    'billing_state' => $this->input->post('billing_state'),
                    'billing_cycle' => $this->input->post('billing_cycle'),
                    'billing_country' => $this->input->post('billing_country')
                );

                $this->load->model('Client_model');
                $this->Client_model->update_data($client[0]->id,$data);
                $this->session->set_flashdata('add', 'client updated successfully');
                redirect('admin/clients');
            } else {
                //form had errors
//                $data = array(
//                    'error' => ' ',
//                );
//                $this->load->view('admin/edit_reviewer', $data);
            }
        }

        $this->load->view('admin/clients/edit_client',$data);

    }

    function delete_clients()
    {
        $this->check_login();

        $id=$this->uri->segment(3);
        $this->load->model('Client_model');
        $client=$this->Client_model->delete_client($id);
        $this->session->set_flashdata('delete', 'client deleted successfully');
        redirect('admin/clients');
    }

    function view_client()
    {
        $this->check_login();

        $id=$this->uri->segment(3);
        $this->load->model('Client_model');
        $client=$this->Client_model->getClient($id);
        $this->load->view('admin/clients/view_client',['client'=>$client->result()[0]]);
    }

    // Settings

    function settings() {
        $this->check_login();

        $this->load->model('User_model');
        $email=$this->session->userdata('admin');
        $user=$this->User_model->getUserByEmail($email);
        if($user->num_rows() > 0)
            $user=$user->result();
        else
            redirect('admin');
        $data = array(
            'first_name' =>$user[0]->first_name ,
            'last_name' => $user[0]->last_name,
            'email' => $user[0]->email,
            'password' =>'',
            'type' => $user[0]->type,
            'create_campaign' => $user[0]->create_campaign,
            'edit_campaign' => $user[0]->edit_campaign,
            'delete_campaign' => $user[0]->delete_campaign,
            'archive_campaign' => $user[0]->archive_campaign,
            'create_reviewer' => $user[0]->create_reviewer,
            'edit_reviewer' => $user[0]->edit_reviewer,
            'archive_reviewer' => $user[0]->archive_reviewer
        );


        if ($this->input->post('btn_save')) {
            //form was submitted
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required|callback_email_check');
//            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                //save data
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'type' => $this->input->post('type'),
                    'create_campaign' => $this->input->post('create_campaign'),
                    'edit_campaign' => $this->input->post('edit_campaign'),
                    'delete_campaign' => $this->input->post('delete_campaign'),
                    'archive_campaign' => $this->input->post('archive_campaign'),
                    'create_reviewer' => $this->input->post('create_reviewer'),
                    'edit_reviewer' => $this->input->post('edit_reviewer'),
                    'archive_reviewer' => $this->input->post('archive_reviewer')
                );
                if($this->input->post('password') !='')
                    $data['password']=md5($this->input->post('password'));

                $this->User_model->update_data($user[0]->id,$data);
                $this->session->set_flashdata('add', 'your data updated successfully');
                redirect('admin/settings');
            }
        }

        $this->load->view('admin/settings', $data);
    }

    function email_check($email)
    {
        $this->load->model('User_model');
        $user=$this->User_model->getUserByEmail($email);
        if($user->num_rows() > 0)
            if($this->session->userdata('admin') !=$email)
            {
                $this->form_validation->set_message('email_check', 'Email already exists.');
                return FALSE;
            }

        return true;
    }

}
