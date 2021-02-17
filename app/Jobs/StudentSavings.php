<?php

namespace App\Jobs;

use App\Models\Debt;
use App\Models\StudentSaving;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StudentSavings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tahun,$request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tahun,$request)
    {
        $this->tahun = $tahun;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->tahun[0];
        $request = $this->request;
        $debts = Debt::where('tahun',$data->tahun)->get();
        /*
            3,600,000 - ( 5,400,000 - 5,000,000 ) => 3,200,000
            1,200,000 - ( 1,500,000 - 1,000,000 ) = 700,000
            total => ( 3,600,000 + 1,200,000 ) - ( ( 5,400,000 - 5,000,000 ) + ( 1,500,000 - 1,000,000 ) )
            => 4,800,000 - 900,000 = 3,900,000
        */
        foreach ($debts as $debt) {
            $debt->update([
                "tahun" => date("Y"),
                "spp" => ($request["spp"] * 36) - ($data->spp - $debt['spp']),
                "spm" => ($request["spm"]) - ($data->spm - $debt["spm"]),
                "total" => ( ($request["spp"] * 36) + $request["spm"] ) - ( ($data->spp - $debt['spp']) + ($data->spm - $debt['spm']))
            ]);
        }
        $data->update([
            "tahun" => date("Y"),
            "spp" => $request["spp"] * 36,
            "spm" => $request["spm"],
            "total" => ( $request["spp"] * 36 ) + $request['spm']
        ]);
        return;
    }
}
