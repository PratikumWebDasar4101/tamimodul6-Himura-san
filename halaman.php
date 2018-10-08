<?php
    require("header.php");
    if (isset($_GET['hal'])) {

        if ($_GET['hal'] == "edit_profile")
            require("edit_profile.php");

        // =============================================
        
        if ($_GET['hal'] == "tambah_posting")
            require("tambah_posting.php");
        
        if ($_GET['hal'] == "edit_posting")
            require("edit_posting.php");

        // =============================================

        if ($_GET['hal'] == "view_posting")
            require("view_posting.php");
        
        if ($_GET['hal'] == "view_all_posting")
            require("view_all_posting.php");
    } else {
        require("home.php");
    }
?>