<!-- Main -->
<div id="main">

    <!-- Two -->
    <section id="one1">
        <div class="container" style="overflow-x: scroll;">
            <table width="100%">
                <tr>
                    <td><h3>Manage Post</h3></td>
                </tr>
                <tr>
                    <td height="600">
                        <p>
                            <a href="<?=site_url('admin/managepost/add?page=two'); ?>">
                                <button type="button" class="button green-button"> <span class="fa fa-plus"></span> Add Post </button>
                            </a>
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Post</th>
                                    <th>Date Created</th>
                                    <th>Priority</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (isset($post_page) && !empty($post_page)) {
                                    foreach ($post_page as $pp) {
                                        $pp_id = $pp->pp_id;
-                                        $pp_idx = $this->my_func->n4t_encrypt($pp_id);
                                        ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $pp->pp_title; ?></td>
                                            <td><?php 
                                            $pp_post = $pp->pp_post;
                                            if (strlen($pp_post) > 10) {
                                                echo substr($pp_post, 0, 10) . " ...";
                                            } else {
                                                echo $pp_post;
                                            }
                                            ?></td>
                                            <td><?= $this->my_func->sql_time_to_datetime($pp->pp_datetime); ?></td>
                                            <td><?= $pp->pp_priority; ?></td>
                                            <td>
                                                <a href="<?=site_url('admin/managepost/edit/?page=two&pp='.$pp_idx); ?>">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                &nbsp;
                                                <a onclick="return ask('Are you sure want to delete this?');" href="<?=site_url('admin/managepost/delete/?page=two&pp='.$pp_idx); ?>">
                                                    <span class="fa fa-times"></span>
                                                </a>
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