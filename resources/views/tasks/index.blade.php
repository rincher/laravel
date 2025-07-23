<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    <h1>할 일 목록</h1>

    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="할 일을 입력하세요">
        <button type="submit">추가</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form method="POST" action="/tasks/{{ $task->id }}/toggle">
                    @csrf
                    <button type="submit">{{ $task->completed ? '✔️' : '❌' }}</button>
                    {{ $task->title }}
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>

