<x-app-layout>
    <x-slot name="header">
        메이팅 상세
    </x-slot>

    <div class="px-4 mt-8 mb-4">
        <div class="p-4 bg-white shadow m-auto max-w-[1280px]">

            @include('parts.input', [
                 'title'=>'종',
                 'name'=>'type',
                 'type'=>'text',
                 'placeholder'=> "종",
                 'value' => $typeName,
                 'disabled'=> true
            ])

            @include('parts.input', [
                 'title'=>'부모',
                 'name'=>'morph',
                 'type'=>'text',
                 'placeholder'=> "부모",
                 'value' => $fatherName." x ".$matherName,
                 'disabled'=> true
            ])

            @include('parts.input', [
               'title'=>'메이팅 일시',
               'name'=>'mating_at',
               'type'=>'date',
               'value' => $mating['mating_at'],
               'disabled'=> true
            ])

            @include('parts.textarea',[
            'value' => $mating['comment'],
            'disabled' => true,
            'placeholder'=> ''
            ])

            @include('parts.button-modify', [
                'route' => route('mating.edit', $mating)
            ])
            @include('parts.button-list',[
                'route' => route('mating.index')
            ])
            @include('parts.button-delete',[
                'route' => route('mating.destroy', $mating),
            ])
    </div>
</div>
</x-app-layout>
