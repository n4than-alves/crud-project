<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listar Tarefas') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá Usuário: <strong>{{Auth::user()->name}}</strong></p>
                </div>

                <div  class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-100">
                            <tr>
                            <th class="p-2">ID</th>
                                <th class="p-2">Título</th>
                                <th class="p-2">Descrição</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Ação</th>
                                <th class="p-2">Ação</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr class="hover:bg-gray-100">
                                        <td class="text-center">{{$task->id}}</td>
                                        <td class="text-center">{{$task->title}}</td>
                                        <td class="text-center">{{$task->description}}</td>
                                        <td class="text-center">{{$task->is_completed == 1 ? 'Sim' : 'Não'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('task.edit', $task->id)}}">Editar</a>
                                        </td>
                                        
                                        <td class="text-center"> 
                                <!-- formulario invisível pra poder adicionar o método 'delete' que vai linkar com o a route task.destroy-->
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Tem Certeza?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
