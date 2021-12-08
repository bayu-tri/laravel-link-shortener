<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    // For accessing the page for edit the user data
    public function index($id)
    {
        $userInfo = User::findOrFail($id);
        return view('users.edit', compact('userInfo'));
    }

    // For updating the user data
    public function update(Request $request, $id)
    {
        // Validate the request data from FORM
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'picture' => 'image|max:2000',
        ]);

        $user = User::findOrFail($id);

        //Check if request has a picture Image
        if($request->has('picture')) {
            $picture = $request->picture;
            $newPicture = time().$picture->getClientOriginalName();

            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
                'picture'  => 'img/users/pictures/'.$newPicture,
            ];

            $picture->move('img/users/pictures/', $newPicture);

            if(file_exists(public_path($user->picture)) && $user->picture != 'img/undraw_profile.svg') {
                File::delete($user->picture);
            }
        }
        //If request doesn't have picture Image
        else {
            $user_data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
        }

        //Inserting the new Post
        $user->update($user_data);

        return redirect()->route('user.edit', auth()->id())->with('success', 'User Info Successfully saved!');
    }
}
