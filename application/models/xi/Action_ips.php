<?php
defined('BASEPATH') or exit('No direct script access allowed');

#KELAS XI (11)
class Action_ips extends CI_model
{
    /* ==================== Queri Menampilkan Kelas X Jurusan IPA MURID ========================== */
    public function ekonomi()
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
            WHERE tk.kelas_id = 2 AND tj.jurusan_id = 2 AND tp.pelajaran_id = 4 
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function geografi()
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
            WHERE tk.kelas_id = 2 AND tj.jurusan_id = 2 AND tp.pelajaran_id = 5
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    public function sosiologi()
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
            WHERE tk.kelas_id = 2 AND tj.jurusan_id = 2 AND tp.pelajaran_id = 6
            ";
        $siswa = $this->db->query($querySiswa)->result_array();
        return $siswa;
    }

    /* ====================== Input Data Absen Yang Hadir==================================== */

    public function absenEkonomi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 2;
        $pelajaran = 4;
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
        // var_dump($data);
        // die;
        $db = $this->db->insert(' absen_siswa ', $data);
        return $db;
    }

    public function absenGeografi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 2;
        $pelajaran = 5;
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

    public function absenSosiologi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $kelas = 2;
        $pelajaran = 6;
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
