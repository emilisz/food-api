@extends('app')
@section('content')
<div class="flex flex-col justify-center pt-8 sm:justify-start sm:pt-0 px-6">
    <h1 class="text-lg ">Edit recipe:</h1>
    <p class="text-gray-400 underline" disabled>api/v1/foods/{{$food['id']}}/edit (put)</p>
</div>

<div class="mt-8  overflow-hidden shadow sm:rounded-lg max-w-96">
    <form action="{{route('update-food', $food['id'])}}" method="POST">
        @method('put')
        @csrf
        <div class="p-2">
            <label for="">Title *</label>
            <input type="text" name="title" class="w-full rounded px-4 py-1 mb-3 shadow-lg" value="{{$food['title']}}"
                required>
            <br>
            <label for="">Description *</label>
            <textarea type="text" name="description" class="w-full rounded px-4 py-1 mb-3 shadow-lg" rows="7"
                required>{{$food['description']}}</textarea>
        </div>

        <div class="p-3 border border-dashed">
            @php
            $flattened = array_column($food['ingredients'], 'title');
            @endphp
            @foreach ($ingredients as $ingredient)
            <input type="checkbox" name="ingredients[]" id="{{$ingredient['id']}}" value="{{$ingredient['id']}}"
                {{in_array($ingredient['title'], $flattened) ? 'checked' : ''}}>
            <label for="ingredient{{$ingredient['id']}}">{{$ingredient['title']}}</label><br>
            @endforeach
        </div>

        <button type="submit"
            class=" px-4 py-1 bg-gray-800 text-white rounded underline float-right m-3">Submit</button>
    </form>

</div>


@endsection