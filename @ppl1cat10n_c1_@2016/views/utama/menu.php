<!-- Header -->
<section id="header">
    <header>
        <span class="image avatar"><img src="<?= base_url(); ?>assets/images/fitness.png" alt="" /></span>
        <h1 id="logo"><a href="#">Welcome to Nine.40</a></h1>
        <p>Future Mom's Fitness</p>
    </header>
    <nav id="nav">
        <ul>
            <?php 
            $i = 1;
            if (isset($post_page) && !empty($post_page)) {
                foreach ($post_page as $pp) {
                    if ($i == 1) {
                        ?>
            <li><a href="#one"><?=$pp->pp_title; ?></a></li>
            <?php
                    } else {
                    ?>
            <li><a href="#section_<?=$pp->pp_id; ?>"><?=$pp->pp_title; ?></a></li>
            <?php
                    }
            $i += 1;
                }
            }
            ?>
            
            <li><a href="#four">Registration</a></li>
            <li><a href="<?=site_url('utama/loginpage'); ?>?page=login" <?php if ($page1 == 'login') { ?>class="active"<?php } ?>>Log In</a></li>
        </ul>
    </nav>
    <footer>
        <ul class="icons">
            <li><a target="_blank" href="https://www.facebook.com/Momsfit-1697382293860337/" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#!" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#!" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#!" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#!" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</section>