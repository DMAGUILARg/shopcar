<?php

class Registro extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('auth/Usuario_model'); 
    }

    public function index(){
        $this->load->view('auth/registro_view');
    }

    public function crear(){
        // Validar los datos del formulario
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'email' => $this->input->post('email'),
                'telefono' => $this->input->post('telefono'),
                'password' => $this->input->post('password'),
                'direccion' => $this->input->post('direccion')
            );

            if ($this->Usuario_model->registrar($data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Registro exitoso!'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Error al registrar usuario.'
                );
            }
            echo json_encode($response);
        }
    }
}