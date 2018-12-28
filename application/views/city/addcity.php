<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama City</th>
			<th>Country</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1?>
		<?php foreach($city as $d):?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $d['cityname']?></td>
			<td><?php echo $d['country']?></td>
			<td><a href="<?php echo site_url()?>/data/editcity/<?php echo $d['idcity']?>" class='btn btn-warning'>Edit</a></td>
			<td><a href="<?php echo site_url()?>/data/deletecity/<?php echo $d['idcity']?>" class='btn btn-danger'>Delete</a></td>
			<?php $no++?>
		</tr>
		<?php endforeach;?>	
	</tbody>
</table>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="city">Nama City:</label>
  <input type="text" class="form-control" name="cityname">
</div>
<div class="form-group">
  <label for="country">Country:</label>
  <input type="text" class="form-control" name="country">
</div>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Tambah</button>
</form>
