<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>Follow Suggestion</h1>

    <table>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <a href="{{ route('profile.show', ['username' => $user->username]) }}" class="text-blue-600 hover:underline">{{ $user->name }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
