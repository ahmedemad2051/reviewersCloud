<?php if ($this->session->flashdata('add')) { ?>
    <div class="row">
        <div class="col-xs-12">
            <span class="alert alert-success col-xs-12"><?php echo $this->session->flashdata('add'); ?></span>
        </div>
    </div>
    <br>
<?php } ?>

<?php if ($this->session->flashdata('delete')) { ?>
    <div class="row">
        <div class="col-xs-12">
            <span class="alert alert-danger col-xs-12"><?php echo $this->session->flashdata('delete'); ?></span>
        </div>
    </div>
    <br>
<?php } ?>