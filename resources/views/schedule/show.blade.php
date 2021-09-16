@extends('layout.template')

@section('title')
    {{ $schedule->name }}
@endsection

@section('body')
    <div class="flex flex-row:x">
        @foreach($schedule->getEventsByWeekday() as $dayOfWeek => $events)
            <div class="border-2 border-yellow-300 rounded m-2 w-96">
                <div class="text-2xl border-b-2 border-yellow-300 p-4">
                    {{ $dayOfWeek }}
                </div>
                <div class="w-full">
                    @foreach($events as $event)
                        <div class="@if(!$loop->last) border-b-2 border-gray-500 @endif w-full p-2">
                            <div class="text-gray-500 mb-4">
                                {{ $event->start_time }}
                            </div>
                            <div class="text-lg font-bold @if(date('D') == substr($dayOfWeek, 0, 3) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) text-yellow-300 @else text-white @endif">
                                {{ $event->name }}
                            </div>
                            <div class="text-base mb-4 @if(date('D') == substr($dayOfWeek, 0, 3) && strtotime($now) >= strtotime($event->start_time) && strtotime($now) < strtotime($event->end_time)) text-yellow-300 @else text-white @endif">
                                @if($event->activities->count())
                                    @foreach($event->activities as $activity)
                                        <div class="flex flex-row justify-start pl-2">
                                            <div class="pr-4">{!! $activity->icon !!}</div>
                                            <div>{{ $activity->name }}</div>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach(explode(",", $event->description) as $item)
                                        {{ $item }}<br />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
