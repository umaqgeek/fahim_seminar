<?php

class M_users extends CI_Model {

    function getAll() {
        $this->db->select('*');
        $this->db->from('users u, users_type ut');
        $this->db->where('u.ut_id = ut.ut_id');
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
        $this->db->from('users u, users_type ut');
        $this->db->where('u.ut_id = ut.ut_id');
        $this->db->where('u.u_id', $id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $d[] = $r;
            }
            return $d;
        }
    }

    function add($data) {
        if ($this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function edit($id, $data) {
        $this->db->where('u_id', $id);
        return $this->db->update('users', $data);
    }

    function delete($id) {
        $this->db->where('u_id', $id);
        return $this->db->delete('users');
    }

}

?>