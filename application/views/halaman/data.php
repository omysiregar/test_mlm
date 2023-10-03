
<table class="table">
	<thead>
		<tr>
			<th >NO.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No. Telp</th>
			<th>Atasan/Upline</th>
			<th class="text-center" style="width: 70px; vertical-align: middle"><i class="fas fa-cogs"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($user['level1']) > 0) {
			$no = 1;
		?>
			<?php foreach ($user['level1'] as $num => $row) { ?>
				<tr>
					<td class="text-left" ><?php echo $no++; ?>.</td>
					<td><?php echo ucwords($row->nama); ?></td>
					<td><?php echo ucwords($row->alamat); ?></td>
					<td><?php echo $row->no_telp; ?></td>
					<td>----</td>
					<td class="text-center" style="width: 80px; vertical-align: middle">
						<a href="#!" style="cursor: pointer" onclick="actControl('delete', '<?php echo $row->id_user ?>')" class="btn-sm btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
					</td>

				</tr>
				<?php
				$ke = 1;
				foreach ($user['level2'][$num] as $nom => $val) { ?>
					<tr>
						<td class="text-center"><?php echo $ke++; ?>.</td>
						<td><?php echo ucwords($val->nama); ?></td>
						<td><?php echo ucwords($val->alamat); ?></td>
						<td><?php echo $val->no_telp; ?></td>
						<td><?php echo ucwords($row->nama); ?></td>
						<td class="text-center" style="width: 80px; vertical-align: middle">
							<a href="#!" style="cursor: pointer" onclick="actControl('delete', '<?php echo $val->id_user ?>')" class="btn-sm btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
						</td>

					</tr>
				<?php  } ?>
		<?php  }
		} else {
			echo '<tr><td colspan="9" class="text-center"><i class="fas fa-info-circle m-r-10"></i>Belum ada data </td></tr>';
		};
		?>
	</tbody>
</table>
<!-- pagination -->

<hr style="margin: 3px 0px 3px 0px; padding: 0px; margin-bottom: 10px" />
<div class="row">
	<div class="col-md-6">
		<ul class="pagination">
			<span class="paging-label" style="color:  #9f9f9f;">Menampilkan <?php echo  $pagination['start']; ?> - <?php echo  $pagination['end']; ?> dari total <?php echo  $pagination['total']; ?> data</span>
		</ul>
	</div>
	<div class="col-md-6">
		<nav class="float-right">
			<?php echo   $pagination['data']; ?>
		</nav>
	</div>
</div>
