<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{auth()->user()->name}}
        <form method="post" action="{{route('comment.destroy',$comment->id)}}">
            @csrf
               <p>Are you sure want to delete?</p>
               <p>following will be deleted</p>
               <p>title:{{$comment->title}}</p>
                <input type="submit" value="delete">

        </form>

</body>
</html>