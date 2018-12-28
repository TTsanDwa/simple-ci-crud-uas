<table class="table table-striped">
	<tbody>
		<tr>
			<hr>
				<?php if($members['foto'] == null):?>
					<b><h3 class="">Belum Ada Foto !</h3></b>
				<?php endif?>
				<?php if($members['foto']!=null):?>
					<img src="<?= base_url(); ?>uploads/<?php echo $members['foto']?>" width="150"/>
				<?php endif?>
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
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>