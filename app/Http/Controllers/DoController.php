<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\NiceAction;

class DoController extends Controller {
    public function getHome () {
        $actions = NiceAction::all();
        return view('home', [
            'actions' => $actions
        ]);
    }
    
    public function getDoAction ($action) {
        return view('actions.do', ['action' => $action]);
    }
    
    public function getNiceAction ($action, $name = null) {
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
