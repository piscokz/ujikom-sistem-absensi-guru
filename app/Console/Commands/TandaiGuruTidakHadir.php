<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JadwalDetail;
use App\Models\Absensi;
use App\Models\SistemOtomatis;
use App\Models\TanggalMerah;
use Carbon\Carbon;

class TandaiGuruTidakHadir extends Command
{
    protected $signature = 'absensi:tandai:tidak:hadir';
    protected $description = 'Menandai guru yang tidak absen pada jadwal hari ini sebagai tidak hadir.';

    public function handle()
    {
        if (! SistemOtomatis::enabled()) {
            $this->info('Sistem absensi otomatis dimatikan. Proses auto-absensi dibatalkan.');
            return;
        }

        $now = Carbon::now('Asia/Jakarta');
        $today = $now->toDateString();

        if (TanggalMerah::where('tanggal', $today)->exists()) {
            $this->info('Hari ini adalah tanggal libur. Proses auto-absensi dibatalkan.');
            return;
        }

        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ][$now->format('l')];

        $jadwalHariIni = JadwalDetail::where('hari', $hari)
            ->with('jamMapel')
            ->get();

        foreach ($jadwalHariIni as $detail) {
            if (!$now->gt(Carbon::parse($detail->jamMapel->jam_selesai, 'Asia/Jakarta'))) {
                continue;
            }

            $sudahAdaAbsensi = Absensi::where('jadwal_detail_id', $detail->id)
                ->whereDate('waktu_absen', $today)
                ->exists();

            if (! $sudahAdaAbsensi) {
                Absensi::create([
                    'guru_id' => $detail->guru_id,
                    'jadwal_detail_id' => $detail->id,
                    'waktu_absen' => $now,
                    'qr_token_id' => null,
                    'status' => 'tidak_hadir',
                    'via' => 'otomatis',
                ]);
            }
        }

        $this->info('Guru yang tidak absen telah ditandai.');
    }
}
