<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @if(Auth()->user()->role == "admin")
    <nav>
        <ul>
            <li>
                <a href="{{ route('poll.index') }}">Management Poll</a>
            </li>
            <li>
                <a href="#">Management User</a>
            </li>
            <li>
                <a href="#">Management Division</a>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>
    </nav>
    @endif

    @if(Auth()->user()->role == "user")
    <nav>
        <ul>
            <li>
                <a href="#">All Poll</a>
            </li>
            <li>
                <a href="#">My Poll</a>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>
    </nav>
    @endif
</body>
</html>