<?php

use Illuminate\Database\Seeder;

class applicantstatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status= new \app\applicantstatus([
        	'statusName'=>'Applied'
        	]);
        $status->save();
        $status= new \app\applicantstatus([
        	'statusName'=>'Interviewed'
        	]);
        $status->save();
        $status= new \app\applicantstatus([
        	'statusName'=>'Offered'
        	]);
        $status->save();
        $status= new \app\applicantstatus([
        	'statusName'=>'Hired'
        	]);
        $status->save();
        $status= new \app\applicantstatus([
        	'statusName'=>'Declined'
        	]);
        $status->save();
    }
}
