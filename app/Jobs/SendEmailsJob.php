<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\MailController;

class SendEmailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $password;
    protected $to;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($password, $to, $name = null)
    {
        $this->password = $password;
        $this->to = $to;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        MailController::index($this->password, $this->to, $this->name);
    }
}
