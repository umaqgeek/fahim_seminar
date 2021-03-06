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
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID<br />Name</th>
                                    <th>Phone No.</th>
                                    <th>Resit</th>
                                    <th>Date Reg.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (isset($seminar_registration) && !empty($seminar_registration)) {
                                    foreach ($seminar_registration as $sr) {
                                        $sr_id = $sr->sr_id;
                                        $sr_idx = $this->my_func->n4t_encrypt($sr_id);
                                        $srid = $this->my_func->format_digit($sr_id);
                                        ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>
                                                N4T<?=$srid; ?>
                                                <br />
                                                <?= $sr->sr_name; ?>
                                            </td>
                                            <td><?= $sr->sr_phone; ?></td>
                                            <td>
                                                <a target="_blank" href="<?= base_url(); ?>assets/uploads/resit/<?= $sr->sr_resit; ?>">
                                                    Receipt
                                                </a>
                                            </td>
                                            <td><?= $this->my_func->sql_time_to_datetime($sr->sr_datetime); ?></td>
                                            <td><?= $sr->srs_desc; ?></td>
                                            <td>
                                                <a href="<?=site_url('admin/index/edit/?page=one1&sr='.$sr_idx); ?>">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <?php
                                                $srs_id = $sr->srs_id;
                                                if ($srs_id == 1) {
                                                ?>
                                                <a onclick="return ask('Are you sure want to approve this?');" href="<?=site_url('admin/index/approve/?sr='.$sr_idx); ?>">
                                                    <span class="fa fa-check"></span>
                                                </a>
                                                <a onclick="return ask('Are you sure want to reject this?');" href="<?=site_url('admin/index/delete/?sr='.$sr_idx); ?>">
                                                    <span class="fa fa-remove"></span>
                                                </a>
                                                <?php } else if ($srs_id == 2) { ?>
                                                <a onclick="return ask('Are you sure want to reject this?');" href="<?=site_url('admin/index/delete/?sr='.$sr_idx); ?>">
                                                    <span class="fa fa-remove"></span>
                                                </a>
                                                <?php } else if ($srs_id == 3) { ?>
                                                <a onclick="return ask('Are you sure want to approve this?');" href="<?=site_url('admin/index/approve/?sr='.$sr_idx); ?>">
                                                    <span class="fa fa-check"></span>
                                                </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                        </p>
                    </td>
                </tr>
            </table>
            
        </div>
    </section>
    
</div>

<script>
    $(document).ready(function () {
        $("#table1").DataTable();
    });
</script>