
<style>
    .tagline {
        height: 80px;
        width: 100%;
        /*background-color: green;*/
        background-color: #CB99C9;
        padding-top: 50px;
        padding-bottom: 0px;
        font-size: 30px;
        color: #fff;
        font-style: italic;
    }
    .img-aboutus {
        border-radius: 50%;
    }
</style>

<!-- Main -->
<div id="main">
    
    <!-- One -->
    <section id="one">
        
        <div class="tagline">
            <center>
                "A preparation for mom to be the best mom"
            </center>
        </div>
        
        <div class="container">

            <h3>About Us</h3>
            <p align="justify">
                We're Professional team of physiotherapy with experiences in handling exercise for pregnant mother. Lending our hands to help you, mother to be, for a wonderful experience of being a mother in the future... We'll guide you for more healthy and energy during pregnancy and surely to..
            </p>
            <p style="font-size: 30px; font-weight: bold; color: #000;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Keep stay fit!
            </p>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/aboutus1.webp" style="max-width: 350px; max-height: 350px;" class="img-aboutus" />
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/aboutus2.webp" style="max-width: 350px; max-height: 350px;" class="img-aboutus" />
                    </center>
                </div>
            </div>

        </div>
    </section>
    
    <section id="trainer">
        <div class="container">

            <h3>Your Trainer</h3>
            <p>
                Welcome to our group and join our training session.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/muhammadfahim.png" style="max-width: 350px; max-height: 350px;" />
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/sitinurelyana.png" style="max-width: 350px; max-height: 350px;" />
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/sitinadiah.png" style="max-width: 350px; max-height: 350px;" />
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/herwina.png" style="max-width: 350px; max-height: 350px;" />
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <img src="<?= base_url(); ?>assets/images/izatulfazilah.png" style="max-width: 350px; max-height: 350px;" />
                    </center>
                </div>
            </div>

        </div>
    </section>
                        
    <?php 
            $i = 1;
            if (isset($post_page) && !empty($post_page)) {
                foreach ($post_page as $pp) {
                        ?>
            <section id="section_<?= $pp->pp_id; ?>">
                <div class="container">
                    <h3><?= $pp->pp_title; ?></h3>
                    <p><?= $pp->pp_post; ?></p>
                    <div class="row">
                        <?php if (isset($pp->pp_image1) && !empty($pp->pp_image1)) { ?>
                        <div class="col-md-4">
                            <a target="_blank" href="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image1; ?>">
                                <img style="max-width: 350px; max-height: 350px;" src="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image1; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (isset($pp->pp_image2) && !empty($pp->pp_image2)) { ?>
                        <div class="col-md-4">
                            <a target="_blank" href="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image2; ?>">
                                <img style="max-width: 350px; max-height: 350px;" src="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image2; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (isset($pp->pp_image3) && !empty($pp->pp_image3)) { ?>
                        <div class="col-md-4">
                            <a target="_blank" href="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image3; ?>">
                                <img style="max-width: 350px; max-height: 350px;" src="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image3; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (isset($pp->pp_image4) && !empty($pp->pp_image4)) { ?>
                        <div class="col-md-4">
                            <a target="_blank" href="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image4; ?>">
                                <img style="max-width: 350px; max-height: 350px;" src="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image4; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (isset($pp->pp_image5) && !empty($pp->pp_image5)) { ?>
                        <div class="col-md-4">
                            <a target="_blank" href="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image5; ?>">
                                <img style="max-width: 350px; max-height: 350px;" src="<?=base_url(); ?>assets/uploads/post/<?= $pp->pp_image5; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
                    
            <?php
            $i += 1;
                }
            }
            ?>

    <!-- Four -->
    <section id="four">
        <div class="container">
            <h3>Registration</h3>
            <form method="post" action="<?=site_url('utama/registerprocess'); ?>" enctype="multipart/form-data">
                <div class="row uniform">
                    <div class="6u 12u(xsmall)"><input type="text" name="name" id="name" placeholder="Name" required="" /></div>
                    <div class="6u 12u(xsmall)"><input type="text" name="ic" id="ic" placeholder="IC No." required="" /></div>
                </div>
                <div class="row uniform">
                    <div class="6u 12u(xsmall)"><input type="email" name="email" id="email" placeholder="Email" required="" /></div>
                    <div class="6u 12u(xsmall)"><input type="text" name="phone" id="phone" placeholder="Phone No." required="" /></div>
                </div>
                <div class="row uniform">
                    <div class="12u"><textarea name="address" id="address" placeholder="Address" rows="2"></textarea></div>
                </div>
                <div class="row uniform">
                    <div class="6u 12u(xsmall)"><input type="text" name="postcode" id="postcode" placeholder="Postcode" required="" /></div>
                    <div class="6u 12u(xsmall)">
                        <select name="state" id="state" required="">
                            <option value="">State</option>
                            <?php if (isset($negeri) && !empty($negeri)) { foreach ($negeri as $n) { ?>
                            <option value="<?=$n->n_id; ?>"><?=$n->n_desc; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="row uniform">
                    <div class="12u"><input type="file" name="resit" id="resit" class="form-control" placeholder="Phone No." required="" /></div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions">
                            <li><input type="submit" class="special" value="Submit" /></li>
                            <li><input type="reset" value="Reset" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>





