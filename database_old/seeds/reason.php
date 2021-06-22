<?php

use Illuminate\Database\Seeder;

class reason extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason= new \app\reason([
        	'reasonType'=>'Sick'
        	]);
        $reason->save();
        $reason= new \app\reason([
        	'reasonType'=>'Permission'
        	]);
        $reason->save();
        $reason= new \app\reason([
        	'reasonType'=>'Casual'
        	]);
        $reason->save();
        $reason= new \app\reason([
        	'reasonType'=>'Unpaid'
        	]);
        $reason->save();
        $reason= new \app\reason([
        	'reasonType'=>'Maternity'
        	]);
        $reason->save();
        $reason= new \app\reason([
        	'reasonType'=>'Others...'
        	]);
        $reason->save();
    }
}
