<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    protected $setting;
    use DeleteModelTraits;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('backEnd.admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('backEnd.admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
           'config_key'=> $request->config_key,
           'config_value'=> $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('settings.index');
    }

    public function edit($id)
    {
        $settings = $this->setting->find($id);
        return view('backEnd.admin.setting.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key'=> $request->config_key,
            'config_value'=> $request->config_value,
        ]);
        return redirect()->route('settings.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTraits($id, $this->setting);
    }
}
