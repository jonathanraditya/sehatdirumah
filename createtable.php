<?php

include('connect.php');

$table_landing_table="create table landing_table(
    isocode varchar(100),
    t varchar(100),
    t_inc varchar(100),
    tr varchar(100),
    tr_inc varchar(100),
    td varchar(100),
    td_inc varchar(100),
    ld_sd varchar(100),
    ld_ed varchar(100),
    ld_gspeed varchar(10000),
    t_1jt int(15),
    t_1jt_gbr int(15),
    td_1jt_gbr int(15),
    tr_1jt_gbr int(15),
    jarak varchar(500),
    beban_rs varchar(500),
    hsl_beban_rs varchar(500))";

$table_rank="create table rank_sembuhmeninggal(
    isocode varchar(100),
    zero varchar(100),
    zero_s varchar(100),
    one varchar(100),
    one_s varchar(100),
    two varchar(100),
    two_s varchar(100),
    three varchar(100),
    three_s varchar(100),
    four varchar(100),
    four_s varchar(100),
    five varchar(100),
    five_s varchar(100),
    six varchar(100),
    six_s varchar(100),
    seven varchar(100),
    seven_s varchar(100),
    eight varchar(100),
    eight_s varchar(100),
    nine varchar(100),
    nine_s varchar(100))";
    
$table_rank_urutan_dynamic="create table rank_urutan_dynamic(
    nama_tabel varchar(100),
    zero varchar(500),
    one varchar(500),
    two varchar(500),
    three varchar(500),
    four varchar(500),
    five varchar(500),
    six varchar(500),
    seven varchar(500),
    eight varchar(500),
    nine varchar(500))";
    
$table_rank_urutan_static="create table rank_urutan_static(
    nama_tabel varchar(100),
    urutan varchar(500))";
    
$table_landing_urutan_jarak="create table landing_urutan_jarak(
    urutan varchar(1000))";
    
$table_kes_demografi="create table kes_demografi(
    isocode varchar(100),
    jml_penduduk int(15),
    luas_wilayah int(15),
    jumlah_dokter int(15),
    jumlah_perawat int(15),
    jumlah_rs int(15),
    rasio_tempat_tidur int(15),
    jumlah_tempat_tidur int(15),
    bor int(15),
    waktu_rs varchar(100))";
    
$table_rg_view="create table rg_view(
    isocode varchar(1000),
    t varchar(1000),
    tr varchar(1000),
    td varchar(1000),
    t_inc varchar(1000),
    tr_inc varchar(1000),
    td_inc varchar(1000),
    t_rank varchar(1000),
    tr_rank varchar(1000),
    td_rank varchar(1000),
    t_id varchar(1000),
    tr_id varchar(1000),
    td_id varchar(1000),
    t_per_id varchar(1000),
    tr_per_id varchar(1000),
    td_per_id varchar(1000),
    catatan_kaki varchar(1000))";
    
$table_rg_rank_urutan="create table rg_rank_urutan(
    isocode varchar(1000),
    kasus1jt varchar(1000),
    kasus1jt_st varchar(1000),
    kapasitasrs varchar(1000),
    kapasitasrs_st varchar(1000),
    wakturs varchar(1000),
    wakturs_st varchar(1000),
    jarak1pasien varchar(1000),
    jarak1pasien_st varchar(1000),
    dokterpasien varchar(1000),
    dokterpasien_st varchar(1000),
    perawatpasien varchar(1000),
    perawatpasien_st varchar(1000))";
    
$table_rg_datavis="create table rg_datavis(
    isocode varchar(100),
    c0_line varchar(2000),
    c0_line_scale varchar(100),
    c0_bar varchar(2000),
    c0_bar_scale varchar(100),
    c0_chart_date_id varchar(100),
    c0_chart_date_en varchar(100),
    c1_line varchar(2000),
    c1_line_scale varchar(100),
    c1_bar varchar(2000),
    c1_bar_scale varchar(100),
    c1_chart_date_id varchar(100),
    c1_chart_date_en varchar(100),
    c1_heatmap_hsl varchar(2000),
    c1_heatmap_val varchar(2000),
    c1_heatmap_date_id varchar(100),
    c1_heatmap_date_en varchar(100),
    c2_line varchar(2000),
    c2_line_scale varchar(100),
    c2_bar varchar(2000),
    c2_bar_scale varchar(100),
    c2_chart_date_id varchar(100),
    c2_chart_date_en varchar(100),
    c2_heatmap_hsl varchar(2000),
    c2_heatmap_val varchar(2000),
    c2_heatmap_date_id varchar(100),
    c2_heatmap_date_en varchar(100),
    c3_line varchar(2000),
    c3_line_scale varchar(100),
    c3_bar varchar(2000),
    c3_bar_scale varchar(100),
    c3_chart_date_id varchar(100),
    c3_chart_date_en varchar(100),
    c3_heatmap_hsl varchar(2000),
    c3_heatmap_val varchar(2000),
    c3_heatmap_date_id varchar(100),
    c3_heatmap_date_en varchar(100))";
    
$table_rg_logo="create table rg_logo(
    isocode varchar(100),
    alt varchar(500),
    link varchar(500))";
    
$table_rg_landing="create table rg_landing(
    region varchar(3000),
    t varchar(3000),
    persen_aktif varchar(3000),
    kapasitas_rs varchar(3000),
    t_id varchar(3000),
    persen_aktif_id varchar(3000),
    kapasitas_rs_id varchar(3000),
    t_per_id varchar(3000),
    persen_aktif_per_id varchar(3000),
    kapasitas_rs_per_id varchar(3000),
    line_chart varchar(3000),
    line_chart_scale varchar(3000),
    bar_chart varchar(3000),
    bar_chart_scale varchar(3000),
    chart_date_id varchar(3000),
    chart_date_en varchar(3000))";
    
$table_catatan_kaki="create table catatan_kaki(
    no int(15),
    head varchar(1000),
    content varchar(20000))";
    
$table_atribut_hak_cipta="create table atribut_hak_cipta(
    type varchar(200),
    author varchar(3000),
    link varchar(3000))";
    
$table_sumber_data="create table sumber_data(
    no int(15),
    head varchar(2000),
    link varchar(2000))";
    
$tabel_rank_function="create table rank_function(
    nama_tabel varchar(200),
    nama_fungsi varchar(200),
    sort_direction varchar(200))";

$tabel_rank_static_function="create table rank_static_function(
    nama_tabel varchar(200),
    sort_direction varchar(200))";
    
$tabel_meta="create table meta(
    no varchar(100),
    full_link varchar(1000),
    title varchar(500),
    description varchar(1000))";
    
if($con->query($tabel_meta)==TRUE){
    echo "tabel berhasil dibuat";
} else {
    echo "Cek lagi ".$con->error;
}

$con->close();






?>