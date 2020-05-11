<style type="text/css">
	td.nowrap { white-space: nowrap; }
</style>
<script>
	$(function()
	{
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete(
		{
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>

<div class="box box-info">
	<div class="box-header with-border">
		<a href="<?= site_url("{$this->controller}/form/aparat")?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Staf">
      <i class="fa fa-plus"></i>Tambah Aparat Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></a>
    <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("{$this->controller}/delete_all/aparat") ?>')" class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">
      <i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
		<a href="<?= site_url("{$this->controller}/dialog_cetak/aparat/$o")?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fa fa-print "></i> Cetak</a>
		<a href="<?= site_url("{$this->controller}/dialog_unduh/aparat/$o")?>" title="Unduh Data" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fa fa-download"></i> Unduh</a>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="row">
							<div class="col-sm-6">
								<select class="form-control input-sm" name="filter" onchange="formAction('mainform','<?= site_url($this->controller.'/filter/aparat') ?>')">
									<option value="">Semua</option>
									<option value="1" <?php if ($filter==1 ): ?>selected<?php endif ?>>Aktif</option>
									<option value="2" <?php if ($filter==2 ): ?>selected<?php endif ?>>Tidak Aktif</option>
								</select>
							</div>
							<div class="col-sm-6">
								<div class="box-tools">
									<div class="input-group input-group-sm pull-right">
										<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?= site_url("{$this->controller}/search/aparat") ?>');$('#'+'mainform').submit();}">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("{$this->controller}/search/aparat") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table  class="table table-bordered table-striped dataTable table-hover">
										<thead class="bg-gray disabled color-palette">
											<tr>
												<th><input type="checkbox" id="checkall" ></th>
												<th>No</th>
												<th width='12%'>Aksi</th>
												<th class="text-center">Foto</th>
												<th>Nama, NIP/NIAP, NIK</th>
												<th>Tempat, Tanggal Lahir</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Pangkat / Golongan</th>
												<th>Jabatan</th>
												<th>Pendidikan Terakhir</th>
												<th>Nomor SK Pengangkatan</th>
												<th>Tanggal SK Pengangkatan</th>
												<th>Nomor SK Pemberhentian</th>
												<th>Tanggal SK Pemberhentian</th>
												<th>Masa/Periode Jabatan</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $data): ?>
												<tr>
													<td>
														<?php if ($data['username']!='siteman'): ?>
															<input type="checkbox" name="id_cb[]" value="<?=$data['pamong_id']?>" />
														<?php endif; ?>
													</td>
													<td><?=$data['no']?></td>
													<td nowrap>
                            <a href="<?=site_url("{$this->controller}/urut/$data[pamong_id]/1")?>" class="btn bg-olive btn-flat btn-sm"  title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
                            <a href="<?=site_url("{$this->controller}/urut/$data[pamong_id]/2")?>" class="btn bg-olive btn-flat btn-sm"  title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
														<a href="<?= site_url("{$this->controller}/form/aparat/1/0/$data[pamong_id]") ?>" class="btn bg-orange btn-flat btn-sm"  title="Ubah Data"><i class="fa fa-edit"></i></a>
														<?php if ($data['pamong_ttd'] == '1'): ?>
															<a href="<?=site_url("{$this->controller}/ttd_off/$data[pamong_id]")?>" class="btn bg-navy btn-flat btn-sm" title="Bukan TTD a.n">a.n</a>
														<?php else: ?>
															<a href="<?=site_url("{$this->controller}/ttd_on/$data[pamong_id]")?>" class="btn bg-purple btn-flat btn-sm" title="Jadikan TTD a.n">a.n</a>
														<?php endif ?>
														<?php if ($data['pamong_ub'] == '1'): ?>
															<a href="<?=site_url("{$this->controller}/ub_off/$data[pamong_id]")?>" class="btn bg-navy btn-flat btn-sm" title="Bukan TTD u.b">u.b</a>
														<?php else: ?>
															<a href="<?=site_url("{$this->controller}/ub_on/$data[pamong_id]")?>" class="btn bg-purple btn-flat btn-sm" title="Jadikan TTD u.b">u.b</a>
														<?php endif ?>
														<a href="#" data-href="<?= site_url("{$this->controller}/delete/aparat/1/0/$data[pamong_id]") ?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
													</td>
													<td class="text-center">
														<div class="user-panel">
															<div class="image2">
																<?php if ($data['foto']): ?>
																	<img src="<?=AmbilFoto($data['foto'])?>" class="img-circle" alt="User Image"/>
																<?php else: ?>
																	<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="img-circle" alt="User Image"/>
																<?php endif ?>
															</div>
														</div>
													</td>
													<td class="nowrap">
														<?= $data['nama']?>
														<p class='text-blue'>
															<?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-'): ?>
																<i>NIP :<?=$data['pamong_nip']?></i></br>
															<?php else: ?>
																<i>NIAP :<?=$data['pamong_niap']?></i></br>
															<?php endif; ?>
															<i>NIK :<?=$data['nik']?></i>
														</p>
													</td>

													<td><?= $data['tempatlahir'].', '.tgl_indo_out($data['tanggallahir'])?></td>
													<td><?= $data['sex']?></td>
													<td><?= $data['agama']?></td>
													<td><?= $data['pamong_pangkat']?></td>
													<td><?= $data['jabatan']?></td>
													<td><?= $data['pendidikan_kk']?></td>
													<td><?= $data['pamong_nosk']?></td>
													<td><?= tgl_indo_out($data['pamong_tglsk'])?></td>
													<td><?= $data['pamong_nohenti']?></td>
													<td><?= tgl_indo_out($data['pamong_tglhenti'])?></td>
													<td><?= $data['pamong_masajab']?></td>
													<td>
														<?php if ($data['pamong_status'] == '1'): ?>
															<div title="Aktif">
																<center><i class='fa fa-unlock fa-lg text-yellow'></i></center>
															</div>
														<?php else: ?>
															<div title="Tidak Aktif">
																<center><i class='fa fa-lock fa-lg text-green'></i></center>
															</div>
														<?php endif; ?>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('global/confirm_delete');?>
