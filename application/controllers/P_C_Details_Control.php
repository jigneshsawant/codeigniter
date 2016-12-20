<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/17/2016
 * Time: 10:55 AM
 */

class P_C_Details_Control extends CI_Controller
{
    public function display_color($cid)
    {
            $query1 = $this->db->query("select cname,cid from color where cid=$cid");
            $query = $this->db->query("SELECT p.pname,p.pid FROM person_color pc,person p WHERE pc.cid=$cid AND pc.pid=p.pid");
            $data['Persons'] = $query->result();
            //$data['Persons'] = $cid;
            $data['person'] = $query1->result();
            $query2 = $this->db->query("select p.pname,c.cname,pc.id from person_color pc,person p,color c where pc.pid=p.pid and pc.cid=c.cid");
            $data['Person_Color'] = $query2->result();
            $query3 = $this->db->query("select pname,pid from person where pid not in(select p.pid from person_color pc,person p where pc.cid=$cid and pc.pid=p.pid)");
            $data['RemainingPersons'] = $query3->result();

            $this->load->view('Color_Details',$data);
    }

    public function display_person($pid)
    {
            $query1 = $this->db->query("select pname,pid from person where pid=$pid");
            $query = $this->db->query("SELECT c.cname,c.cid FROM person_color pc,color c WHERE pc.pid=$pid AND pc.cid=c.cid");
            $data['Colors'] = $query->result();
            //$data['Colors'] = $pid;
            $data['color'] = $query1->result();
            $query2 = $this->db->query("select p.pname,c.cname,pc.id from person_color pc,person p,color c where pc.pid=p.pid and pc.cid=c.cid");
            $data['Person_Color'] = $query2->result();
            $query3 = $this->db->query("select cname,cid from color where cid not in(select c.cid from person_color pc,color c where pc.pid=$pid and pc.cid=c.cid)");
            $data['RemainingColors'] = $query3->result();

            $this->load->view('Person_Details',$data);
    }

    public function delete_person($cid)
    {
        $this->load->model('Person_Color_Insert_model');
        $this->Person_Color_Insert_model->delete_p($cid);
    }

    public function delete_color($pid)
    {
        $this->load->model('Person_Color_Insert_model');
        $this->Person_Color_Insert_model->delete_c($pid);
    }

    public function delete_details($id)
    {
        $this->load->model('Person_Color_Insert_model');
        $this->Person_Color_Insert_model->delete_det($id);
    }

    public function add_color()
    {
        $cid = $this->input->post('cid');
        $pid = $this->input->post('pid1');
        $this->load->model('Person_Color_Insert_model');
        $this->Person_Color_Insert_model->insert_color($cid,$pid);

        $query = $this->db->query("select cname,cid from color where cid=$cid");
        $data = $query->result();
        echo json_encode($data);
    }

    public function add_person()
    {
        $pid = $this->input->post('pid');
        $cid = $this->input->post('cid1');
        $this->load->model('Person_Color_Insert_model');
        $this->Person_Color_Insert_model->insert_person($pid,$cid);

        $query = $this->db->query("select pname,pid from person where pid=$pid");
        $data = $query->result();
        echo json_encode($data);
    }
}
?>