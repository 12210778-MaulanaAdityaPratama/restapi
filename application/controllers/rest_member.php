<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Rest_member extends REST_Controller {
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id');
        if ($id === NULL) {
            $member = $this->db->get('member')->result();
            $this->response($member, 200); // Gunakan kode status 200 OK untuk respons sukses
        } else {
            $this->db->where('id', $id);
            $member = $this->db->get('member')->result();
            if ($member) {
                $this->response($member, 200);
            } else {
                $this->response(['error' => 'Data anggota tidak ditemukan.'], 404);
            }
        }
    }
}
?>
