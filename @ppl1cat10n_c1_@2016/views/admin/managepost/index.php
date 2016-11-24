<!-- Main -->
<div id="main">

    <!-- Two -->
    <section id="one1">
        <div class="container">
            <h2>Manage Post</h2>
            <p>
                <?php foreach($css_files as $file): ?>
                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                <?php endforeach; ?>
                <?php foreach($js_files as $file): ?>
                    <script src="<?php echo $file; ?>"></script>
                <?php endforeach;?>
                <?=$output?>
            </p>
        </div>
    </section>
    
</div>