@extends('layout.template')

@section('title')
    Choose a Schedule
@endsection

@section('body')
    <div class="text-2xl">
        Schedules
    </div>
    <div class="flex flex-col">
        @foreach($schedules as $schedule)
            <a href="{{ route('schedule.show', ['schedule' => $schedule->id ]) }}">
                <div class="border-2 rounded border-yellow-300 text-yellow-300 p-4 m-2 hover:border-yellow-600 hover:text-yellow-600 flex justify-between">
                    <div class="">
                        {{ $schedule->name }}
                    </div>
                    <div class="">
                        {{ $schedule->description }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
