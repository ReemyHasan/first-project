<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(3);
        return view("users.show", compact("user", "ideas"));
    }


    public function edit(User $user)
    {
        $this->authorize("update", $user);
        $editing = true;
        $ideas = $user->ideas()->paginate(3);
        return view("users.show", compact("user", "ideas", 'editing'));

    }


    public function update(UpdateUserRequest $request, User $user)
    {
        // $this->authorize("update", $user);

        // if (auth()->id() != $user->id) {
        //     abort(404);
        // }
        $val = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('profile', 'public');
            $val['image'] = $image;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($val);
        $ideas = $user->ideas()->paginate(3);
        return redirect()->route("users.show", ["user" => $user, "ideas" => $ideas]);
    }

}
