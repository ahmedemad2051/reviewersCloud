<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 well">

            <fieldset>
                <legend>View offer</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">campaign id: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $offer->campaign_id;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">marketplace: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $offer->marketplace;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">asin: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $offer->asin;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="password" class="control-label">item: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1">
                            <?php
                            echo $offer->item;
                            ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label">quantity: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                            echo $offer->qty;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="marketplaces" class="control-label">super url: </label>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-offset-1" style="word-wrap: break-word;">
                            <?php
                            echo $offer->super_url;
                            ?>
                        </div>
                    </div>
                </div>


            </fieldset>

        </div>
    </div>
</div>