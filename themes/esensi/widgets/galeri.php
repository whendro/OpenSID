<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box box-primary box-solid">
  <div class="box-header">
    <h3 class="box-title"><a href="<?= site_url('first/gallery');?>"><i class="fas fa-camera"></i> Galeri Foto</a></h3>
  </div>
  <div class="box-body flex gap-2 flex-wrap">
    <?php foreach ($w_gal As $data): ?>
      <?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
      <a href='<?= site_url("first/sub_gallery/$data[id]"); ?>' title="<?= "Album : $data[nama]" ?>">
        <img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" width="130" alt="<?= "Album : $data[nama]" ?>">
      </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>