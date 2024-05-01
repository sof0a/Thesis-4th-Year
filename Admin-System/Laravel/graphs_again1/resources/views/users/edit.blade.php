<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
        <!-- resources/views/users/edit.blade.php -->
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <!-- Input fields for user data -->
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="email" name="email" value="{{ $user->email }}">
        <!-- Submit button -->
        <button type="submit">Update User</button>
    </form>

</body>
</html>