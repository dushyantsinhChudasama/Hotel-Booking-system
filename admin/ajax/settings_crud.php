<?php
require('../../db_Connect.php');
session_start(); // ✅ important

if (!isset($_SESSION['adminID']) || $_SESSION['loginAdmin'] !== true) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM settings WHERE id = ?";
    $values = [1];
    $res = select($q, $values, 'i');
    $data = mysqli_fetch_assoc($res);

    
    echo json_encode($data);
}

if(isset($_POST['upd_general']))
{
    $frm_data = filteration($_POST);

    $q = "UPDATE settings SET `site_title` =?, `site_about` =? WHERE `id`=?";
    $values = [$frm_data['site_title'],$frm_data['site_about'],1];
    $res = update($q,$values,"ssi");

    echo $res;
}


if(isset($_POST['get_contacts']))
{
    $q = "SELECT * FROM contact_details WHERE `id`=?";
    $values = [1];
    $res = select($q,$values,'i');
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;    
}

if(isset($_POST['upd_contacts']))
{
    $frm_data = filteration($_POST);
    $q = "UPDATE contact_details SET `address`=?,`gmap`=?,`pn1`=?,`pn2`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,`ifrmae`=? WHERE `id`=?" ;
    $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['pn1'],$frm_data['pn2'],$frm_data['email'],$frm_data['fb'],$frm_data['insta'],$frm_data['tw'],$frm_data['iframe'], 1];  
    $res = update($q,$values,'sssssssssi');

    echo $res;
}

if(isset($_POST['upd_shutdown']))
    {
        $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;

        $q = "UPDATE `settings` SET `shutdown`=? WHERE `id`=?";
        $values = [$frm_data, 1];  // Make sure it's an array!
        $res = update($q, $values, 'ii');  // Corrected: Pass $values, not $res
        echo $res;
    }
?>
