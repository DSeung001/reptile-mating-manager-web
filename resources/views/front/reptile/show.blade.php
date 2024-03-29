<x-app-layout>
    <x-slot name="header">
        개체 상세
    </x-slot>

    <div class="px-4 mt-8 mb-4">
        <div class="p-4 bg-white shadow m-auto max-w-[1280px]">

            @if(isset($image))
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-900 dark:text-white px-3 font-bold pb-3">
                    개체 사진
                </label>
                <img src="{{asset($image['path'])}}" class="max-w-2xl"/>
            </div>
            @endif

            @include('parts.input', [
                'title'=>'개체 이름',
                'name'=>'name',
                'type'=>'text',
                'placeholder'=> "개체 이름",
                'value' => $reptile['name'],
                'disabled'=> true
           ])

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
                 'title'=>'성별 / 현재 상태',
                 'name'=>'morph',
                 'type'=>'text',
                 'placeholder'=> "성별",
                 'value' => $reptile['gender']." / ".$reptile['status'],
                 'disabled'=> true
            ])

            @include('parts.input', [
                'title'=>'개체 모프',
                'name'=>'morph',
                'type'=>'text',
                'placeholder'=> "ex:트익할,릴리",
                'value' => $reptile['morph'],
                'disabled'=> true
            ])

            @include('parts.input', [
               'title'=>'개체 생일',
               'name'=>'birth',
               'type'=>'date',
               'value' => $reptile['birth'],
               'disabled'=> true
            ])

            @include('parts.textarea',[
                'value' => $reptile['comment'],
                'disabled' => true,
                'placeholder'=> ''
            ])

            @include('parts.button-modify', [
              'route' => route('reptile.edit', $reptile)
            ])
            @include('parts.button-list',[
                'route' => route('reptile.index')
            ])
            @include('parts.button-delete',[
                'route' => route('reptile.destroy', $reptile),
            ])
        </div>
    </div>

</x-app-layout>
