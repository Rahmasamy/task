<!DOCTYPE html>
<html>
<head>
    <title>Task Form</title>
</head>
<body>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/task" method="POST">
        @csrf
        <textarea name="content" rows="5" placeholder="Enter your content"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
