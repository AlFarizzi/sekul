<?php

namespace App\Jobs;

use App\Models\Absent;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Repo\AbsenRepository;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class doAbsen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $request;
    public $class;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request,$class)
    {
        $this->request = $request;
        $this->class = $class;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->request["hadir"] as $key => $hadir) {
            Absent::create([
                "user_id" => $hadir,
                "tanggal" => date("Y-m-d"),
                "guru_id" => $this->request["guru"],
                "class_id" => $this->class->id,
                "jam" => date("H:i"),
                "keterangan" => "hadir"
            ]);
        }
        foreach ($this->request["izin"] as $key => $hadir) {
            Absent::create([
                "user_id" => $hadir,
                "tanggal" => date("Y-m-d"),
                "guru_id" => $this->request["guru"],
                "class_id" => $this->class->id,
                "jam" => date("H:i"),
                "keterangan" => "izin"
            ]);
        }
        foreach ($this->request["sakit"] as $key => $hadir) {
            Absent::create([
                "user_id" => $hadir,
                "tanggal" => date("Y-m-d"),
                "guru_id" => $this->request["guru"],
                "class_id" => $this->class->id,
                "jam" => date("H:i"),
                "keterangan" => "sakit"
            ]);
        }
    }
}
