@extends('layout.template')

@section('title')
    {{ $schedule->name }}
@endsection

@section('body')
    <div class="text-2xl">
        Schedules
    </div>
    <div class="flex flex-row">
        @foreach($schedule->getEventsByWeekday() as $dayOfWeek => $events)
            <div class="border-2 border-yellow-300 rounded m-2 w-96">
                <div class="text-2xl border-b-2 border-yellow-300 p-4">
                    {{ $dayOfWeek }}
                </div>
                <div class="w-full">
                    @foreach($events as $event)
                        <div class="@if(!$loop->last) border-b-2 border-gray-500 @endif w-full @if(date('D') == substr($dayOfWeek, 0, 3) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) bg-yellow-600  @endif p-2">
                            <div class="@if(date('D') == strtolower(substr($dayOfWeek, 0, 3)) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) text-yellow-900 @else text-gray-500 @endif mb-4">
                                {{ $event->start_time }}
                            </div>
                            <div class="text-lg font-bold @if(date('D') == substr($dayOfWeek, 0, 3) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) text-yellow-800 @else text-white @endif">
                                {{ $event->name }}
                            </div>
                            <div class="text-base mb-4 @if(date('D') == substr($dayOfWeek, 0, 3) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) text-yellow-900 @else text-white @endif">
                                @foreach(explode(",", $event->description) as $item)
                                    {{ $item }}<br />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
