<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_absen extends CI_model
{
    public function queryAbsen()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $sql =
            "
            SELECT *
            FROM class_subjects cs
            JOIN sub_teacher st ON st.subjects_id = cs.subjects_id
            JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
            JOIN subjects_class sc ON sc.subjects_id = cs.subjects_id
            JOIN subjects_group sg ON sg.group_id = sc.group_id
            JOIN subjects_url su ON su.url_id = sc.class_id
            JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
            JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id
            JOIN tabel_kelas tk ON tk.kelas_id = st.kelas_id
            JOIN group_class gc ON gc.gc_id = sc.gc_id
            JOIN sub_student ss ON ss.gc_id = gc.gc_id
            JOIN tabel_siswa ts ON ts.siswa_id = ss.student_id
            JOIN user u ON  u.id = ts.siswa_id
            JOIN absen_url au ON au.au_id = su.url_id
            WHERE ts.siswa_id  = $user[id]
            ORDER BY tp.pelajaran_id ASC
            ";
        $absen = $this->db->query($sql)->result_array();
        return $absen;
    }

    public function getDataAbsen()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $query =
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
            JOIN sub_teacher st ON st.subjects_id = cs.subjects_id
            JOIN tabel_guru tg ON tg.guru_id = st.teacher_id
            WHERE st.teacher_id = $user[id]
            ORDER BY asis.tanggal ASC
            ";
        $absen = $this->db->query($query)->result_array();
        return $absen;
    }
    /* ========================= Merubah (Update) tombol Absen =============================================  */
    public function changeAction($data, $where)
    {
        $this->db->set($data);
        $this->db->where('as_id', $where);
        return $this->db->update('absen_siswa');
    }

    /*========================= Input Keterangan tidak masuk ========================================= */
    public function keterangan_absen()
    {
        $data =
            [
                'username'          => $this->input->post('username'),
                'pelajaran_id'      => $this->input->post('pelajaran_id'),
                'kelas_id'          => $this->input->post('kelas_id'),
                'subjects_id'       => $this->input->post('kelas_id') + ($this->input->post('pelajaran_id') * 3),
                'tanggal'           => date('d F Y'),
                'jam'               => date('H:i:s'),
                'absen_id'          => $this->input->post('absen_id'),
                'keterangan'        => $this->input->post('keterangan'),
                'konfirmasi_id'     => 3,
            ];
        $db = $this->db->insert('absen_siswa ', $data);
        return $db;
    }

    /*========================== Query Agar Siswa tidak dapat login 2 kali  ===========================*/

    /*------------------------ IPA ------------------------- */
    public function subjectsBiologi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa asis WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (4,5,6)");
        return $query;
    }

    public function subjectsFisika()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (7,8,9)");
        return $query;
    }

    public function subjectsKimia()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (10,11,12)");
        return $query;
    }

    /*------------------------ IPS ------------------------- */
    public function subjectsEkonomi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (13,14,15)");
        return $query;
    }

    public function subjectsGeografi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (16,17,18)");
        return $query;
    }

    public function subjectsSosiologi()
    {
        $user   = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $date = date('d F Y');
        $query = $this->db->query("SELECT * FROM absen_siswa WHERE username = '$user[username]'  AND tanggal =  '$date' AND subjects_id IN (19,20,21)");
        return $query;
    }

    /* ============================================================================================ */
}
