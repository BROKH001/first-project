<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>

<body>

    <h1>Students</h1>
    <a href="{{ route('students.create') }}">Add Student</a>
    <ul>
        @foreach ($students as $s)
            <li>
                {{ $s->sname }} |
                <a href="{{ route('students.edit', $s->sid) }}">Edit</a> |
                <form method="POST" action="{{ route('students.destroy', $s->sid) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>
