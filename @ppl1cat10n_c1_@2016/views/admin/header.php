<!DOCTYPE HTML>
<!--
        Read Only by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Nine 40 Trainer</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="<?= base_url(); ?>assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="<?= base_url(); ?>assets/css/ie8.css" /><![endif]-->
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/fitness.png">
        
        <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="<?php echo base_url() . 'assets/js/jquery-1.11.1.js' ?>"></script> 
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootigniter.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/encryption.js' ?>"></script> 
        <script src="<?php echo base_url() . 'assets/js/jquery.zclip.js' ?>"></script> 
        <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.scrollzer.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.scrolly.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/skel.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="<?= base_url(); ?>assets/js/main.js"></script>
        
        <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js' ?>"></script>
        
        <script>
            function ask(q) {
                return confirm(q);
            }
            
            $(document).ready(function () {
                var options = {
                        "backdrop" : "true"
                }
                $('#basicModalError').modal(options);
	
                var options2 = {
                        "backdrop" : "false",
                        "show" : false
                }
                $('#basicModalQuestion').modal(options2);
            });
        </script>
        
    </head>
    <body>

        <!-- Wrapper -->
        <div id="wrapper">