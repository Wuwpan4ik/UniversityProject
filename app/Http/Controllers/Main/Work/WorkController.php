<?php

namespace App\Http\Controllers\Main\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Work\StoreRequest;
use App\Models\Like;
use App\Models\Work\Work;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        Debugbar::log($data);
        $work = Work::create($data);

        if ($request->file('image')) {
            $path = $request->file('image')->store("/public/work/{$work->id}");

            $fileName = basename($path);

            $work->image = "work/{$work->id}/$fileName";
            $work->save();
        } else {
            $work->image = null;
            $work->save();
        }
        return redirect()->back();
    }

    public function like(Request $request, Work $work)
    {
        if ($work->userHaveLike()) {
            Debugbar::log(Like::where('work_id', $work->id)->where('user_id', Auth::id())->delete());
        } else {
            Like::create([
                'work_id' => $work->id,
                'user_id' => Auth::id()
            ]);
        }
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
