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
                            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back
                            </a>
                        </div>
                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea name="description" id="description" cols="10" rows="10" class="block mt-1 w-full" autocomplete="description">{{ old('description', $task->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="deadline_at" :value="__('Deadline At')" />
                                <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at', $task->deadline_at)" required autocomplete="deadline_at" />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="user_id" :value="__('Assigned User')" />
                                <select name="user_id" id="user_id" class="block mt-1 w-full">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @selected(old('user_id', $task->user_id) == $user->id)>{{ $user->first_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="client_id" :value="__('Assigned Client')" />
                                <select name="client_id" id="client_id" class="block mt-1 w-full">
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @selected(old('client_id', $task->client_id) == $client->id)>{{ $client->company_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="project_id" :value="__('Assigned Project')" />
                                <select name="project_id" id="project_id" class="block mt-1 w-full">
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" @selected(old('project_id', $task->project_id) == $project->id)>{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                            </div>
                            @php
                            // dd(\App\Enums\TaskStatus::cases());
                            @endphp
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full">
                                    @foreach (\App\Enums\TaskStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', $task->status->value ?? null) == $status->value)>
                                        {{ $status->value }}
                                    </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <x-primary-button class="ms-4">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
