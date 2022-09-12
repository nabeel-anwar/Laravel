<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <h1>Registration Form</h1>

    <form action="" method="post">
        @csrf
        Name: <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            {{$message}}
        @enderror
        <br><br>
        Email: <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            {{$message}}
        @enderror
        <br><br>
        Password: <input type="password" name="password" id="password" value="{{ old('password') }}">
        @error('password')
            {{$message}}
        @enderror
        <br><br>
        <input type="submit" value="submit">

    </form>
    @if (isset($data))
        @foreach ($data as $item)
            <h1>{{$item}}</h1>
        @endforeach
        
    @endif

</body>
</html>