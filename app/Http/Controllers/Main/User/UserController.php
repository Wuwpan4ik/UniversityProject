<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PharIo\Version\Exception;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {
        return view('account.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user) {


        $data = $request->validated();

        $user->update($data);

        if ($request->file('avatar')) {
            if ($user->avatar) {
                try {
                    Storage::delete('/public/' . $user->avatar);
                } catch (Exception $e) {
//
                }

            }
            $path = $request->file('avatar')->store('/public/avatars');

            $fileName = basename($path);

            $user->avatar = 'avatars/' . $fileName;
            $user->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
