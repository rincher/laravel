<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">📋 할 일 목록</h1>

        <!-- 할 일 추가 폼 -->
        <form method="POST" action="/tasks" class="flex gap-2 mb-6">
            @csrf
            <input 
                type="text" 
                name="title" 
                placeholder="할 일을 입력하세요"
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
            <button 
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" 추가
            >
            </button> 
        </form>

        <!-- 할 일 목록 -->
        <ul class="space-y-3">
            @forelse ($tasks as $task)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg p-3">
                    <form method="POST" action="/tasks/{{ $task->id }}/toggle" class="flex items-center gap-3 w-full">
                        @csrf
                        <button type="submit" class="text-xl">
                            {{ $task->completed ? '✔️' : '❌' }}
                        </button>
                        <span class="{{ $task->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $task->title }}
                        </span>
                    </form>
                </li>
            @empty
                <li class="text-center text-gray-500">할 일이 없습니다.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>

