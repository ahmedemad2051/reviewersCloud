<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "editform", "name" => "editform");
            echo form_open("admin/edit_user/".$id, $attributes);
            ?>
            <fieldset>
                <legend>Edit user</legend>
               <?php echo validation_errors('<p class="error">'); ?>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">first_name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php 
                             echo form_input(array('name' => 'first_name',
                            'id' => 'first_name',
                            'value' => set_value('first_name', $first_name)));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">last_name </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php 
                             echo form_input(array('name' => 'last_name',
                            'id' => 'last_name',
                            'value' => set_value('last_name', $last_name )));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">email </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php 
                             echo form_input(array('name' => 'email',
                            'id' => 'email',
                            'value' => set_value('email ', $email )));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">password </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php 
                             echo form_input(array('name' => 'password',
                            'id' => 'password',
                            'value' => set_value('password', $password)));
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">admin </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'type',
                                'id' => 'type_admin',
                                'value' => 1,
                                'checked' => ((set_value('type') === '1' || $type == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'type',
                                'id' => 'type_regular',
                                'value' => 0,
                                'checked' => ((set_value('type') === '0' || $type == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">create_campaign </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'create_campaign',
                                'id' => 'create_campaign_yes',
                                'value' => 1,
                                'checked' => ((set_value('create_campaign') === '1' || $create_campaign == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'create_campaign',
                                'id' => 'create_campaign_no',
                                'value' => 0,
                                'checked' => ((set_value('create_campaign') === '0' || $create_campaign == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">edit_campaign </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'edit_campaign',
                                'id' => 'edit_campaign_yes',
                                'value' => 1,
                                'checked' => ((set_value('edit_campaign') === '1' || $edit_campaign == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'edit_campaign',
                                'id' => 'edit_campaign_no',
                                'value' => 0,
                                'checked' => ((set_value('edit_campaign') === '0' || $edit_campaign == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">delete_campaign </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'delete_campaign',
                                'id' => 'delete_campaign_yes',
                                'value' => 1,
                                'checked' => ((set_value('delete_campaign') === '1' || $delete_campaign == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'delete_campaign',
                                'id' => 'delete_campaign_no',
                                'value' => 0,
                                'checked' => ((set_value('delete_campaign') === '0' || $delete_campaign == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">archive_campaign </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'archive_campaign',
                                'id' => 'archive_campaign_yes',
                                'value' => 1,
                                'checked' => ((set_value('archive_campaign') === '1' || $archive_campaign == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'archive_campaign',
                                'id' => 'archive_campaign_no',
                                'value' => 0,
                                'checked' => ((set_value('archive_campaign') === '0' || $archive_campaign == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">create_reviewer </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'create_reviewer',
                                'id' => 'create_reviewer_yes',
                                'value' => 1,
                                'checked' => ((set_value('create_reviewer') === '1' || $create_reviewer == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'create_reviewer',
                                'id' => 'create_reviewer_no',
                                'value' => 0,
                                'checked' => ((set_value('create_reviewer') === '0' || $create_reviewer == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">edit_reviewer </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'edit_reviewer',
                                'id' => 'edit_reviewer_yes',
                                'value' => 1,
                                'checked' => ((set_value('edit_reviewer') === '1' || $edit_reviewer == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'edit_reviewer',
                                'id' => 'edit_reviewer_no',
                                'value' => 0,
                                'checked' => ((set_value('edit_reviewer') === '0' || $edit_reviewer == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">archive_reviewer </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            yes
                            <?php
                            $data = array(
                                'name' => 'archive_reviewer',
                                'id' => 'archive_reviewer_yes',
                                'value' => 1,
                                'checked' => ((set_value('archive_reviewer') === '1' || $archive_reviewer == 1) ? TRUE : FALSE),
                            );
                            echo form_radio($data);
                            ?> no <?php
                            $data = array(
                                'name' => 'archive_reviewer',
                                'id' => 'archive_reviewer_no',
                                'value' => 0,
                                'checked' => ((set_value('archive_reviewer') === '0' || $archive_reviewer == 0) ? TRUE : FALSE),
                            );
                             echo form_radio($data);
                            ?>
                           
                        </div>
                    </div>
                </div>
              

                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_login" name="btn_save" type="submit" class="btn btn-default" value="Save" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>