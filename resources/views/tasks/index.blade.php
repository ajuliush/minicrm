<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">

                        <div class="flex justify-start mb-4">
                            <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Tasks
                            </a>
                        </div>

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Assigned To</th>
                                    <th class="px-4 py-2">Client</th>
                                    <th class="px-4 py-2">Project</th>
                                    <th class="px-4 py-2">Deadline</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $task->title }}</td>
                                    <td class="border px-4 py-2">{{ $task->user->first_name }}-{{ $task->user->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $task->client->company_name }}</td>
                                    <td class="border px-4 py-2">{{ $task->project->title }}</td>
                                    <td class="border px-4 py-2">{{ $task->deadline_at }}</td>
                                    <td class="border px-4 py-2">{{ $task->status }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('tasks.edit', $task) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">
                                            Edit
                                        </a>
                                        @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
