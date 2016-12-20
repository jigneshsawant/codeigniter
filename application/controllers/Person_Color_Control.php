<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/16/2016
 * Time: 3:59 PM
 */

class Person_Color_Control extends CI_Controller
{
    public function index()
    {
        $this->load->model('Person_Color_Insert_Model');
        $query = $this->Person_Color_Insert_Model->view_details();
        $data['Details'] = null;
        if($query)
        {
            $data['Details'] = $query;
        }
        $this->load->view('Person_Color_View',$data);
    }

    public function data_submit()
    {
        $person_data = array(
            'Pname' => $this->input->post('pname')
        );

        $this->db->insert('person', $person_data);

        $color_data = array(
            'Cname' => $this->input->post('cname')
        );

        $this->db->insert('color', $color_data);

        $this->load->model('Person_Color_Insert_Model');
        $query = $this->Person_Color_Insert_Model->view_details();
        echo json_encode($query);

    }
}
?>