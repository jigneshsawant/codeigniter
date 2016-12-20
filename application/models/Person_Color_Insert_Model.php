<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/14/2016
 * Time: 7:38 PM
 */

class Person_Color_Insert_model extends CI_Model
{
    public function view_details()
    {
        $query = $this->db->query("Select * from color c,person p where c.cid=p.pid");
        return $query->result();
    }

    public function delete_p($cid)
    {
        $query = $this->db->query("delete from person_color where cid=$cid");
    }

    public function delete_c($pid)
    {
        $query = $this->db->query("delete from person_color where cid=$pid");
    }

    public function delete_det($id)
    {
        $query = $this->db->query("delete from person_color where id=$id");
    }

    public function insert_person($pid,$cid)
    {
        $this->db->query("insert into person_color(pid,cid) VALUES ($pid,$cid)");
    }

    public function insert_color($cid,$pid)
    {
        $this->db->query("insert into person_color(pid,cid) VALUES ($pid,$cid)");
    }
}

?>