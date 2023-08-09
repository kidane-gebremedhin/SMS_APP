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
        $this->number=$number;
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
        $count=0;
        $sentMessages="";
         foreach ($this->number as $phoneNumber) {
            $count++;
            /*if($count>12)
                break;*/
            $this->recipientPhoneNumbersStr=/*$this->recipientPhoneNumbersStr.*/"<Phone>".$phoneNumber."</Phone>";
           //if($count % 10 == 0 || $count==count($this->number)){
            $sentMessages=$sentMessages."________________________".$this->recipientPhoneNumbersStr;
                sleep(3);
                $output = shell_exec('./send_sms.sh "'.$this->recipientPhoneNumbersStr.'" "'.$this->message.'"');
                //usleep(50*200*1000);//50*0.2 seconds
                sleep(3);
                $this->recipientPhoneNumbersStr="";
            //}
        }
        chdir($old_path);
        /*echo $count." - Messages Sent<br>";
        dd ($sentMessages);*/
    }
}
