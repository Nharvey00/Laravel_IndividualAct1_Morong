<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit candidates</title>
</head>
<body>
    <h1>Edit Candidate</h1>
    <form method="POST" action="/candidates/update/{{ $candidate->id }}">
        @csrf
        <label>First name:</label><br>
        <input type="text" name="first_name" value="{{ $candidate->first_name }}" required><br><br>

        <label>Middle name:</label><br>
        <input type="text" name="middle_name" value="{{ $candidate->middle_name }}"><br><br>

        <label>Last name:</label><br>
        <input type="text" name="last_name" value="{{ $candidate->last_name }}" required><br><br>

        <label>Gender:</label><br>
        <input type="text" name="gender" value="{{ $candidate->gender }}" required><br><br>

        <label>Address:</label><br>
        <input type="text" name="address" value="{{ $candidate->address }}" required><br><br>

        <label>Position:</label><br>
        <input type="text" name="position" value="{{ $candidate->position }}" required><br><br>

        <label>Party:</label><br>
        <input type="text" name="party" value="{{ $candidate->party }}"><br><br>

        <button type="submit">Update</button>
        </form>
        <br>
    <a href="/candidates">Back to Candidate List</a>
</body>
</html>