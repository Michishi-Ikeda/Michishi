<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller

{
    public function index(Post $post)
    {
        //return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
         $client = new \GuzzleHttp\Client();
           $url = 'https://teratail.com/api/v1/questions';
           
           $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        $questions = json_decode($response->getBody(), true);
        
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
             ]);
    }



    public function show(Post $post)
    {
      return view('posts/show')->with(['post' => $post]);
    }
   
   
    public function store(Post $post,PostRequest $request)
    {
       $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
   
    public function edit(Post $post)
    {
       return view('posts/edit')->with(['post' => $post]);
    }
   
    public function update(Post $post,PostRequest $request)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect ('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function create(Category $category)
    {
        
        return view('posts/create')->with(['categories' => $category->get()]);
    
    }
    
    
    
       
        
        
       
        
    
        
   }
?>
