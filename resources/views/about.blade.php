<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, My name is {{ $firstName }} {{ $lastName }}!</h1>
    <form action="about" method="post">
        @csrf
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name"> <br><br>
        <select name="department" id="department">
            @foreach ($departments as $key => $department)
                <option value="{{ $key }}">{{ $department }}</option>
            @endforeach
        </select> <br><br>
        <input type="submit" value="send">
    </form>
</body>
</html>
