<?php

namespace App\Jobs;

use App\Models\Graduation as GradModel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Repo\SiswaRepository;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Graduation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $students;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $repo = new SiswaRepository();
        foreach ($this->students as $student) {
            GradModel::create([
                "nisn" => $student->nisn,
                "nis" => $student->nis,
                "nama" => $student->user->nama,
                "role" => $student->user->role->role,
                "alamat" => $student->user->alamat,
                "tempat_lahir" => $student->user->tempat_lahir,
                "tanggal_lahir" => $student->user->tanggal_lahir,
                "tahun_masuk" => $student->tahun_masuk,
                "tahun_tamat" => $student->tahun_tamat
            ]);
            $repo->deleteSiswa($student);
        }
    }
}
