<?php

use Illuminate\Database\Seeder;

class leavestatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status= new \app\leavestatus([
        	'statusName'=>'Pending'
        	]);
        $status->save();
        $status= new \app\leavestatus([
        	'statusName'=>'Approved'
        	]);
        $status->save();
        $status= new \app\leavestatus([
        	'statusName'=>'Declined'
        	]);
        $status->save();
    }
}
