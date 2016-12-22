<?php

class M_negeri extends CI_Model {

    function getAll() {
        $this->db->select('*');
        $this->db->from('negeri n');
        $this->db->order_by('n.n_desc', 'ASC');
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
        $this->db->from('negeri n');
        $this->db->where('n.n_id', $id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $d[] = $r;
            }
            return $d;
        }
    }

    function add($data) {
        if ($this->db->insert('negeri', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function edit($id, $data) {
        $this->db->where('n_id', $id);
        return $this->db->update('negeri', $data);
    }

    function delete($id) {
        $this->db->where('n_id', $id);
        return $this->db->delete('negeri');
    }

}

?>