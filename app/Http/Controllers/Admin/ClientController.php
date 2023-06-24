<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Client;
use Symfony\Component\HttpFoundation\Request;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d['data'] = Client::all();
        return view('admin.clients.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name'              => 'required',
            'description'       => 'required',
            'join_since'        => 'required',
        ]);
        try {
            //code...
            $msg = 'Client added successfully';
            if(isset($request->id))
            $image = Client::where('id',$request->id)->pluck('profile_image')->first();
            $msg = 'Client updated successfully';

            Client::updateOrcreate(['id' => $request->id],[
                'name' => $request->name,
                'description' => $request->description,
                'join_since' => $request->join_since,
                'testimonial' => $request->testimonial,
                'profile_image' => isset($request->profile_image)?$this->UpdateImage($request->profile_image,'client/images'):$image,
            ]);

            return redirect()->route('dashboard.clients.index')->with('success',$msg);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('dashboard.clients.index')->with('danger',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Client::where('id',$id)->first();
        return view('admin.clients.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Client::where('id',$id)->first();
        return view('admin.clients.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Client::where('id',$id)->delete();
            $msg = 'Client deleted successfully';
            return redirect()->route('dashboard.clients.index')->with('success',$msg);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('dashboard.clients.index')->with('danger',$th->getMessage());
        }
    }
}
