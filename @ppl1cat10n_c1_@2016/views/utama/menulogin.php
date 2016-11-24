<!-- Header -->
<section id="header">
    <header>
        <span class="image avatar"><img src="<?= base_url(); ?>assets/images/fitness.png" alt="" /></span>
        <h1 id="logo"><a href="#">Welcome to Nine.40</a></h1>
        <p>Future Mom's Fitness</p>
    </header>
    <nav id="nav">
        <ul>
            <li><a href="<?=site_url('utama/index'); ?>#one">Main Page</a></li>
            <li><a href="<?=site_url('utama/loginpage'); ?>?page=login" <?php if ($page1 == 'login') { ?>class="active"<?php } ?>>Log In</a></li>
        </ul>
    </nav>
    <footer>
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</section>