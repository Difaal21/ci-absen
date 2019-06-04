<?php
defined('BASEPATH') or exit('No direct script access allowed');

#KELAS X (10)
class Action_ipa extends CI_model
{
    public function biologi()
    {
        $querySiswa =
            "
            SELECT u.username, ts.siswa_name, tk.kelas, tj.jurusan, tp.pelajaran
            FROM tabel_siswa ts
            JOIN user u ON u.id = ts.siswa_id
            JOIN sub_student ss ON ss.student_id = ts.siswa_id
            JOIN tabel_kelas tk ON tk.kelas_id = ss.kelas_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
            JOIN subjects_group sg ON sg.jurusan_id = tj.jurusan_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            WHERE tk.kelas_id = 1 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 1  
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function absenBiologi()
    {
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
            ";
        $absenBiologi = $this->db->query($sql)->result_array();
        return $absenBiologi;
    }

    public function fisika()
    {
        $querySiswa =
            "
            SELECT u.username, ts.siswa_name, tk.kelas, tj.jurusan, tp.pelajaran
            FROM tabel_siswa ts
            JOIN user u ON u.id = ts.siswa_id
            JOIN sub_student ss ON ss.student_id = ts.siswa_id
            JOIN tabel_kelas tk ON tk.kelas_id = ss.kelas_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
            JOIN subjects_group sg ON sg.jurusan_id = tj.jurusan_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            WHERE tk.kelas_id = 1 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 2  
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function kimia()
    {
        $querySiswa =
            "
            SELECT u.username, ts.siswa_name, tk.kelas, tj.jurusan, tp.pelajaran
            FROM tabel_siswa ts
            JOIN user u ON u.id = ts.siswa_id
            JOIN sub_student ss ON ss.student_id = ts.siswa_id
            JOIN tabel_kelas tk ON tk.kelas_id = ss.kelas_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = ss.jurusan_id
            JOIN subjects_group sg ON sg.jurusan_id = tj.jurusan_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            WHERE tk.kelas_id = 1 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 3
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }
}
