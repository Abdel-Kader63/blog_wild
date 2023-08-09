<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Chirp;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    { {
            $chirps = Chirp::all();

            return view('posts.show', ['chirps' => $chirps]);
        }
    }

    /**
     *créer
     */
    public function create()
    {
        //
    }

    // enregistrer et validation de commentaires 
    public function store(Post $post, Request $request)
    {
        

            if (!Auth::check()) {
                return redirect()->back();
            }
            
            $validated = $request->validate([
                'message' => 'required|string|max:255',
            ]);
    
            $chirp = new Chirp();
            $chirp->message = $validated['message'];
            $chirp->user_id = auth()->id();
            $chirp->post_id = $post->id;
            $chirp->save();
            return redirect()->back()->with('success', 'Commentaire add');
       
        
    }
    


    // éditer un commentaire 
    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    // mettre à jour 
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route("posts.show", $chirp->post));
    }


    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect()->back()->with('success', 'Chirp deleted ');
    }
}