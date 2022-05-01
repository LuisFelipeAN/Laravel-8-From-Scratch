@props(['name'])
<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea id="{{$name}}" name="{{$name}}" class="w-full text-sm focus:outiline-none focus:ring" id="" cols="30" rows="10" placeholder="Say Something" value="{{old($name)}}" required></textarea>
    <x-form.error name="{{$name}}" />
</x-form.field>