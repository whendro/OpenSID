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
<div class="content-wrapper">
	<section class="content-header">
		<h1>Master Analisis Data Potensi/Sumber Daya </h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Master Analisis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<input id="mode-form" type="hidden" value="<?= $_SESSION['success']?>">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url('analisis_master/form')?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Analisis Baru"><i class="fa fa-plus"></i> Tambah Analisis Baru</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("analisis_master/delete_all/$p/$o")?>')" class="btn btn-social btn-flat	btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
						<a href="<?= site_url('analisis_master/import_analisis')?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Analisis" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Analisis"><i class="fa fa-upload"></i> Impor Analisis</a>
						<a href="<?= site_url("{$this->controller}/clear") ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-refresh"></i>Bersihkan Filter</a>
						<a href="<?= site_url('analisis_master/import_gform')?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Analisis" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Google Form"><i class="fa fa-upload"></i> Impor Google Form</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" method="post">
										<div class="row">
											<div class="col-sm-6">
												<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url('analisis_master/filter')?>')">
													<option value="">Pilih Subjek</option>
													<?php foreach ($list_subjek AS $data): ?>
														<option value="<?= $data['id']?>" <?php if ($filter == $data['id']): ?>selected<?php endif ?>><?= $data['subjek']?></option>
													<?php endforeach;?>
												</select>
												<select class="form-control input-sm " name="state" onchange="formAction('mainform', '<?= site_url('analisis_master/state')?>')">
													<option value="">Pilih Status</option>
													<option value="1" <?php if ($state == 1): ?>selected<?php endif ?>>Aktif</option>
													<option value="2" <?php if ($state == 2): ?>selected<?php endif ?>>Tidak Aktif</option>
												</select>
											</div>
											<div class="col-sm-6">
												<div class="box-tools">
													<div class="input-group input-group-sm pull-right">
														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action','<?= site_url('analisis_master/search')?>');$('#'+'mainform').submit();};">
														<div class="input-group-btn">
															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("analisis_master/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th><input type="checkbox" id="checkall"/></th>
																<th>No</th>
																<th >Aksi</th>
																<?php if ($o==4): ?>
																	<th><a href="<?= site_url("analisis_master/index/$p/3")?>">Nama <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==3): ?>
																	<th><a href="<?= site_url("analisis_master/index/$p/4")?>">Nama <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th><a href="<?= site_url("analisis_master/index/$p/3")?>">Nama <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
																<?php if ($o==6): ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/5")?>">Subjek/Unit Analisis <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==5): ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/6")?>">Subjek/Unit Analisis <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/5")?>">Subjek/Unit Analisis <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
																<?php if ($o==2): ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/1")?>">Status <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==1): ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/2")?>">Status <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/1")?>">Status <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data): ?>
																<tr>
																	<td>
																		<?php if ($data['jenis']!=1): ?>
																			<input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" />
																		<?php endif; ?>
																	</td>
																	<td><?= $data['no']?></td>
																	<td nowrap>
																		<a href="<?= site_url("analisis_master/menu/$data[id]")?>" class="btn bg-purple btn-flat btn-sm"  title="Rincian Analisis"><i class="fa fa-list-ol"></i></a>
																		<a href="<?= site_url("analisis_master/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-flat btn-sm"  title="Ubah Data"><i class='fa fa-edit'></i></a>
																		<?php if ($data['jenis']!=1): ?>
																			<a href="#" data-href="<?= site_url("analisis_master/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																		<?php endif; ?>
																	</td>
																	<td width="60%"><?= $data['nama']?></td>
																	<td nowrap><?= $data['subjek']?></td>
																	<td><?= $data['lock']?></td>
																</tr>
															<?php endforeach;?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<div class="row">
										<div class="col-sm-6">
											<div class="dataTables_length">
												<form id="paging" action="<?= site_url("analisis_master")?>" method="post" class="form-horizontal">
													<label>
														Tampilkan
														<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
															<option value="20" <?php selected($per_page,20); ?> >20</option>
															<option value="50" <?php selected($per_page,50); ?> >50</option>
															<option value="100" <?php selected($per_page,100); ?> >100</option>
														</select>
														Dari
														<strong><?= $paging->num_rows?></strong>
														Total Data
													</label>
												</form>
											</div>
										</div>
										<div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                          <?php if ($paging->start_link): ?>
                            <li><a href="<?= site_url("analisis_master/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->prev): ?>
                            <li><a href="<?= site_url("analisis_master/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                          <?php endif; ?>
                          <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
               	            <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("analisis_master/index/$i/$o")?>"><?= $i?></a></li>
                          <?php endfor; ?>
                          <?php if ($paging->next): ?>
                            <li><a href="<?= site_url("analisis_master/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->end_link): ?>
                            <li><a href="<?= site_url("analisis_master/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
