<?php

class M_post_page extends CI_Model {

    function getAll() {
        $this->db->select('*');
        $this->db->from('post_page pp');
        $this->db->order_by('pp.pp_priority', 'ASC');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $d[] = $r;
            }
            return $d;
        }
    }

    function get($id) {
        $this->db->select('*');
        $this->db->from('post_page pp');
        $this->db->where('pp.pp_id', $id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $d[] = $r;
            }
            return $d;
        }
    }

    function add($data) {
        if ($this->db->insert('post_page', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function edit($id, $data) {
        $this->db->where('pp_id', $id);
        return $this->db->update('post_page', $data);
    }

    function delete($id) {
        $this->db->where('pp_id', $id);
        return $this->db->delete('post_page');
    }

}

?>