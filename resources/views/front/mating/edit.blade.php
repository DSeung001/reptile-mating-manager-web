<x-app-layout>
    <x-jet-validation-errors class="mb-4"/>

    <x-slot name="header">
        메이팅 수정
    </x-slot>

    <div class="px-4 mt-8 mb-4">
        <div class="p-4 bg-white shadow m-auto max-w-[1280px]">
            <form id="mating-create-form" method="POST" action="{{route('mating.update', $mating)}}">
                @method('patch')
                @csrf

                <livewire:reptile-search-list
                    :typeList="$typeList"
                    :maleReptilePluck="$maleReptilePluck"
                    :femaleReptilePluck="$femaleReptilePluck"
                    :typeSelected="$mating['type_id']"
                    :fatherSelected="$mating['father_id']"
                    :matherSelected="$mating['mather_id']"
                />

                @include('parts.input', [
                         'title'=>'메이팅 일시',
                         'name'=>'mating_at',
                         'type'=>'date',
                         'value' => $mating['mating_at'],
                ])

                @include('parts.textarea', [
                    'value' => $mating['comment']
                ])

                @include('parts.button-submit')
                @include('parts.button-cancel', [
                    'route' => route('mating.show', $mating)
                ])
            </form>
        </div>
    </div>
</x-app-layout>
