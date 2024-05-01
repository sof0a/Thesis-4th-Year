<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <!-- resources/views/users/create.blade.php -->
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <!-- Input fields for user data -->
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <!-- Submit button -->
        <button type="submit">Create User</button>
    </form>
    
</body>
</html>