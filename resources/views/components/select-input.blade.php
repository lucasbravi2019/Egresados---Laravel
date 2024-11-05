@props(['disabled' => false, 'values'])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
    @foreach ($values as $value)
        <option value="{{$value->id}}">{{$value->description}}</option>
    @endforeach
</select>
