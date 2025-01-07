<?php
session_start();
$config["server"] = 'localhost';
$config["username"] = 'root';
$config["password"] = '';
$config["database_name"] = 'cf_fc';

include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);

function _post($key, $val = null)
{
    global $_POST;
    return $_POST[$key] ?? $val;
}

function _get($key, $val = null)
{
    global $_GET;
    return $_GET[$key] ?? $val;
}

function _session($key, $val = null)
{
    global $_SESSION;
    return $_SESSION[$key] ?? $val;
}

$mod = _get('m');
$act = _get('act');
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
$GEJALA = [];
foreach ($rows as $row) {
    $GEJALA[$row->kode_gejala] = $row->nama_gejala;
}

$rows = $db->get_results("SELECT * FROM tb_diagnosa ORDER BY kode_diagnosa");
$DIAGNOSA = [];
foreach ($rows as $row) {
    $DIAGNOSA[$row->kode_diagnosa] = $row;
}

function get_terjawab()
{
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, jawaban FROM tb_konsultasi");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_gejala] = $row->jawaban;
    }
    return $arr;
}

function get_next_gejala($relasi)
{
    eliminate_relasi($relasi);
    foreach ($relasi as $key => $val) {
        foreach ($val as $k => $v) {
            if ($v == '')
                return $k;
        }
    }
    return false;
}

function get_relasi($terjawab)
{
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, r.kode_gejala 
        FROM tb_relasi r
        ORDER BY kode_diagnosa, r.kode_gejala");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_diagnosa][$row->kode_gejala] = $terjawab[$row->kode_gejala] ?? null;
    }
    return $arr;
}

function CF_get_diagnosa_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosa ORDER BY kode_diagnosa");
    $a = '';
    foreach ($rows as $row) {
        $a .= "<option value='$row->kode_diagnosa' " . ($row->kode_diagnosa == $selected ? "selected" : "") . ">[$row->kode_diagnosa] $row->nama_diagnosa</option>";
    }
    return $a;
}

function get_level_option($selected = '')
{
    $arr = [
        'admin' => 'Admin',
        'user' => 'User',
    ];
    $a = '';
    foreach ($arr as $key => $val) {
        $a .= "<option value='$key' " . ($selected == $key ? "selected" : "") . ">$val</option>";
    }
    return $a;
}

function CF_get_gejala_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    $a = '';
    foreach ($rows as $row) {
        $a .= "<option value='$row->kode_gejala' " . ($row->kode_gejala == $selected ? "selected" : "") . ">[$row->kode_gejala] $row->nama_gejala</option>";
    }
    return $a;
}

function set_value($key = null, $default = null)
{
    return $_POST[$key] ?? $_GET[$key] ?? $default;
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $query = "SELECT MAX(CAST(SUBSTRING($field, LENGTH('$prefix') + 1) AS UNSIGNED)) AS max_code FROM $table WHERE $field LIKE '$prefix%'";
    $var = $db->get_var($query);
    $next = (int)$var + 1;
    return $prefix . str_pad($next, $length, '0', STR_PAD_LEFT);
}

function esc_field($str)
{
    return $str ? addslashes($str) : $str;
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo '<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>';
}

function eliminate_relasi(&$relasi)
{
    foreach ($relasi as $key => $val) {
        $tidak = 0;
        foreach ($val as $k => $v) {
            if ($v == 'Tidak')
                $tidak++;
        }
        if ($tidak >= 2 || $tidak >= count($val) / 2)
            unset($relasi[$key]);
    }
}
?>
