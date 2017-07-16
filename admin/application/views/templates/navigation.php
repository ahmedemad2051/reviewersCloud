<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Reviewer Cloud</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if ($this->session->userdata('admin') != ''): ?>
                    <li class="<?php if ($this->uri->segment(2) == 'dashboard') {
                        echo 'active';
                    } ?>"><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a></li>
                    <li class="<?php if ($this->uri->segment(2) == 'users') {
                        echo 'active';
                    } ?>"><a href="<?php echo site_url('admin/users') ?>">Users</a></li>
                    <li class="<?php if ($this->uri->segment(2) == 'clients') {
                        echo 'active';
                    } ?>"><a href="<?php echo site_url('admin/clients') ?>">Clients</a></li>
                    <li class="<?php if ($this->uri->segment(2) == 'settings') {
                        echo 'active';
                    } ?>"><a href="<?php echo site_url('admin/settings') ?>">Settings</a></li>
                    <li><a href="<?php echo site_url('admin/logout') ?>">Logout</a></li>
                <?php endif ?>
                <!--<li><a href="#contact">Contact</a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
