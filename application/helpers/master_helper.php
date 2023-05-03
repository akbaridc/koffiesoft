<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('where_count')) {
    function where_count($table, $where)
    {
        $app = &get_instance();
        return $app->db->get_where($table, $where)->num_rows();
    }
}
if (!function_exists('where_row')) {
    function where_row($table, $where)
    {
        $app = &get_instance();
        return $app->db->get_where($table, $where)->row();
    }
}
if (!function_exists('where_result')) {
    function where_result($table, $where)
    {
        $app = &get_instance();
        return $app->db->order_by('id', 'desc')->get_where($table, $where)->result();
    }
}
if (!function_exists('show_data')) {
    function show_data($table)
    {
        $app = &get_instance();
        return $app->db->order_by('id', 'desc')->get($table)->result();
    }
}
if (!function_exists('where_count')) {
    function where_count($table, $where)
    {
        $app = &get_instance();
        return $app->db->get_where($table, $where)->num_rows();
    }
}
if (!function_exists('count_table')) {
    function count_table($table)
    {
        $app = &get_instance();
        return $app->db->get($table)->num_rows();
    }
}
if (!function_exists('insert_table')) {
    function insert_table($table, $data)
    {
        $app = &get_instance();
        return $app->db->insert($table, $data);
    }
}
if (!function_exists('update_table')) {
    function update_table($table, $data, $where)
    {
        $app = &get_instance();
        return $app->db->update($table, $data, $where);
    }
}
if (!function_exists('post')) {
    function post($record)
    {
        $app = &get_instance();
        $data = $app->input->post();
        return filter_var($data[$record]);
    }
}
if (!function_exists('create_pass')) {
    function create_pass($record)
    {
        $app = &get_instance();
        $p = password_hash($record, PASSWORD_DEFAULT);
        return $p;
    }
}

if (!function_exists("cek_post")) {
    function cek_post()
    {
        $app = &get_instance();
        $data = $app->input->post();
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            redirect("forbiden");
        }
    }
}
if (!function_exists("cek_session")) {
    function cek_session()
    {
        $app = &get_instance();
        $data = $app->session->userdata();
        if ($data['login'] != TRUE) {
            redirect("login");
        } else {
            return TRUE;
        }
    }
}
if (!function_exists("rupiah")) {
    function rupiah($number)
    {
        $app = &get_instance();
        return "Rp. " . number_format($number, 0, '.', ',');
    }
}

if (!function_exists("formatRupiahExceptRp")) {
    function formatRupiahExceptRp($number)
    {
        $app = &get_instance();
        return number_format($number, 0, '.', ',');
    }
}

if (!function_exists("inActiveMember")) {
    function inActiveMember()
    {
        $app = &get_instance();
        if ($_SESSION['loginTime'] < time() + 5 * 60) {
            echo json_encode('asu');
            // update_table('member', [
            //   'is_login' => 0
            // ], ['id_member' => $app->session->userdata('members')->id_member]);

            // $app->session->sess_destroy();
            // redirect('/');
        }
    }
}



if (!function_exists('tgl_indo')) {
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
        }
    }
}

//Format Shortdate
if (!function_exists('shortdate_indo')) {
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '/' . $bulan . '/' . $tahun;
    }
}

if (!function_exists('short_bulan')) {
    function short_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if (!function_exists('mediumdate_indo')) {
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('medium_bulan')) {
    function medium_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Long date indo Format
if (!function_exists('longdate_indo')) {
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari . ',' . $tgl . ' ' . $bulan . ' ' . $thn;
    }
}

if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime)
    {

        date_default_timezone_set('Asia/Jakarta');

        $etime = time() - strtotime($datetime);
        if ($etime < 1) {
            return 'just now';
        }

        $a = array(
            12 * 30 * 24 * 60 * 60  => 'years',
            30 * 24 * 60 * 60       =>  'months',
            24 * 60 * 60            =>  'days',
            60 * 60             =>  'hours',
            60                  =>  'minutes',
            1                   =>  'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;

            if ($d >= 1) {
                $r = round($d);
                return  $r . ' ' . $str . ($r > 1 ? '' : '') . ' ago';
            }
        }
    }
}
