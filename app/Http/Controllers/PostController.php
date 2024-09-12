<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\Post;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();

        return view('posts.index' , ['posts' => $postsFromDB]);
    }

    public function show($id)
    {
//        $singelPost = Post::find($id); // model object (limit 1 )

        $singelPost = Post::where('id' , $id)->first(); // model object (limit 1 )

//        $singelPost = Post::where('id' , $id)->get(); // collection object

        // fisrt solution
//        if (is_null($singelPost)){
//            return to_route('post.index');
//        }


        // 2nd solution
        $singelPost = Post::findOrFail($id);

        //شغل صنايعية
//        $singelPostCountry = country::findOrFail($singelPost->country_id);

        return view('posts.show' , ['singlepost' => $singelPost]) ;
    }

    public function create()
    {
        $countriesFromDB = country::all();

        return view('posts.create' ,['countries' => $countriesFromDB]) ;
    }

    public function store()
    {
        \request()->validate([
            'client_name' => ['required'] ,

            'quotation' => ['required'] ,

            'phone_number' => ['required'] ,

            'email' => ['email' => 'email:rfc,dns'] ,

            'country' => [ 'required' , 'exists:countries,id']

        ]);




        $data = \request()->all();
//        @dd($data);

//        $post = new Post;
//
//        $post->client_name = $data["client_name"];
//
//        $post->quotation = $data["quotation"];
//
//        $post->description = $data["description"];
//
//        $post->last_update = "-";
//
//        $post->state = "new";
//
//        $post->save();



        Post::create([

            'client_name' => $data["client_name"] ,

             'quotation' => $data["quotation"] ,

            'description' => $data["description"] ,

            'last_update' => "-" ,

            'state' => "new" ,

            'phone_number' => $data["phone_number"] ,

            'email' => $data["email"] ,

            'country_id' => $data["country"]


        ]);






        return to_route('post.index') ;
    }

    public function edit(Post $post)
    {

        $countriesFromDB = country::all();


        return view('posts.edit' ,['countries' => $countriesFromDB , 'post' => $post]);
    }

    public function update($postid)
    {

        $data = \request()->all();



        $postFromDB = Post::findOrFail($postid);
//        $countriesFromDB = country::all();

        \request()->validate([
            'client_name' => ['required'] ,

            'quotation' => ['required'] ,

            'phone_number' => ['required'] ,

            'email' => ['email' => 'email:rfc,dns'] ,

            'country' => [ 'required' , 'exists:countries,id']

        ]);


        $postFromDB->update([
             'client_name' => $data["client_name"] ,

             'quotation' => $data["quotation"] ,

             'description' => $data["description"] ,

            'phone_number' => $data["phone_number"] ,

            'email' => $data["email"] ,

            'country_id' => $data["country"]

         ]);

        return to_route('post.show' , $postid);
    }

    public function destroy($postId)
    {

        $post = Post::findOrFail($postId);
        $post->delete();

        return to_route('post.index');
    }

}
