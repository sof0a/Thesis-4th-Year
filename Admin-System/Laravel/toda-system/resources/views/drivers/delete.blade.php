<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Form</title>
</head>
<body>
    <!-- resources/views/users/delete.blade.php -->
    <form method="POST" action="{{ route('driver.delete', $driver->id) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this user?</p>
        <button type="submit">Delete Driver</button>
    </form>

</body>
</html>
