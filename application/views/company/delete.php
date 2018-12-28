<h3>Apakah anda akan menghapus data berikut ini?</h3>
<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $ok?></div><?php endif;?>
<table class="table table-striped">
	<tbody>
		<tr>
			<td>Name</td>
			<td><?php echo $company['name']?></td>
		</tr>
	</tbody>
</table>
<form action="" method="post">
<a href="<?php echo site_url()?>/data/addcompany" class="btn btn-warning">Batal</a>
<input type="submit" name="submit" value="Hapus" class="btn btn-danger"/>
</form>