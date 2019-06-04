<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_pelajaran extends CI_model
{
    public function getSubjects()
    {
        $sql =
            "
            SELECT * FROM subjects_group sg
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            ";
        $pelajaran  = $this->db->query($sql)->result_array();
        return $pelajaran;
    }
}
