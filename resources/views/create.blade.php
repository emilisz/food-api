@extends('app')
@section('content')

<div class="flex flex-col justify-center pt-8 sm:justify-start sm:pt-0 px-6">
    <h1 class="text-lg ">Create new recipe:</h1>
    <a href="/api/v1/foods" class="text-gray-400 underline">api/v1/foods (post)</a>
</div>

<div class="mt-8  overflow-hidden shadow sm:rounded-lg max-w-96">
    <form action="api/v1/foods" method="post">
        @csrf
        <div>
            <input type="text" name="title" class="w-full rounded px-4 py-1 mb-2" placeholder="Enter title .." required>
            <br>
            <textarea type="text" name="description" placeholder="Description .." class="w-full rounded px-4 py-1 mb-2 "
                rows="7" required></textarea>
        </div>

        <div class="p-3 border border-dashed">
            @foreach ($ingredients as $ingredient)
            <input type="checkbox" name="ingredients[]" id="{{$ingredient->id}}" value="{{$ingredient->id}}">
            <label for="ingredient{{$ingredient->id}}">{{$ingredient->title}}</label><br>
            @endforeach
        </div>

        <button type="submit"
            class=" px-4 py-1 bg-gray-800 text-white rounded underline float-right m-3">Submit</button>
    </form>

</div>


@endsection