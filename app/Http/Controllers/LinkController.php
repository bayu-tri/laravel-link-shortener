<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    // For Dashboard Page
    public function index()
    {
        // Get the User model with the ID = Authenticated User
        $userLinkModel = User::find(auth()->id());

        // Get the User's Links data
        $userLinks = $userLinkModel->links;
        // Count the User's Links data
        $totalLinks = $userLinks->count();
        // Count the User's Links data that Active
        $totalActive = $userLinks->where('status', 1)->count();
        // Count User's Links data that Inactive
        $totalInactive = $userLinks->where('status', 0)->count();
        // Count User's Links total Cilick
        $totalClick = $userLinks->sum('counter');
        
        // Redirect to dashboard view with some data
        return view('links.dashboard', compact('userLinks', 'totalLinks', 'totalActive', 'totalInactive', 'totalClick', 'userLinks'));
    }

    public function create()
    {
        // Redirect to Create New view with some data
        return view('links.create_new');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'url' => 'required|string|url',
            'slug' => 'nullable|string|unique:links,slug',
        ]);

        // If slug is inputed, use it, if not random the slug
        $slug = isset($validated['slug']) ? $validated['slug'] : uniqid();

        // Make the link model and its data
        $link = new Link([
            'name' => $validated['name'],
            'user_id' => auth()->id(),
            'slug' => $slug,
            'link' => $validated['url'],
            'status' => 1
        ]);

        // Push the Link model above to DB
        $link->save();
        //Redirect to Dashboard with success massage
        return redirect()->route('dashboard')->with('success', 'URL Successfully Shortened!');
    }

    public function edit($id)
    {
        // Get the specific link by id
        $links = Link::where('id', $id)->first();
        // return the view and pass the link variable above
        return view('links.edit', compact('links'));
    }

    public function update(Request $request, $id)
    {
        // Get the specific link by id
        $links = Link::findOrFail($id);
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'url' => 'required|string|url',
            'slug' => 'nullable|string|unique:links,slug,'.$links->id,
            'status' => 'required|string|in:active,inactive',
            'resetClick' => 'nullable|string'
        ]);
        // update the link with the validated data
        $links->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'link' => $validated['url'],
            'status' => ($validated['status'] == 'active' ) ? 1 : 0,
            'counter' => (isset($validated['resetClick'])) ? 0 : $links->counter,
        ]);
        // redirect to edit link page and pass the success message
        return redirect()->route('links.edit', $links->id)->with('success', 'Link Successfully Edited!');
    }

    public function destroy($id)
    {
        // Delete the link with the specific ID
        Link::findOrFail($id)->delete();
        // redirect to dashboard page and pass the success message
        return redirect(route('dashboard'))->with('success', 'Link successfully deleted!');
    }

    public function redirect($slug)
    {
        // Get the link with specific slug
        $link = Link::where('slug', $slug)->firstOrFail();
        // Check if link status is active or not
        if ($link->status === 0) {
            // If inactive redirect to 404 Page
            abort(404);
        }

        //  If link active increment the counter in DB
        $link->increment('counter', 1);
        // redirect the visitor to the real URL
        return redirect($link->link);
    }
}
