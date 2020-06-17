<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class AuthorController extends Controller
{
    /**
     * Display a listing of the authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the author lists
        $authors = User::admin(false)->withCount('posts')->withCount('comments')->get();

        // Return to index page
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Remove the specified author from storage.
     *
     * @param  \App\Models\User  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $author)
    {
        // Check author's permission
        if ($author->is_admin) {

            // If user is admin, show danger message
            Toastr::error('Permission Denied !', 'Error');
        } else {

            // Delete author from db
            $author->delete();

            // Make success response
            Toastr::success('Author Successfully Deleted !', 'Success');
        }

        // Return to index page
        return redirect()->back();
    }
}
