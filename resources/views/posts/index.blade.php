<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('create', App\Models\Post::class)
                        <div class="flex justify-end m-2 p-2">
                            <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                                New Post</a>
                        </div>
                    @endcan
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TÍTULO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    AÇÕES
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $post->id }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $post->title }}
                                    </th>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex space-x-2">
                                            @can('update', $post)
                                                <a href="{{ route('posts.edit', $post->id) }}" class="flex items-center text-blue-600 dark:text-blue-500 hover:underline">
                                                    <x-codicon-edit class="h-6 w-6" /><span class="font-medium mx-3">Editar</span>
                                                </a>
                                            @endcan
                                            @can('delete', $post)
                                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex items-center text-red-600 dark:text-red-500 hover:underline">
                                                        <x-codicon-trash class="h-6 w-6" /><span class="font-medium mx-3"> Apagar</span>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
