<?php

namespace App\Jobs;

use App\Models\AdminConfirm;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Alert;

class NaikKelas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user_ids,$class_ids;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_ids = null,$class_ids = null)
    {
        $this->user_ids = $user_ids;
        $this->class_ids = $class_ids;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->class_ids !==  null && $this->user_ids !== null) {
            for ($i=0; $i < count($this->user_ids); $i++) {
                AdminConfirm::create([
                    "user_id" => $this->user_ids[$i],
                    "new_class_id" => $this->class_ids[$i]
                ]);
            }
        } else {
            $students = AdminConfirm::get()->all();
            $s = null;
            if(count($students) !== 0) {
                foreach ($students as $student) {
                    $s = Student::where('user_id',$student->user_id)->get()[0];
                    if (isset($s)) {
                        $s->update([
                            "class_id" => $student->new_class_id
                        ]);
                        $student->delete();
                    }
                }
                Alert::success("Berhasil", "Data Siswa Berhasil Diinput");
            }
        }
    }
}
