 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('admin/dashboard') ?>">Company name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <?php if($this->session->userdata('loginuser')): ?>
            <li <?php if($this->uri->segment(2)=='dashboard') {echo 'class="active"';} ?>><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
            <li <?php if($this->uri->segment(2)=='profile') {echo 'class="active"';} ?>><a href="<?php echo site_url('admin/profile') ?>">Profile</a></li>
            <li <?php if($this->uri->segment(2)=='reviewers') {echo 'class="active"';} ?>><a href="<?php echo site_url('admin/reviewers') ?>">Reviewers</a></li>
            <li <?php if($this->uri->segment(2)=='campaigns') {echo 'class="active"';} ?>><a href="<?php echo site_url('admin/campaigns') ?>">Campaigns</a></li>
            <li><a href="<?php echo site_url('admin/logout') ?>">Logout</a></li>
              <?php endif; ?>
            <!--<li><a href="#contact">Contact</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>