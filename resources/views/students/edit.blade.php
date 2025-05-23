<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
</head>

<body>
    <h2>Edit Student</h2>
    <form method="POST" action="{{ route('students.update', $student->sid) }}">
        @csrf @method('PUT')
        <input name="sname" value="{{ $student->sname }}" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>
