<?php
defined('BASEPATH') or exit('No direct script access allowed');

#KELAS XII (12)
class Action_ipa extends CI_model
{  /* ==================== Queri Menampilkan Kelas X Jurusan IPA MURID ========================== */
    public function biologi()
    {
        $querySiswa =
            "
            SELECT * FROM absen_siswa asis 
            JOIN class_subjects cs ON cs.subjects_id = asis.subjects_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = asis.pelajaran_id
            JOIN tabel_kelas tk ON tk.kelas_id = asis.kelas_id 
            JOIN tabel_absen ta ON ta.absen_id = asis.absen_id
            JOIN subjects_group sg ON sg.pelajaran_id = tp.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN user u ON u.username = asis.username
            JOIN sub_student ss ON ss.student_id = u.id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN tabel_konfirmasi tkon ON tkon.konfirmasi_id = asis.konfirmasi_id
            WHERE tk.kelas_id = 3 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 1 
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function fisika()
    {
        $querySiswa =
            "
            SELECT * FROM absen_siswa asis 
            JOIN class_subjects cs ON cs.subjects_id = asis.subjects_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = asis.pelajaran_id
            JOIN tabel_kelas tk ON tk.kelas_id = asis.kelas_id 
            JOIN tabel_absen ta ON ta.absen_id = asis.absen_id
            JOIN subjects_group sg ON sg.pelajaran_id = tp.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN user u ON u.username = asis.username
            JOIN sub_student ss ON ss.student_id = u.id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN tabel_konfirmasi tkon ON tkon.konfirmasi_id = asis.konfirmasi_id
            WHERE tk.kelas_id = 3 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 2
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function kimia()
    {
        $querySiswa =
            "
            SELECT * FROM absen_siswa asis 
            JOIN class_subjects cs ON cs.subjects_id = asis.subjects_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = asis.pelajaran_id
            JOIN tabel_kelas tk ON tk.kelas_id = asis.kelas_id 
            JOIN tabel_absen ta ON ta.absen_id = asis.absen_id
            JOIN subjects_group sg ON sg.pelajaran_id = tp.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN user u ON u.username = asis.username
            JOIN sub_student ss ON ss.student_id = u.id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN tabel_konfirmasi tkon ON tkon.konfirmasi_id = asis.konfirmasi_id
            WHERE tk.kelas_id = 3 AND tj.jurusan_id = 1 AND tp.pelajaran_id = 1 
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }



    /* ====================== Input Data Absen Yang Hadir==================================== */

    public function absenBiologi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 3;
        $pelajaran = 1;
        $data =
            [
                'username'          => $user['username'],
                'pelajaran_id'      => $pelajaran,
                'kelas_id'          => $kelas,
                'subjects_id'       => $kelas + ($pelajaran * 3),
                'tanggal'           => date('d F Y'),
                'jam'               => date('H:i:s'),
                'absen_id'          => 1, //Hadir
                'keterangan'        => "-",
                'konfirmasi_id'     => 3,
            ];
        $db = $this->db->insert(' absen_siswa ', $data);
        return $db;
    }

    public function absenFisika()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 3;
        $pelajaran = 2;
        $data =
            [
                'username'          => $user['username'],
                'pelajaran_id'      => $pelajaran,
                'kelas_id'          => $kelas,
                'subjects_id'       => $kelas + ($pelajaran * 3),
                'tanggal'           => date('d F Y'),
                'jam'               => date('H:i:s'),
                'absen_id'          => 1, //Hadir
                'keterangan'        => "-",
                'konfirmasi_id'     => 3,
            ];
        $db = $this->db->insert(' absen_siswa ', $data);
        return $db;
    }

    public function absenKimia()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 3;
        $pelajaran = 3;
        $data =
            [
                'username'          => $user['username'],
                'pelajaran_id'      => $pelajaran,
                'kelas_id'          => $kelas,
                'subjects_id'       => $kelas + ($pelajaran * 3),
                'tanggal'           => date('d F Y'),
                'jam'               => date('H:i:s'),
                'absen_id'          => 1, //Hadir
                'keterangan'        => "-",
                'konfirmasi_id'     => 3,
            ];
        $db = $this->db->insert(' absen_siswa ', $data);
        return $db;
    }
}
