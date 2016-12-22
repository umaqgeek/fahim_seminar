
<!-- Main -->
<div id="main">

    <!-- Two -->
    <section id="one1">
        <div class="container" style="overflow-x: scroll;">
            <table width="100%">
                <tr>
                    <td><h3>Edit Post</h3></td>
                </tr>
                <tr>
                    <td height="600">
                        <p>

                            <a href="<?=site_url('admin/managepost?page=two'); ?>">
                                <button type="button" class="button green-button"> &lt;&lt; Back </button>
                            </a>
                            
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="pp" value="<?=$ppid; ?>" />
                            <table>
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                    <td>
                                        <input value="<?=$pp->pp_title; ?>" type="text" name="pp_title" placeholder="Insert post title." required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="pp_post" placeholder="Insert post here." rows="2" required=""><?=  str_replace("<br />", "\n", $pp->pp_post); ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image 1</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (isset($pp->pp_image1) && !empty($pp->pp_image1)) { ?>
                                        <img style="max-height: 200px; max-width: 200px;" src="<?=base_url(); ?>assets/uploads/post/<?=$pp->pp_image1; ?>" />
                                        <br />
                                        <a href="<?=site_url('admin/deleteImage?ppid='.$ppid.'&ims=1&im='.$pp->pp_image1); ?>">
                                            <span class="fa fa-times"></span> Delete
                                        </a>
                                        <br />
                                        <input type="hidden" name="pp_image1" value="<?=$pp->pp_image1; ?>" />
                                        <?php } else { ?>
                                        <input type="file" name="pp_image1" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image 2</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (isset($pp->pp_image2) && !empty($pp->pp_image2)) { ?>
                                        <img style="max-height: 200px; max-width: 200px;" src="<?=base_url(); ?>assets/uploads/post/<?=$pp->pp_image2; ?>" />
                                        <br />
                                        <a href="<?=site_url('admin/deleteImage?ppid='.$ppid.'&ims=2&im='.$pp->pp_image2); ?>">
                                            <span class="fa fa-times"></span> Delete
                                        </a>
                                        <br />
                                        <input type="hidden" name="pp_image2" value="<?=$pp->pp_image2; ?>" />
                                        <?php } else { ?>
                                        <input type="file" name="pp_image2" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image 3</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (isset($pp->pp_image3) && !empty($pp->pp_image3)) { ?>
                                        <img style="max-height: 200px; max-width: 200px;" src="<?=base_url(); ?>assets/uploads/post/<?=$pp->pp_image3; ?>" />
                                        <br />
                                        <a href="<?=site_url('admin/deleteImage?ppid='.$ppid.'&ims=3&im='.$pp->pp_image3); ?>">
                                            <span class="fa fa-times"></span> Delete
                                        </a>
                                        <br />
                                        <input type="hidden" name="pp_image3" value="<?=$pp->pp_image3; ?>" />
                                        <?php } else { ?>
                                        <input type="file" name="pp_image3" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image 4</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (isset($pp->pp_image4) && !empty($pp->pp_image4)) { ?>
                                        <img style="max-height: 200px; max-width: 200px;" src="<?=base_url(); ?>assets/uploads/post/<?=$pp->pp_image4; ?>" />
                                        <br />
                                        <a href="<?=site_url('admin/deleteImage?ppid='.$ppid.'&ims=4&im='.$pp->pp_image4); ?>">
                                            <span class="fa fa-times"></span> Delete
                                        </a>
                                        <br />
                                        <input type="hidden" name="pp_image4" value="<?=$pp->pp_image4; ?>" />
                                        <?php } else { ?>
                                        <input type="file" name="pp_image4" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image 5</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (isset($pp->pp_image5) && !empty($pp->pp_image5)) { ?>
                                        <img style="max-height: 200px; max-width: 200px;" src="<?=base_url(); ?>assets/uploads/post/<?=$pp->pp_image5; ?>" />
                                        <br />
                                        <a href="<?=site_url('admin/deleteImage?ppid='.$ppid.'&ims=5&im='.$pp->pp_image5); ?>">
                                            <span class="fa fa-times"></span> Delete
                                        </a>
                                        <br />
                                        <input type="hidden" name="pp_image5" value="<?=$pp->pp_image5; ?>" />
                                        <?php } else { ?>
                                        <input type="file" name="pp_image5" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Priority</td>
                                    <td>:</td>
                                    <td>
                                        <select name="pp_priority">
                                            <?php for ($ppr=1; $ppr<=100; $ppr++) { ?>
                                            <option <?php if ($ppr == $pp->pp_priority) { echo "selected"; } ?> value="<?=$ppr; ?>"><?=$ppr; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="button">Submit</button>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

</div>