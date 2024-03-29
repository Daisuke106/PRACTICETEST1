<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
     <body>
         <h1>ブログ作成</h1>
        <form action ="/posts" method = "POST">
            @csrf
            <div class = "title">
                <h2>タイトル</h2>
                <input type="text" name=post[title] placeholder="タイトル" value={{old('post.title')}}>
                <p class = 'title_error' style="color:red">{{ $errors->first('post.title')}}</p>
            </div>
            <div class = "body">
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="テスト" >{{old('post.body')}}</textarea>
                <p class = 'body_error'  style="color:red">{{ $errors->first('post.body')}}</p>
            </div>
            <input type="submit" value ="作成">
            
        </form>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>