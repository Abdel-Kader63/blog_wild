<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
     // Afficher tous les Post
     public function index() {
        //On récupère tous les Post
        $posts = Post::latest()->get();
    
        // On transmet les Post à la vue
        return view("posts.index", compact("posts"));
    }

    // Créer un nouveau Post
    public function create() {
        // On retourne la vue "/resources/views/posts/edit.blade.php"
        return view("posts.edit");
    }

    // Enregistrer un nouveau Post
    public function store(Request $request): RedirectResponse {
        // 1. La validation

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content'=> 'required|string|max:10000',
                "picture"=> 'required|image|max:1024'
        ]);
        $chemin_image = $request->picture->store("posts");
        $validated["picture"] = $chemin_image;

        $request->user()->posts()->create($validated);

        // 2. On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->picture->store("posts");
        
        // 4. On retourne vers tous les posts : route("posts.index")
        return redirect(route("posts.index"));
    }

    // Afficher un Post
    public function show(Post $post) {
        $chirps = $post->chirps;
        return view("posts.show", compact("post", "chirps"));
    }

    // Editer un Post enregistré
    public function edit(Post $post) :View
    {
        return view("posts.edit", compact("post"));
    }

    // Mettre à jour un Post
    public function update(Request $request, Post $post) {
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

        // Si une nouvelle image est envoyée
        if ($request->has("picture")) {
            // On ajoute la règle de validation pour "picture"
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if ($request->has("picture")) {

            //On supprime l'ancienne image
            Storage::delete($post->picture);

            $chemin_image = $request->picture->store("posts");
        }

        // 3. On met à jour les informations du Post
        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content
        ]);

        // 4. On affiche le Post modifié : route("posts.show")
        return redirect(route("posts.show", $post));
    }

    // Supprimer un Post
    public function destroy(Post $post) {
        // On supprime l'image existant
        Storage::delete($post->picture);

        // On les informations du $post de la table "posts"
        $post->delete();

        // Redirection route "posts.index"
        return redirect(route('posts.index'));
    }
}
