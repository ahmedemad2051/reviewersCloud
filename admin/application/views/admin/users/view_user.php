<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">
    
            <fieldset>
                <legend>View user</legend>
               <?php echo validation_errors('<p class="error">'); ?>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">first_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php 
                             echo $user->first_name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">last_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php 
                             echo $user->last_name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">email: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1"  style="word-wrap: break-word;">
                            <?php 
                             echo $user->email;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">admin: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->type == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>
                           
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">create_campaign: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->create_campaign == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">edit_campaign: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->edit_campaign == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">delete_campaign: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->delete_campaign == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">archive_campaign: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->archive_campaign == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">create_reviewer: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->create_reviewer == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">edit_reviewer: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->edit_reviewer == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              
              
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">archive_reviewer: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            if( $user->archive_reviewer == 1)
                                echo 'yes';
                            else
                                echo 'no';
                            ?>

                        </div>
                    </div>
                </div>
              

            </fieldset>

        </div>
    </div>
</div>