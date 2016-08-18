<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\NiceAction;
use App\NiceActionLog;

class DoController extends Controller {
    public function getHome () {
        $actions = NiceAction::all();
        $action_logs = NiceActionLog::all();
        return view('home', [
            'actions' => $actions,
            'action_logs' => $action_logs
        ]);
    }
    
    public function getDoAction ($action) {
        $name = null;
        $nice_action = NiceAction::where('name', $action)->first();
        $nice_action_log = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);
        
        return view('actions.do', ['action' => $action]);
    }
    
    public function getNiceAction ($action, $name = null) {
        $nice_action = NiceAction::where('name', $action)->first();
        $nice_action_log = new NiceActionLog();
        $nice_action->loggedActions()->save($nice_action_log);
        
        return view('actions.'.$action, [
            'name' => $name
        ]);
    }
    
    public function postAddAction (Request $request) {
        $this->validate($request, [
            'name' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric'
        ]);
        
        $action = new NiceAction();
        $action->name = ucfirst(strtolower($request['name']));
        $action->niceness = $request['niceness'];
        $action->save();
        
        return redirect()->route('home');
    }
    
    public function postNiceAction (Request $request) {
        $this->validate($request, [
            'action' => 'required',
            'name' => 'required|alpha'
        ]);
        
        $actions = NiceAction::all();
        
        return view('actions.nice', [
            'actions' => $actions,
            'action' => $request['action'],
            'name' => $this->transformName($request['name'])
        ]);
    }
    
    private function transformName ($name) {
        $prefix = 'KING';
        return $prefix." ".strtoupper($name);
    }
}
