<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{auth()->user()->name}}
        <form method="post" action="{{route('post.store')}}">
            @csrf
                <label>title</label>
                <input type="text" name="title" required>

                <label>Content</label>
                <textarea name="content" required></textarea>

                <input type="submit" value="submit">

        </form>

</body>
</html>