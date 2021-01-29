<?php

namespace App\Jobs;

use App\Models\Absent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class reAbsen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $absen,$jam;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($absen,$jam)
    {
        $this->absen = $absen;
        $this->jam = $jam;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Absent::where("jam",$this->jam)->where("guru_id",$this->absen["guru"])->delete();
    }
}
