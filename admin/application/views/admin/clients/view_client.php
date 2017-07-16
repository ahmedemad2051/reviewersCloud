<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">

            <fieldset>
                <legend>View client</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">amazon_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->amazon_name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_first_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_first_name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_last_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_last_name;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_phone: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_phone;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_fax: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_fax;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_email: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_email;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">contact_password: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo  $client->contact_password;
                            ?>
                        </div>
                    </div>
                </div>





                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="amazon_id" class="control-label">amazon_id: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->amazon_id;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label">marketplaces: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                       echo $client->marketplaces;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="categories" class="control-label">categories: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                           echo $client->categories;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="company_name" class="control-label">company_name: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->company_name;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_address_1" class="control-label">billing_address_1: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_address_1;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_address_2" class="control-label">billing_address_2: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_address_2;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_department" class="control-label">billing_department: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_department;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_city" class="control-label">billing_city: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_city;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_zip" class="control-label">billing_zip: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_zip;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_state" class="control-label">billing_state: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_state;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="billing_country" class="control-label">billing_country: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $client->billing_country;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">billing_cycle:  </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">

                            <?php

                            echo $client->billing_cycle;
                            ?>

                        </div>
                    </div>
                </div>

            </fieldset>

        </div>
    </div>
</div>