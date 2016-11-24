

<!-- Main -->
<div id="main">
    
    <!-- Four -->
    <section id="four">
        <div class="container">
            <h3>Login Page</h3>
            <form method="post" action="<?=site_url('utama/loginprocess'); ?>">
                <div class="row uniform">
                    <div class="12u 12u(xsmall)"><input type="text" name="username" id="username" placeholder="Username" /></div>
                    <div class="12u 12u(xsmall)"><input type="password" name="password" id="password" placeholder="Password" /></div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions">
                            <li><input type="submit" class="special" value="Log In" /></li>
                            <li><input type="reset" value="Reset" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
</div>