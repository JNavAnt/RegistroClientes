<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="d-flex- justify-content-center text-align-center">
                <img class="m-auto" style="width: 40%" src="{{asset('public\assets\iTech-Logo-2021.png')}}" alt="">
            </div>
        </div>
    @endsection
</x-app-layout>
