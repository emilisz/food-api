@extends('app')
@section('content')

<div class="flex flex-col justify-center pt-8 sm:justify-start sm:pt-0 px-6">
    <h1 class="text-2xl font-bold">{{$food['title']}}</h1>
    <a href="/api/v1/foods/{{$food['id']}}" class="text-gray-400 underline">api/v1/foods/{{$food['id']}}</a>
</div>

<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 max-w-96">
        <div class="p-6">
            <div class="flex items-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <h5 class=" text-gray-900 dark:text-white">Description:</h5>
                </div>
            </div>

            <div class="ml-6">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    {{$food['description']}}
                </div>
                <div class="border border-dashed shadow-lg p-3 mt-3">
                    <h5>Ingredients:</h5>
                    <ul class="list-disc list-inside">
                        @foreach ($food['ingredients'] as $ingredient)
                        <li class="text-gray-900">{{$ingredient['title']}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a class="float-right px-2 py-1 rounded bg-yellow-600  mt-5"
                href="{{route('recipe-edit', $food['id'])}}">Edit</a>
        </div>

    </div>
</div>


@endsection