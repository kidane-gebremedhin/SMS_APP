<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $number;
    protected $recipientPhoneNumbersStr="";
    protected $message;
    public function __construct($number, $message)
    {
        //$this->number=$number;
        foreach ($number as $phoneNumber) {
            $this->recipientPhoneNumbersStr=$this->recipientPhoneNumbersStr."<Phone>".$phoneNumber."</Phone>";
        }
        $this->message=$message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $old_path = getcwd();
        $shell_path = storage_path().'/shell_scripts';
        chdir($shell_path);
        //$output = shell_exec('./send_sms.sh "'.$this->number.'" "'.$this->message.'"');
        $output = shell_exec('./send_sms.sh "'.$this->recipientPhoneNumbersStr.'" "'.$this->message.'"');
        chdir($old_path);
        usleep(200*1000);//0.2 seconds
        echo "Here Sent<br>";
        dd ($this->recipientPhoneNumbersStr);
    }
}
