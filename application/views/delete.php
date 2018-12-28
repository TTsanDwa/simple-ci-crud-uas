<h3>Apakah anda akan menghapus data berikut ini?</h3>
<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $ok?></div><?php endif;?>
<table class="table table-striped">
	<tbody>
		<tr>
			<td>Name</td>
			<td><?php echo $members['fullname']?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $members['email']?></td>
		</tr>
		<tr>
			<td>Company</td>
			<td><?php echo $members['name']?></td>
		</tr>
		<tr>
			<td>address</td>
			<td><?php echo $members['address']?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $members['cityname']?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?php echo $members['country']?></td>
		</tr>
	</tbody>
</table>
<form action="" method="post">
<a href="<?php echo site_url()?>" class="btn btn-warning">Batal</a>
<input type="submit" name="submit" value="Hapus" class="btn btn-danger"/>
</form>