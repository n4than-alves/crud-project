<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarefas') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Editando a Tarefa: <strong>{{$task->title}}</strong></p>
                </div>

                <div class="p-2">
                    
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 ">
                            <label for="title">Título:</label><br>
                            <input class="rounded py-2 px-4" type="text" name="title" value="{{ $task->title }}" required>
                        </div>
                        <div class="mb-4 ">
                            <label for="description">Descrição:</label><br>
                            <textarea class="rounded py-2 px-4" name="description">{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-4 ">
                            <label for="description">Status:</label><br>
                            <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
                        </div>

                            <button class="text-black rounded py-2 px-4" type="submit">Atualizar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
</x-app-layout>