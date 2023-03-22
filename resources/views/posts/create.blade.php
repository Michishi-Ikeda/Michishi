<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        <h1>Blog Name</h1>
       <form action="/posts" method = "POST">
           @csrf
           <div class = "title">
               <h2>title</h2>
               <input type = "text" name = post[title] placeholder = "タイトル" value = {{ old('post.title')}}>
               <p class = "title_error" style = "color:red">{{ $errors->first('post.title')}}</p>
           </div>
           <div class = "body">
               <h2>Body</h2>
               <textarea name = "post[body]" placeholder = "今日も一日お疲れさまでした" value = {{ old('post.body')}}></textarea> 
               <p class = "body_error" style = "color:red">{{ $errors->first('post.body')}} </p>
           </div>
           <input type="submit" value = "保存"/>
       </form>
        <div class="back">
            [<a href="/">back</a>]
        </div>
    </body>
</html>
