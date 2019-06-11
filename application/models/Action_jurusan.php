<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_jurusan extends CI_model
{
    public function queryAkun()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $query =
            "
			SELECT * FROM user u
			LEFT JOIN tabel_siswa ts ON ts.siswa_id = u.id
			LEFT JOIN tabel_guru tg ON tg.guru_id = u.id
			WHERE ts.siswa_id  = $user[id] OR tg.guru_id = $user[id]
			";
        $dashboard = $this->db->query($query)->row_array();
        return $dashboard;
    }

    public function jurusanIpa()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $querySubjects =
            "
            SELECT * FROM subjects_class sc 
            JOIN class_subjects cs ON cs.subjects_id = sc.subjects_id
            JOIN sub_teacher st ON st.subjects_id  = cs.subjects_id
            JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
            JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
            JOIN subjects_url su ON su.class_id = sc.class_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = st.pelajaran_id
            JOIN user u ON u.id = st.teacher_id
            JOIN subjects_group sg ON sg.group_id = sc.group_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            WHERE st.teacher_id = $user[id] AND tj.jurusan_id =  1
            ";
        $jurusanIpa = $this->db->query($querySubjects)->result_array();
        return $jurusanIpa;
    }

    public function jurusanIps()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $querySubjects =
            "
            SELECT * FROM subjects_class sc 
            JOIN class_subjects cs ON cs.subjects_id = sc.subjects_id
            JOIN sub_teacher st ON st.subjects_id  = cs.subjects_id
            JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
            JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
            JOIN subjects_url su ON su.class_id = sc.class_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = st.pelajaran_id
            JOIN user u ON u.id = st.teacher_id
            JOIN subjects_group sg ON sg.group_id = sc.group_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            WHERE st.teacher_id = $user[id] AND tj.jurusan_id = 2
            ";
        $jurusanIps = $this->db->query($querySubjects)->result_array();
        return $jurusanIps;
    }
}
