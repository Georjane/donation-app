<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campaigns') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Manage Your Campaigns</h3>
                    <p>Here you can view, create, and manage your fundraising campaigns.</p>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <!-- View Donations Card -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Donations</h3>
                    <p>Check the status of your donations.</p>
                    <a href="{{ route('donations.index') }}" class="mt-2 inline-block text-blue-600 hover:underline">View Donations</a>
                </div>

                <!-- Create Campaign Card -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Create Campaign</h3>
                    <p>Start a new fundraising campaign.</p>
                    <a href="{{ route('campaigns.create') }}" class="mt-2 inline-block text-blue-600 hover:underline">Create Campaign</a>
                </div>

                <!-- List of Existing Campaigns -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Your Campaigns</h3>
                    <p>Here are your active campaigns:</p>
                    <ul class="mt-2">
                        @foreach($campaigns as $campaign)
                            <li class="mt-2">
                                <a href="{{ route('campaigns.show', $campaign->id) }}" class="text-blue-600 hover:underline">{{ $campaign->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
