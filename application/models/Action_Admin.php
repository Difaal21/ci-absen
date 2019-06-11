<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_admin extends CI_model
{
    /*=========================== Delete Data Guru ============================================== */
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

    /*=========================== Delete Data Siswa ============================================== */
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

    /*=========================== Get Data Guru ============================================== */
    public function getDataGuru($id)
    {
        $query =
            "
            SELECT * FROM subjects_class sc 
            JOIN class_subjects cs ON cs.subjects_id = sc.subjects_id
            JOIN sub_teacher st ON st.subjects_id  = cs.subjects_id
            JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
            JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = st.pelajaran_id
            JOIN user u ON u.id = st.teacher_id
            JOIN subjects_group sg ON sg.group_id = sc.group_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            WHERE tg.guru_id = $id
            ";
        $guru = $this->db->query($query)->row_array();
        return $guru;
    }

    /*=========================== Update Data Guru ============================================== */
    public function updateDataGuru()
    {
        $user    =
            [
                'username'  => $this->input->post('username', true),
                'password'  => $this->input->post('password', true)
            ];

        $dataGuru =
            [
                'guru_name'     => $this->input->post('guru_name', true),
                'alamat_guru'   => $this->input->post('alamat_guru', true)
            ];
        $this->updateTabelUser($user);
        $this->updateTabelGuru($dataGuru);
    }

    public function updateTabelUser($data)
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $db = $this->db->update('user', $data);
    }

    public function updateTabelGuru($data)
    {
        $id = $this->input->post('id');
        $this->db->where('guru_id', $id);
        $db = $this->db->update('tabel_guru', $data);
    }

    /*=========================== Get Data Siswa ============================================== */
    public function getDataSiswa($id)
    {
        $query =
            "
            SELECT * FROM group_class gc 
            JOIN sub_student ss ON ss.gc_id = gc.gc_id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN subjects_class sc ON sc.gc_id = gc.gc_id
            JOIN tabel_kelas tk ON tk.kelas_id = sc.kelas_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
            JOIN user u ON u.id = ts.siswa_id
            WHERE ts.siswa_id = $id
            ";
        $siswa = $this->db->query($query)->row_array();
        return $siswa;
    }
    /*=========================== Update Data Siswa ============================================== */
    public function updateDataSiswa()
    {
        $user    =
            [
                'username'  => $this->input->post('username', true),
                'password'  => $this->input->post('password', true)
            ];

        $dataSiswa =
            [
                'siswa_name'    => $this->input->post('siswa_name', true),
                'alamat'        => $this->input->post('alamat', true)
            ];
        $this->updateUser($user);
        $this->updateTabelSiswa($dataSiswa);
    }

    public function updateUser($data)
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $db = $this->db->update('user', $data);
    }

    public function updateTabelSiswa($data)
    {
        $id = $this->input->post('id');
        $this->db->where('siswa_id', $id);
        $db = $this->db->update('tabel_siswa', $data);
    }
}
