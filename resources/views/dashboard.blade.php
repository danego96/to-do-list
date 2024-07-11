<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            What do you have for today, {{ Auth::user()->name }}?
        </h2>
    </x-slot>
<x-to-do-card :tasks=$tasks/>
</x-app-layout>
