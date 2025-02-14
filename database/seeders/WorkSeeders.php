<?php

namespace Database\Seeders;

use App\Models\Works;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            'Akuntan',
            'Anggota BPK',
            'Anggota DPD',
            'Anggota DPR-RI',
            'Anggota DPRD Kabupaten / Kota',
            'Anggota DPRD Propinsi',
            'Anggota Kabinet / Kementerian',
            'Anggota Mahkamah Konstitusi',
            'Apoteker',
            'Arsitek',
            'Belum / Tidak Bekerja',
            'Biarawati',
            'Bidan',
            'Bupati',
            'Buruh Harian Lepas',
            'Buruh Nelayan / Perikanan',
            'Buruh Peternakan',
            'Buruh Tani / Perkebunan',
            'Dokter',
            'Dosen',
            'Duta Besar',
            'Gubernur',
            'Guru',
            'Imam Masjid',
            'Industri',
            'Juru Masak',
            'Karyawan BUMD',
            'Karyawan BUMN',
            'Karyawan Honorer',
            'Karyawan Swasta',
            'Kepala Desa',
            'epolisian RI',
            'Konstruksi',
            'Konsultan',
            'Lain-Lain',
            'Mekanik',
            'Mengurus Rumah Tangga',
            'Nelayan / Perikanan',
            'Notaris',
            'Paraji',
            'Paranormal',
            'Pastur',
            'Pedagang',
            'Pegawai Negeri Sipil',
            'Pelajar / Mahasiswa',
            'Pelaut',
            'Pembantu Rumah Tangga',
            'Penata Busana',
            'Penata Rambut',
            'Penata Rias',
            'Pendeta',
            'Peneliti',
            'Pengacara',
            'Pensiunan',
            'Penterjemah',
            'Penyiar Radio',
            'Penyiar Televisi',
            'Perancang Busana',
            'Perangkat Desa',
            'Perawat',
            'Perdagangan',
            'Petani / Pekebun',
            'Peternak',
            'Pialang',
            'Pilot',
            'Presiden',
            'Promotor Acara',
            'Psikiater / Psikolog',
            'Seniman',
            'Sopir',
            'Tabib',
            'Tentara Nasional Indonesia',
            'Transportasi',
            'Tukang Batu',
            'Tukang Cukur',
            'Tukang Gigi',
            'Tukang Jahit',
            'Tukang Kayu',
            'Tukang Las / Pandai Besi',
            'Tukang Listrik',
            'Tukang Sol Sepatu',
            'Ustadz / Mubaligh',
            'Wakil Bupati',
            'Wakil Gubernur',
            'Wakil Presiden',
            'Wakil Walikota',
            'Walikota',
            'Wartawan',
            'Wiraswasta',
        ];

        foreach ($list as $item) {
            Works::create(['nama' => $item]);
        }
    }
}
