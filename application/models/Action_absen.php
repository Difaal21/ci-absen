<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_absen extends CI_model
{
    public function absenSiswa()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $sql =
            "
            SELECT tg.guru_name, tk.kelas ,tp.pelajaran, su.url, tj.jurusan, ts.siswa_name, su.url
            FROM class_subjects cs
            JOIN tabel_guru tg ON tg.guru_id = cs.guru_id
            JOIN sub_teacher st ON st.teacher_id = tg.guru_id
            JOIN subjects_class sc ON sc.class_id = st.class_id
            JOIN subjects_group sg ON sg.group_id = sc.group_id
            JOIN subjects_url su ON su.url_id = sc.class_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN tabel_kelas tk ON tk.kelas_id = sc.kelas_id
            JOIN group_class gc ON gc.gc_id = sc.gc_id
            JOIN sub_student ss ON ss.gc_id = gc.gc_id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN user u ON  u.id = ts.siswa_id
            WHERE ts.siswa_id  = $user[id]
            ";
        $absen = $this->db->query($sql)->result_array();
        return $absen;
    }
}
