<?php

use Illuminate\Database\Seeder;
use App\NiceAction;
use App\Category;

class NiceActionSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $nice_action = new NiceAction();
        $nice_action->name = "Greet";
        $nice_action->niceness = 3;
        $nice_action->save();
        
        $nice_action = new NiceAction();
        $nice_action->name = "Hug";
        $nice_action->niceness = 6;
        $nice_action->save();
        
        $nice_action = new NiceAction();
        $nice_action->name = "Kiss";
        $nice_action->niceness = 12;
        $nice_action->save();
        
        $nice_action = new NiceAction();
        $nice_action->name = "Wave";
        $nice_action->niceness = 16;
        $nice_action->save();
    }
}
