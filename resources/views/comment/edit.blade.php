<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{auth()->user()->name}}
        <form method="post" action="{{ route('comment.update',$comment->id)}}">
            @csrf
                <label>title</label>
                <input type="text" name="title" required value="{{ $comment->title }}">

              

                <label>Content</label>
                <textarea name="content" required>{{$comment->content}}</textarea>

                <input type="submit" value="update">

        </form>

</body>
</html>