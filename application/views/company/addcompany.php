<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Company</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1?>
		<?php foreach($company as $d):?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $d['name']?></td>
			<td><a href="<?php echo site_url()?>/data/editcompany/<?php echo $d['idcompany']?>" class='btn btn-warning'>Edit</a></td>
			<td><a href="<?php echo site_url()?>/data/deletecompany/<?php echo $d['idcompany']?>" class='btn btn-danger'>Delete</a></td>
			<?php $no++?>
		</tr>
		<?php endforeach;?>	
	</tbody>
</table>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="company">Nama Company:</label>
  <input type="text" class="form-control" name="name">
</div>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Tambah</button>
</form>