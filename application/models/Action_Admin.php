<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_admin extends CI_model
{
    public function deleteDataGuru($id)
    {
        $this->db->where('guru_id', $id);
        $this->db->delete('tabel_guru');
        $this->deleteAkunGuru($id);
    }

    private function deleteAkunGuru($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->deleteSubTeacher($id);
    }

    private function deleteSubTeacher($id)
    {
        $this->db->where('teacher_id', $id);
        $this->db->delete('sub_teacher');
    }

    public function deleteDataSiswa($id)
    {
        $this->db->where('siswa_id', $id);
        $this->db->delete('tabel_siswa');
        $this->deleteAkunSiswa($id);
    }

    private function deleteAkunSiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
