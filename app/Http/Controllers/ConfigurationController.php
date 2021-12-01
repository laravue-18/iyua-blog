<?php

namespace App\Http\Controllers;

use App\Models\CoreConfig;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index(){
        $core_config = CoreConfig::all()->pluck('value', 'code');
        return view('user.setting')->with(compact('core_config'));
    }

    public function update(Request $request){
        $items = $request->except(['_token', '_method']);
        foreach ($items as $key => $item){
            $core_config = CoreConfig::where('code', $key)->first();
            $core_config->value = $item;
            $core_config->save();
        }
        return back()->with('message', 'Updated Successfully');
    }
}
