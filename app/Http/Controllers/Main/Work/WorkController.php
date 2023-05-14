<?php

namespace App\Http\Controllers\Main\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Work\StoreRequest;
use App\Models\Work\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $work = Work::create($data);

        if ($request->file('image')) {
            $path = $request->file('image')->store("/public/work/{$work->id}");

            $fileName = basename($path);

            $work->image = "work/{$work->id}/$fileName";
            $work->save();
        }
        return redirect()->back();
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
