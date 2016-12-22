<?php

class M_seminar_registration extends CI_Model {

    function getAll() {
        $this->db->select('*');
        $this->db->from('seminar_registration sr, sr_status srs, negeri n');
        $this->db->where('sr.srs_id = srs.srs_id');
        $this->db->where('sr.n_id = n.n_id');
        $this->db->order_by('sr.sr_datetime', 'DESC');
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
        $this->db->from('seminar_registration sr, sr_status srs, negeri n');
        $this->db->where('sr.srs_id = srs.srs_id');
        $this->db->where('sr.n_id = n.n_id');
        $this->db->where('sr.sr_id', $id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $d[] = $r;
            }
            return $d;
        }
    }

    function add($data) {
        if ($this->db->insert('seminar_registration', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function edit($id, $data) {
        $this->db->where('sr_id', $id);
        return $this->db->update('seminar_registration', $data);
    }

    function delete($id) {
        $this->db->where('sr_id', $id);
        return $this->db->delete('seminar_registration');
    }

}

?>