<?php $this->load->view('analisis_master/modal_pertanyaan', $data);?>
<?php $this->load->view('analisis_master/modal_jawaban_pilihan', $data);?>
<script>
	function assignValue() {
		var isSettingApplicable = true;
		$('.row-pertanyaan').each(function(i, obj) {
			var idObj = $(obj).find('.input-id').val();
			objRowJawaban = $("#row-jawaban-" + idObj);
			// Isi nilai checkbox is-selected
			objRowJawaban.find('.is-selected').val($(obj).find('.input-is-selected').prop("checked"));
			// Isi nilai radio button is-nik-kk
			objRowJawaban.find('.is-nik-kk').val($(obj).find('.input-is-nik-kk').prop("checked"));
			// Isi nilai input tipe
			objRowJawaban.find('.tipe').val($(obj).find('.input-tipe').val());
			// Isi nilai input kategori
			objRowJawaban.find('.kategori').val($(obj).find('.input-kategori').val());
			// Isi nilai input bobot
			objRowJawaban.find('.bobot').val($(obj).find('.input-bobot').val());

			// Tampilkan Form Pilihan Jawaban untuk pertanyaan dengan syarat-syarat berikut:
			// 1. Tipe Pertanyaan Jawaban Tunggal
			// 2. Pertanyaan dipilih untuk disimpan
			// 3. Pertanyaan bukan berupa NIK/ No.KK
			if($(obj).find('.input-tipe').val() == "1" && $(obj).find('.input-is-selected').prop("checked") && !($(obj).find('.input-is-nik-kk').prop("checked")))
			{
				objRowJawaban.show();
				isSettingApplicable = false;
			}
			else
				objRowJawaban.hide();
		});

		// Tampilkan/Sembunyikan Empty State
		if(isSettingApplicable)
			$('#caption-jawaban').show();
		else
			$('#caption-jawaban').hide();
	}

	function setAsNikKK(objRow, setEnable=true) {
		objRow.find('.input-bobot').val("0");
		if(setEnable)
		{
			objRow.find('.input-is-selected').prop("disabled", true);
			objRow.find('.input-is-selected').prop("title", "NIK/No. KK harus disimpan");
			objRow.find('.input-tipe').val(1);
			objRow.find('.input-tipe').prop("disabled", true);
			objRow.find('.input-kategori').val("NIK/No. KK");
			objRow.find('.input-kategori').prop("disabled", true);
			objRow.find('.input-bobot').prop("disabled", true);
		}
		else
		{
			objRow.find('.input-is-selected').prop("disabled", false);
			objRow.find('.input-is-selected').prop("title", "");
			objRow.find('.input-tipe').val(0);
			objRow.find('.input-tipe').prop("disabled", false);
			objRow.find('.input-kategori').val("");
			objRow.find('.input-kategori').prop("disabled", false);
			objRow.find('.input-bobot').prop("disabled", false);
		}
	}

	function setSelectedQuestion(objRow, setSelected=true) {
		setAsNikKK(objRow, false);
		objRow.find('.input-tipe').val(0);
		objRow.find('.input-kategori').val("");
		objRow.find('.input-bobot').val("0");
		
		if(setSelected)
		{
			objRow.find('.input-is-nik-kk').prop("disabled", false);
			objRow.find('.input-tipe').prop("disabled", false);
			objRow.find('.input-kategori').prop("disabled", false);
			objRow.find('.input-bobot').prop("disabled", false);
		}
		else
		{
			objRow.find('.input-is-nik-kk').prop("disabled", true);
			objRow.find('.input-tipe').prop("disabled", true);
			objRow.find('.input-kategori').prop("disabled", true);
			objRow.find('.input-bobot').prop("disabled", true);
		}
	}

	$(document).ready(function(){
		var isDataPertanyaanExist = false;
		if($('#mode-form').val() == 5)
			$('#modalPertanyaan').modal('show');
		
		$('#btn-next-pertanyaan').click(function() {
			assignValue();
			$('#modalPertanyaan').modal('hide');
			isDataPertanyaanExist = true;
		});

		$('#modalPertanyaan').on('hidden.bs.modal', function () {
			if(isDataPertanyaanExist)
			{
				$('#modalJawaban').modal('show');
				isDataPertanyaanExist = false;
			}
		})

		$('#btn-prev-jawaban').click(function() {
			$('#modalJawaban').modal('hide');
			isDataPertanyaanExist = true;
		});

		$('#modalJawaban').on('hidden.bs.modal', function () {
			if(isDataPertanyaanExist)
			{
				$('#modalPertanyaan').modal('show');
				isDataPertanyaanExist = false;
			}
		})

		$('.input-is-nik-kk').click(function() {
			if($(this).data('waschecked') == true)
			{
				$(this).prop("checked", false);
				$(this).data('waschecked', false);

				setAsNikKK($(this).closest('.row-pertanyaan'), false);
			}
			else
			{
				$('.input-is-nik-kk').each(function(i, obj) {
					$(obj).prop("checked", false);
					$(obj).data('waschecked', false);
					setAsNikKK($(this).closest('.row-pertanyaan'), false);
				});
				
				$(this).prop("checked", true);
				$(this).data('waschecked', true);

				setAsNikKK($(this).closest('.row-pertanyaan'), true);
			}
		});

		$('.input-is-selected').click(function() {
			if($(this).data('waschecked') == true)
			{
				$(this).prop("checked", false);
				$(this).data('waschecked', false);

				setSelectedQuestion($(this).closest('.row-pertanyaan'), false);
			}
			else
			{
				$(this).prop("checked", true);
				$(this).data('waschecked', true);

				setSelectedQuestion($(this).closest('.row-pertanyaan'), true);
			}
		});
	})
</script>

