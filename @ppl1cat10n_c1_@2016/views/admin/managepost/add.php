
<!-- Main -->
<div id="main">

    <!-- Two -->
    <section id="one1">
        <div class="container" style="overflow-x: scroll;">
            <table width="100%">
                <tr>
                    <td><h3>Add Post</h3></td>
                </tr>
                <tr>
                    <td height="600">
                        <p>

                            <a href="<?=site_url('admin/managepost?page=two'); ?>">
                                <button type="button" class="button green-button"> &lt;&lt; Back </button>
                            </a>
                            
                        <form method="post" action="" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="pp_title" placeholder="Insert post title." required="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="pp_post" placeholder="Insert post here." rows="2" required=""></textarea>
                                    </td>
                                </tr>
                                <?php for ($im=1; $im<=5; $im++) { ?>
                                <tr>
                                    <td>Image <?=$im; ?></td>
                                    <td>:</td>
                                    <td>
                                        <input type="file" name="pp_image<?=$im; ?>" />
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td>Priority</td>
                                    <td>:</td>
                                    <td>
                                        <select name="pp_priority">
                                            <?php foreach ($pp_pr as $ppr) { ?>
                                            <option value="<?=$ppr; ?>"><?=$ppr; ?></option>
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