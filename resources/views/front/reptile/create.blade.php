<x-app-layout>

    <x-slot name="header">
        개체 추가
    </x-slot>


    <x-jet-validation-errors class="mb-4"/>


    <div class="px-4 mt-8 mb-4">
        <div class="p-4 bg-white shadow m-auto max-w-[1280px]">
            <form method="POST" action="{{route('reptile.store')}}" enctype="multipart/form-data">
                @csrf

                @include('parts.dropzone')

                @include('parts.input', [
                      'title'=>'개체 이름',
                      'name'=>'name',
                      'type'=>'text',
                  ])

                <livewire:reptile-search-list
                    :typeList="$typeList"
                    :maleReptilePluck="$maleReptilePluck"
                    :femaleReptilePluck="$femaleReptilePluck"
                    :isDefault="true"
                />

                @include('parts.checkbox', [
                    'title'=>"성별 선택",
                    'list' => ['u' => '미구분', 'm' => '수', 'f' => '암'],
                    'type' => 'radio',
                    'name' => 'gender',
                    'selectedKey' => 'u'
                ])

                @include('parts.checkbox', [
                    'title'=>"현재 상태",
                    'list' => ['g' => '키우는 중', 's' => '분양 보냄','i' => '위탁 중', 'o' => '위탁 보냄'],
                    'type' => 'radio',
                    'name' => 'status',
                    'selectedKey' => 'g'
                ])

                @include('parts.input', [
                         'title'=>'개체 모프',
                         'name'=>'morph',
                         'type'=>'text',
                         'placeholder'=> "ex:트익할,릴리"
                         ])

                @include('parts.input', [
                         'title'=>'개체 생일',
                         'name'=>'birth',
                         'type'=>'date',
                         'isRequired'=> false
                         ])

                @include('parts.textarea')

                @include('parts.button-submit')
            </form>
        </div>
    </div>
</x-app-layout>
