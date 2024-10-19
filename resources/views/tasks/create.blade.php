<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Tarefas') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá Usuário: <strong>{{Auth::user()->name}}</strong></p>
                </div>


                    <div class="p-2">
                        <h1 class=" mb-4">Adicionar Nova Tarefa</h1>

                        <form action="{{ route ('task.store')}}" method="POST">
                            @csrf
                            
                            <div class=" mb-4 ">
                                <label for="title">Título:</label><br>
                                <input class="rounded py-2 px-4" type="text" name="title" required>
                            </div>

                            <div class=" mb-4">
                                <label for="description">Descrição:</label><br>
                                <textarea class="rounded py-2 px-4" name="description"></textarea>
                            </div>

                            

                            <button class="text-black rounded py-2 px-4" type="submit">Salvar</button>

                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>