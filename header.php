<?php
    require("config.php");
    session_start();
    
    if (!$_SESSION['sukses'])
        header("Location: index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TA6</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div id="title"><b>Aplikasi Posting</b></div>
            <div id="menu-utama">
                <ul>
                    <li><a href="halaman.php">Home</a></li>
                    <li><a href="?hal=view_posting">View My Posting</a></li>
                    <li><a href="?hal=view_all_posting">View All Posting</a></li>
                </ul>
            </div>
            <div id="menu-kanan">
                <ul>
                    <li><a href="?hal=tambah_posting">Tambah Posting</a></li>
                    <li><a href="?hal=edit_profile">Edit Profile</a></li>
                    <li><a href="index.php?exit=logout">Logout</a></li>
                </ul>
            </div>
        </header>