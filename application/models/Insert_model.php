<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/12/2016
 * Time: 4:28 PM
 */

class insert_model extends CI_Model{
    function __construct() {
        parent :: __construct();
        $this->load->model('Insert_model');
    }
    function form_insert($data){
// Inserting in Table Emp
        $this->db->insert('emp', $data);
    }

    function form_insert_all($data){
        //Batch insertion
        $this->db->insert_batch('emp', $data);
    }

    public function insert_data($data)
    {
        $this->db->insert('student', $data);
    }

    public function view_students()
    {
        $this->db->select("sid,sname");
        $this->db->from('student');
        $query = $this->db->get();
        return $query->result();
    }

    function view_data()
    {
        $this->db->select("emp_id,emp_name,emp_addr,emp_phone");
        $this->db->from('emp');
        $query = $this->db->get();
        return $query->result();
    }
}
?>