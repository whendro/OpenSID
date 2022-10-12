<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2022 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2022 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

use App\Enums\StatusEnum;
use App\Models\FormatSurat;

defined('BASEPATH') || exit('No direct script access allowed');

class Migrasi_surat_tinymce extends MY_model
{
    public function up()
    {
        $hasil = true;

        return $hasil && $this->suratKeteranganUsaha($hasil);
    }

    protected function suratKeteranganUsaha($hasil)
    {
        $nama_surat = 'Keterangan Usaha';
        $url_surat  = 'keterangan-usaha';

        $data = [
            'nama'                => $nama_surat,
            'url_surat'           => $url_surat,
            'kode_surat'          => '500',
            'jenis'               => FormatSurat::TINYMCE_SISTEM,
            'masa_berlaku'        => 1,
            'satuan_masa_berlaku' => 'M',
            'orientasi'           => 'Potrait',
            'ukuran'              => 'F4',
            'margin'              => '{"kiri":1.78,"atas":0.63,"kanan":1.78,"bawah":1.37}',
            'qrcode'              => StatusEnum::YA,
            'kode_isian'          => '[{"tipe":"text","kode":"[nama_usaha]","nama":"Nama Usaha","deskripsi":"Masukkan Nama \/ Jenis usaha","atribut":"required"},{"tipe":"textarea","kode":"[keperluan]","nama":"Keperluan","deskripsi":"Masukkan Keperluan","atribut":"required"}]',
            'form_isian'          => '{"individu":{"sex":"","status_dasar":"1"}}',
            'created_by'          => auth()->id,
            'updated_by'          => auth()->id,
            'mandiri'             => StatusEnum::YA,
            'syarat_surat'        => json_encode(['13', '3']),
            'template'            => "
                <h3 style=\"margin: 0; text-align: center;\"><span style=\"text-decoration: underline;\">[JUdul_surat]</span></h3>\r\n<p style=\"margin: 0; text-align: center;\">Nomor : [format_nomor_surat]<br /><br /></p>\r\n<p style=\"text-align: justify; text-indent: 30px;\">Yang bertanda tangan di bawah ini [Jabatan] [Nama_desa], Kecamatan [Nama_kecamatan], [Sebutan_kabupaten] [Nama_kabupaten], Provinsi [Nama_provinsi] menerangkan dengan sebenarnya bahwa :</p>\r\n<table style=\"border-collapse: collapse; width: 100%; height: 270px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">1.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Nama Lengkap</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Nama]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">2.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">NIK / No. KTP</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Nik]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">3.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">No. KK</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[No_kk]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">4.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Kepala Keluarga</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Kepala_kk]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">5.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Tempat / Tanggal Lahir</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Ttl]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">6.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Jenis Kelamin</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Jenis_kelamin]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 36px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 36px; text-align: left;\">7.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 36px;\">Alamat / Tempat Tinggal</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 36px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 36px;\">[Alamat] [Sebutan_desa] [Nama_desa], Kecamatan [Nama_kecamatan], [Sebutan_kabupaten] [Nama_kabupaten]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">8.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Agama</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Agama]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">9.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Status</td>\r\n<td style=\"width: 1.2333%; height: 18px; text-align: center;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Status_kawin]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">10.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Pendidikan</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Pendidikan_kk]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">11.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Pekerjaan</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Pekerjaan]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">12.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Kewarganegaraan</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Warga_negara]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">13.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Keperluan</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Keperluan]</td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 4.31655%; text-align: center; height: 18px;\"> </td>\r\n<td style=\"width: 3.90429%; height: 18px; text-align: left;\">14.</td>\r\n<td style=\"width: 30.5253%; text-align: left; height: 18px;\">Berlaku</td>\r\n<td style=\"width: 1.2333%; text-align: center; height: 18px;\">:</td>\r\n<td style=\"width: 60.0206%; text-align: left; height: 18px;\">[Mulai_berlaku] sampai dengan [Berlaku_sampai]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: justify; text-indent: 30px;\">Orang tersebut adalah benar-benar warga [Sebutan_desa] [Nama_desa] dengan data seperti di atas, yang memiliki usaha [nama_usaha].<br /><br /></p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 35%; text-align: center;\"> </td>\r\n<td style=\"width: 30%;\"> </td>\r\n<td style=\"width: 35%; text-align: center;\">[Nama_desa], [Tgl_surat]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 35%; text-align: center;\">Pemegang Surat</td>\r\n<td style=\"width: 30%;\"> </td>\r\n<td style=\"width: 35%; text-align: center;\">[atas_nama]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 35%; text-align: center;\"> </td>\r\n<td style=\"width: 30%;\"><br /><br /><br /><br /></td>\r\n<td style=\"width: 35%;\"> </td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 35%; text-align: center;\">[Nama]</td>\r\n<td style=\"width: 30%;\"> </td>\r\n<td style=\"width: 35%; text-align: center;\">[Nama_pamong]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 35%;\"> </td>\r\n<td style=\"width: 30%;\"> </td>\r\n<td style=\"width: 35%; text-align: center;\">[Sebutan_nip_desa] : [nip_pamong]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<div style=\"text-align: center;\"><br />[qr_code]</div>
            ",
        ];

        return $hasil && $this->tambah_surat_tinymce($data);
    }
}
