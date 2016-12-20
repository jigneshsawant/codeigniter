<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
    {
        $this->load->helper('url');
        if(empty($_POST["eid"]))
        {
            $this->load->view('welcome_message');
        }
        else
        {
            $data = array(
                'Emp_id' => $this->input->post('eid'),
                'Emp_name' => $this->input->post('ename'),
                'Emp_addr' => $this->input->post('eaddr'),
                'Emp_phone' => $this->input->post('ephone')
            );

            $this->load->model('Insert_model');
            $this->Insert_model->form_insert($data);
            //$this->load->view('welcome_message');
        }

        $this->load->model('Insert_model');
        $query = $this->Insert_model->view_data();
        $data['Employees'] = null;
        if($query)
        {
            $data['Employees'] = $query;
        }
        $this->load->view('display.php',$data);
	}

	public function insert_all()
    {
        $cnt = count($this->input->post('eid'));
        /*$data = array(
            'Emp_id' => $this->input->post('eid1'),
            'Emp_name' => $this->input->post('ename1'),
            'Emp_addr' => $this->input->post('eaddr1'),
            'Emp_phone' => $this->input->post('ephone1')
        );
        $this->db->insert('emp', $data);*/
        echo "" + $cnt;
        exit;
        //$this->Welcome->show_emp($data);
    }

	public function ajax_insert()
    {
        $data = array(
            'Emp_id' => $this->input->post('eid'),
            'Emp_name' => $this->input->post('ename'),
            'Emp_addr' => $this->input->post('eaddr'),
            'Emp_phone' => $this->input->post('ephone')
        );
        $this->db->insert('emp', $data);
        $this->Welcome->show_emp($data);
    }

    public function show_emp()
    {
        $this->load->model('Insert_model');
        $query = $this->Insert_model->view_data();
        $data['Employees'] = null;
        if($query)
        {
            $data['Employees'] = $query;
        }
        $this->load->view('display.php',$data);
    }

	public function del_data()
    {
        if(empty($_POST["empid"]))
        {
            $this->load->view('display');
        }
        else
        {
            $id = $this->input->post('empid');
            $this->db->where('emp_id',$id);
            $this->db->delete('emp');
            echo "Delete Successfull...";
        }
    }
}
