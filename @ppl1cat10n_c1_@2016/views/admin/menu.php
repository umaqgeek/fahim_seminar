<!-- Header -->
<section id="header">
    <header>
        <span class="image avatar"><img src="<?= base_url(); ?>assets/images/fitness.png" alt="" /></span>
        <h1 id="logo"><a href="#">Willis Corto</a></h1>
        <p>I got reprogrammed by a rogue AI<br />
            and now I'm totally cray</p>
    </header>
    <nav id="nav">
        <ul>
            <li><a href="<?=site_url('admin/index'); ?>?page=one1" 
                <?php if ($page1 == 'one1') { ?>class="active"<?php } ?>>Manage Post</a></li>
            <li><a href="<?=site_url('admin/manageregistration'); ?>?page=two" 
                   <?php if ($page1 == 'two') { ?>class="active"<?php } ?>>Manage Registration</a></li>
            <li><a href="<?=site_url('admin/logout'); ?>">Log Out</a></li>
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