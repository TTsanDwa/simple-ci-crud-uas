<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="name">Name:</label>
  <input type="text" class="form-control" value="<?php echo $members['fullname']?>" name="fullname">
</div>
<div class="form-group">
  <label for="email">Email:</label>
  <input type="email" class="form-control" value="<?php echo $members['email']?>" name="email">
</div>
<div class="form-group">
  <label for="company">Company:</label>
  <select name="idcompany" class="form-control">
    <optgroup label="TERPILIH">
      <option selected value="<?php echo $members['idcompany']?>"><?php echo $members['name']?></option>
    </optgroup>
    <optgroup label="PILIHAN">
      <?php foreach ($company as $cd): ?>
        <option value="<?php echo $cd['idcompany']?>"><?php echo $cd['name']?></option>p
      <?php endforeach ?>
    </optgroup>
  </select>
</div>
<div class="form-group">
  <label for="address">Address:</label>
  <input type="text" class="form-control" value="<?php echo $members['address']?>" name="address">
</div>
<div class="form-group">
  <label for="city">City:</label>
  <select name="idcity" class="form-control">
    <optgroup label="TERPILIH">
      <option selected value="<?php echo $members['idcity']?>"><?php echo $members['cityname']?></option>
    </optgroup>
    <optgroup label="PILIHAN">
      <?php foreach ($city as $ct): ?>
        <option value="<?php echo $ct['idcity']?>"><?php echo $ct['cityname']?></option>p
      <?php endforeach ?>
    </optgroup>
  </select>
</div>
<div class="form-group">
  <label for="foto">Foto:</label>
  <input type="file" class="form-control" value="" name="foto">
</div>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Simpan</button>
</form>