<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Student</title>
</head>

<body>
    <h2>Add Student</h2>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <input name="sname" placeholder="Name" required>
        <button type="submit">Save</button>
    </form>
</body>

</html>
