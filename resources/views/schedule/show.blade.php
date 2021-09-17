@extends('layout.template')

@section('title')
    {{ $schedule->name }}
@endsection

@section('body')
    <div class="flex flex-row:x">
        @foreach($schedule->getEventsByWeekday() as $dayOfWeek => $events)
            @if(!request()->has('focus') || date('D') == substr($dayOfWeek, 0, 3))
                <div class="w-96 @if(request()->has('focus')) sm:w-full md:w-2/5 @else border-2 border-gray-400 rounded m-2 @endif">
                    <div class="text-2xl border-b-2 border-gray-400 p-4 text-green-500 flex flex-row justify-between">
                        <div class="flex flex-row justify-between items-center w-full">
                            <div class="font-bold">{{ $dayOfWeek }}</div>
                            @if(request()->has('focus'))
                                <div class="font-light text-sm">{{ date('M d, Y g:i A') }}</div>
                            @endif
                        </div>
                        @if(date('D') == substr($dayOfWeek, 0, 3) && !request()->has('focus'))
                            <a href="?focus=true"><div class="border border-gray-400 rounded text-gray-400 px-4 py-1 text-sm hover:bg-gray-400 hover:text-black hover:border-black">Focus</div></a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach($events as $event)
                            <div class="@if(!$loop->last) border-b-2 border-gray-500 @endif w-full p-2">
                                <div class="text-gray-500 text-sm text-center mb-4">
                                    {{ date('g:i A', strtotime($event->start_time)) }}
                                </div>
                                <div class="text-base mb-4 @if($event->isToday() && $event->isNow()) text-yellow-300 @elseif($event->isToday() && $event->isPast()) text-gray-700 @else text-white @endif">
                                    @if($event->activities->count())
                                        @foreach($event->activities as $activity)
                                            <div class="flex flex-row justify-start pl-2 py-0.5">
                                                <div class="pr-4">{!! $activity->icon !!}</div>
                                                <div>{{ $activity->name }}</div>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach(explode(",", $event->description) as $item)
                                            <div>{{ $item }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
