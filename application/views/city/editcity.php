<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="cityname">City Name:</label>
  <input type="text" class="form-control" value="<?php echo $city['cityname']?>" name="cityname">
</div>
<div class="form-group">
  <label for="country">Country:</label>
  <input type="text" class="form-control" value="<?php echo $city['country']?>" name="country">
</div>
<a href="<?php echo site_url()?>/data/addcity" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Simpan</button>
</form>