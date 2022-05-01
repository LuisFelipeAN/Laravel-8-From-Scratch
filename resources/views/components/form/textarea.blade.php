@props(['name'])
<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea id="{{$name}}" name="{{$name}}" class="w-full text-sm focus:outiline-none focus:ring border border-gray-200 " id="" cols="30" rows="10" placeholder="Say Something" required>
        {{$slot ?? old($name) }}
    </textarea>
    <x-form.error name="{{$name}}" />
</x-form.field>