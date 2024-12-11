<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();  // Call the parent constructor
    }

    // Get all users
    public function get_all_users(){
         $res = $this->db->get('users')->result_array();
         return $res;
    }

    // Get user by ID
    public function get_user($id){
        $res = $this->db->get_where('users' , ['id' => $id])->row_array();
    }

    // Add a new user
    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    // Update an existing user
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Delete a user
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
