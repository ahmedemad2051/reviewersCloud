<?php  	
  	echo '<br>';
        echo 'user name : '.$reviewer->amazon_user_name;
        echo '<br>';
        echo 'user ranking : '.$reviewer->ranking;
        echo '<br>';
        echo 'stars media : '.$stars_media;
        echo '<br>';
        echo 'words media : '.$words_media;
    //    echo $customer_reviewes->num_rows();
      //  echo $count;
?>

<div id="container">
  <h1>Reviews</h1>
  <div id="body">

      <?php if($results) { ?>
<table class='table table-bordered table-striped'>
<tr>
<th>reviewer_id</th>
<th>title</th>
<th>price</th>
<th>star</th>
<th>comment</th>
</tr>
<?php
foreach($results as $data) { ?>
<tr>
<td> <?php echo $data->reviewer_id ?> </td>
<td> <?php echo $data->title ?> </td>
<td> <?php echo $data->price ?> </td>
<td> <?php echo $data->star ?> </td>
<td> <?php echo $data->comment ?> </td>
</tr>

<?php } ?>
</table>
      <?php } ?>

   <ul class='pagination pagination-large'><?php echo $links; ?></ul>
  </div>

 </div>      