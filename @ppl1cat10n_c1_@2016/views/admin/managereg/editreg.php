<!-- Main -->
<div id="main">

    <!-- Two -->
    <section id="two">
        <div class="container">

            <table width="100%">
                <tr>
                    <td><h3>Manage Registration</h3></td>
                </tr>
                <tr>
                    <td height="600">
                        <p>
                            
                            <a href="<?=site_url('admin/index?page=one1'); ?>">
                                <button type="button" class="button green-button"> &lt;&lt; Back </button>
                            </a>
                            
                        <table>
                            <?php
                            if (isset($seminar_registration) && !empty($seminar_registration)) {
                                    foreach ($seminar_registration as $sr) {
//                                        print_r($sr);
                                        $sr_id = $sr->sr_id;
                                        $sr_idx = $this->my_func->n4t_encrypt($sr_id);
                                        $srid = $this->my_func->format_digit($sr_id);
                            ?>
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <th>N4T<?=$srid; ?></th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <th><?=$sr->sr_name; ?></th>
                            </tr>
                            <tr>
                                <td>IC No.</td>
                                <td>:</td>
                                <th><?=$sr->sr_icno; ?></th>
                            </tr>
                            <tr>
                                <td>E-Mail Address</td>
                                <td>:</td>
                                <th><?=$sr->sr_email; ?></th>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td>:</td>
                                <th><?=$sr->sr_phone; ?></th>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <th><?=$sr->sr_address; ?></th>
                            </tr>
                            <tr>
                                <td>Postcode</td>
                                <td>:</td>
                                <th><?=$sr->sr_poskod; ?></th>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>:</td>
                                <th><?=$sr->n_desc; ?></th>
                            </tr>
                            <tr>
                                <td>Receipt</td>
                                <td>:</td>
                                <th>
                                    <a target="_blank" href="<?= base_url(); ?>assets/uploads/resit/<?= $sr->sr_resit; ?>">
                                        VIEW Receipt
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <th>
                                    <?= $sr->srs_desc; ?>
                                    <br />
                                    <?php
                                    $srs_id = $sr->srs_id;
                                    if ($srs_id == 1) {
                                    ?>
                                    <a onclick="return ask('Are you sure want to approve this?');" href="<?=site_url('admin/index/approve/?sr='.$sr_idx); ?>">
                                        [ Click to approve <span class="fa fa-check"></span> ]
                                    </a>
                                    <br />
                                    <a onclick="return ask('Are you sure want to reject this?');" href="<?=site_url('admin/index/delete/?sr='.$sr_idx); ?>">
                                        [ Click to reject <span class="fa fa-remove"></span> ]
                                    </a>
                                    <?php } else if ($srs_id == 2) { ?>
                                    <a onclick="return ask('Are you sure want to reject this?');" href="<?=site_url('admin/index/delete/?sr='.$sr_idx); ?>">
                                        [ Click to reject <span class="fa fa-remove"></span> ]
                                    </a>
                                    <?php } else if ($srs_id == 3) { ?>
                                    <a onclick="return ask('Are you sure want to approve this?');" href="<?=site_url('admin/index/approve/?sr='.$sr_idx); ?>">
                                        [ Click to approve <span class="fa fa-check"></span> ]
                                    </a>
                                    <?php } ?>
                                </th>
                            </tr>
                            <?php } } ?>
                        </table>
                                
                        </p>
                    </td>
                </tr>
            </table>
            
        </div>
    </section>
    
</div>