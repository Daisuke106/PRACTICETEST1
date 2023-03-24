<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
     <body>
        <h1>ブログ</h1>
        <a href = "/posts/create">新規作成</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href = "/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                    </form>
                    
                </div>
            @endforeach
        </div>
        <div class='paginate'> {{ $posts->links() }}</div>
        <script>
            function deletePost(id)
            {
                'use strict'
                
                if(confirm("一度削除すると復元できません。\n削除しますか？")){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>