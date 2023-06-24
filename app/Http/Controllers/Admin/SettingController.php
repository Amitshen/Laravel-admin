<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'Site Settings';
        $data['setting'] = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.edit', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $settings = $request->except(['_token', 'logo', 'favicon']);
        foreach ($settings as $key => $value) {
            # code...
            Setting::updateOrCreate(['key' => $key], [
                'value' => $value,
            ]);
        }

        if($request->file('logo')) {
            $file = $request->file('logo');
            $imageName = $this->UpdateImage($file, 'assets/logo');
            Setting::updateOrCreate(['key' => 'logo'], [
                'value' => $imageName,
            ]);
        }
        if($request->file('favicon')) {
            $file = $request->file('favicon');
            $imageName = $this->UpdateImage($file, 'assets/favicon');
            Setting::updateOrCreate(['key' => 'favicon'], [
                'value' => $imageName,
            ]);
        }

        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');

        return redirect()->back()->with('msg', 'Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
