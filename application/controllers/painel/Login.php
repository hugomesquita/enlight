<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $tela = 'painel/login/';

    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('UsersModel', 'users', FALSE); 
        $this->load->helper(array('form', 'url', 'html', 'directory')); 
        $this->load->library(array('form_validation', 'session'));
    }
  
    public function index() 
    {
        // Remove as sessoes
        $this->session->sess_destroy();
        $this->load->view($this->tela.'index');
    } 

    public function token() 
    { 
        $this->form_validation->set_rules('LoginAP', 'Login', 'trim|required');
        $this->form_validation->set_rules('SenhaAP', 'Senha', 'trim|required|callback_authcheck');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<small class="alert alert-danger d-block"><strong>', '</strong></small>');
            $this->load->view($this->tela.'index');
        } else { 
            redirect('painel/main', 'refresh');
        }
    } 

    public function authcheck($ps)
{
    $email = $this->input->post('LoginAP');
    $result = $this->users->filtrar([['campo' => 'email', 'valor' => $email]]);

    if ($result !== FALSE && $result->num_rows() > 0) {
        $user_row = $result->row();

        // Verifica se a senha está correta
        if (password_verify($ps, $user_row->password)) {
            $sess_array = array(
                'userID' => $user_row->id,
                'name' => $user_row->name,
                'email' => $user_row->email
            );

            // Inicia a sessão
            $this->session->set_userdata($sess_array);
            redirect('painel/main', 'refresh');
        } else {
            $this->form_validation->set_message('authcheck', "<span class='fa fa-remove-circle'></span> Senha incorreta");
            return FALSE;
        }
    } else {
        $this->form_validation->set_message('authcheck', "<span class='fa fa-remove-circle'></span> Usuário não encontrado");
        return FALSE;
    }
}


    public function recuperar()
    {
        $p = array(
            array('campo' => 'EMAIL', 'valor' => $this->input->get_post('Login')),
            array('campo' => 'ATIVO', 'valor' => 'S'),
        );
        $r = $this->users->filtro_login($p);

        $data = array(
            'row' => $r,
            'senha' => $this->users->geraSenha(),
        );
        $this->load->view($this->tela.'recover', $data);
    }

    public function logout()
    {
        // Remove as sessoes  
        $this->session->sess_destroy();
        redirect(base_url($this->tela.'index'), 'refresh');
    }
}
