<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Frontend_Controller{
    private $data = array();
    public function __construct() {
        parent::__construct();
        $this->data["css_data"][] = link_tag("css/style.css", "stylesheet", "text/css");
        $this->data["css_data"][] = link_tag("https://fonts.googleapis.com/css?family=Righteous", "stylesheet");
        $this->data["css_data"][] = link_tag("css/font-awesome.min.css", "stylesheet", "text/css");
        $this->data["css_data"][] = link_tag("css/jquery.lightbox-0.5.css", "stylesheet", "text/css");
        //$this->data["css_data"][] = link_tag("css/styles.css", "stylesheet", "text/css");
        
        $this->data["meta_data"][] = meta("keywords", "");
        $this->data["meta_data"][] = meta("author", "Aleksandar Atlagić");
        $this->data["meta_data"][] = meta("Content-type", "text/hmtl; charset=utf8", "equiv");
        
        $this->load->model('Menu_model');
        $this->data['menus'] = $this->Menu_model->menu();
        
        $this->load->library('session');
        $this->load->helper('form');
    }
    
    public function index()
    {
        $this->load_view('login', $this->data);
    }
    
    public function login()
    {
        $button = $this->input->post('btnSubmit');
            if( $button )
            {
                
                $username = $this->input->post('tbUsername');
                $password = $this->input->post('tbPassword');
                
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('tbUsername','Username','required|min_length[3]|max_length[30]|regex_match[/^[A-Z]{1}[a-z]{3,30}$/]');
                $this->form_validation->set_rules('tbPassword','Password','required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z]\w{3,14}$/]');
                
                $this->form_validation->set_message('required','Field %s is required!');
//              $this->form_validation->set_message('required','Field %s is required!');
//              $this->form_validation->set_message('min_length[]','Length of characters in field %s is too short!');
//              $this->form_validation->set_message('max_length[]','Field %s have excess characters!');
//              $this->form_validation->set_message('regex_match[]','Reqular exception problem!');
                
                if( $this->form_validation->run() )
                {
                    
                    $this->load->model('Users_model','um');
                    
                    $this->um->username=$username;
                    $this->um->password=md5($password);
                    
                    $korisnik = $this->um->check();
                    foreach ($korisnik as $k){
                     $id = $k['idUser'];
                     $username = $k['username'];
                     $role = $k['role'];
                     
                    }
                    
                    $korisnik_podaci = array(
                        'id' => $id,
                        'username' => $username,
                        'role' => $role
                    );
                    
                    if(empty($korisnik))
                    {
                        echo 'da';
                        $this->session->set_userdata('errors','You are not registred!');
                        redirect('Login');
                    }
                    else 
                    {
                        
                        echo 'ne';
                         $this->session->set_userdata($korisnik_podaci);
//                        $this->session->set_userdata('username',$array['username']);
//                        $this->session->set_userdata('role',$array['idRole']);
//                    var_dump($this->session->userdata('role'))or die;                     
                        if($this->session->userdata('role') == 'admin')
                        {
                            redirect('admin');
                        }
                        else if($this->session->userdata('role') == 'user')
                        {
                            redirect();
                        }
                    }
                }
                else
                {
                    $this->session->set_userdata('errors', validation_errors());
                    redirect('Login');
                }
           }
    }
    
    public function logout()
    {
        $korisnik=$this->session->userdata('username');
        if(!empty($korisnik))
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('role');
            $this->session->unset_userdata('sess_poll');
            $this->session->sess_destroy();
            redirect();
        }
        else 
        {
            redirect();
        }
    }
}
