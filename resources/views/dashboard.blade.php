<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">

            <section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">
                    {{ __('Test buttons') }}
                </h2>
                <div class="max-w-xl flex flex-row gap-2">
                    <form action="{{route('test.notify')}}" method="POST">
                        @csrf
                        <x-primary-button>Send notif</x-primary-button>
                    </form>
                    <form action="{{route('test.dialog')}}" method="POST">
                        @csrf
                        <x-primary-button>Open dialog</x-primary-button>
                    </form>
                </div>
            </section>

            <section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">
                    {{ __('New note') }}
                </h2>
                <form action="{{route('notes.store')}}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <x-text-input
                        id="title"
                        name="title"
                        type="title"
                        class="p-2 w-full border"
                        placeholder="{{ __('Title') }}"
                    />

                    <x-text-input
                        id="content"
                        name="content"
                        type="content"
                        class="p-2 w-full border"
                        placeholder="{{ __('Content') }}"
                    />

                    <x-primary-button class="justify-center">Create new note</x-primary-button>
                </form>
            </section>

            <section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('All notes') }}
                </h2>
                <div class="flex flex-col gap-2">
                    @foreach(\Illuminate\Support\Facades\Auth::user()->notes()->get() as $note)
                        <div class="p-2 bg-gray-100 rounded-md">
                            <p>
                                <span class="font-bold">Title :</span>
                                {{$note->title}}
                            </p>
                            <p>
                                <span class="font-bold">Content :</span>
                                {{$note->content}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
