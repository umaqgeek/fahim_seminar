
<!-- Main -->
<div id="main">

    <?php 
    if (isset($post_page) && !empty($post_page)) {
        foreach ($post_page as $pp) {
            ?>
    
    
    
    <?php
        }
    }
    ?>
    
    <?php 
            $i = 1;
            if (isset($post_page) && !empty($post_page)) {
                foreach ($post_page as $pp) {
                    if ($i == 1) {
                        ?>
                    <!-- One -->
                    <section id="one">
                        <div class="container">
                            <h3><?=$pp->pp_title; ?></h3>
                            <p><?=$pp->pp_post; ?></p>
                        </div>
                    </section>
            <?php
                    } else {
                    ?>
                    <!-- One -->
                    <section id="section_<?=$pp->pp_id; ?>">
                        <div class="container">
                            <h3><?=$pp->pp_title; ?></h3>
                            <p><?=$pp->pp_post; ?></p>
                        </div>
                    </section>
            <?php
                    }
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
                    <div class="6u 12u(xsmall)"><input type="email" name="email" id="email" placeholder="Email" required="" /></div>
                </div>
                <div class="row uniform">
                    <div class="12u"><input type="text" name="phone" id="phone" placeholder="Phone No." required="" /></div>
                </div>
                <div class="row uniform">
                    <div class="12u"><textarea name="address" id="address" placeholder="Address" rows="6"></textarea></div>
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





