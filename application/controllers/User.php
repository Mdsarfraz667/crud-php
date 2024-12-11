<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the User Model
    }

    // Display all users
    public function index() {
        $data['users'] = $this->User_model->get_all_users(); // Fetch all users
        $this->load->view('users/index', $data); // Load the index view
    }

    // Create a new user
    public function create() {
        if ($this->input->post()) {
            // Get form data
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
            ];
            // Insert data into the database
            $this->User_model->create_user($data);
            // Redirect to the user list
            redirect('user');
        } else {
            // Load the create view
            $this->load->view('users/create');
        }
    }

    // Edit an existing user
    public function edit($id) {
        if ($this->input->post()) {
            // Get form data
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
            ];
            // Update user in the database
            $this->User_model->update_user($id, $data);
            // Redirect to the user list
            redirect('user');
        } else {
            // Fetch user by ID and pass to the view
            $data['user'] = $this->User_model->get_user($id);
            $this->load->view('users/edit', $data);
        }
    }

    // Delete a user
    public function delete($id) {
        $this->User_model->delete_user($id); // Delete the user
        redirect('user'); // Redirect to the user list
    }
}
