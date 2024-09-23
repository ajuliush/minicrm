<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">

                        <div class="flex justify-start mb-4">
                            <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back
                            </a>
                        </div>

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <h2 class="text-lg font-bold mb-4">Contact Information</h2>
                            <!-- Name -->
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" required autocomplete="email" />
                                <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                            </div>
                            <!-- Phone -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="contact_phone_number" :value="old('contact_phone_number')" required autocomplete="phone" />
                                <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                            </div>
                            <h2 class="text-lg font-bold mb-4 mt-4">Company Information</h2>
                            <!-- Company Name -->
                            <div class="mt-4">
                                <x-input-label for="company_name" :value="__('Company Name')" />
                                <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autocomplete="company_name" />
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>
                            <!-- Company VAT -->
                            <div class="mt-4">
                                <x-input-label for="company_vat" :value="__('Company VAT')" />
                                <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat" :value="old('company_vat')" required autocomplete="company_vat" />
                                <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                            </div>
                            <!-- Company Address -->
                            <div class="mt-4">
                                <x-input-label for="company_address" :value="__('Company Address')" />
                                <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address')" required autocomplete="company_address" />
                                <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                            </div>
                            <!-- Company City -->
                            <div class="mt-4">
                                <x-input-label for="company_city" :value="__('Company City')" />
                                <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city')" required autocomplete="company_city" />
                                <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                            </div>
                            <!-- Company zip -->
                            <div class="mt-4">
                                <x-input-label for="company_zip" :value="__('Company Zip')" />
                                <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip" :value="old('company_zip')" required autocomplete="company_zip" />
                                <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">

                                <x-primary-button class="ms-4">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
