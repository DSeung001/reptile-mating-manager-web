<x-app-layout>
    <x-slot name="header">
        메이팅 목록
    </x-slot>

    <x-filter-table-menu action="{{route('mating.index')}}">
        @include('parts.table-search', [
            'placeholder' => '부 개체명 검색.',
            'name' => 'father_name',
            'isRequired' => false,
            'label' => '부 개체 이름'
        ])

        @include('parts.table-search', [
            'placeholder' => '모 개체명 검색',
            'name' => 'mather_name',
            'isRequired' => false,
            'label' => '모 개체 이름'
        ])

        <div class="mobile-none">
            @include('parts.table-date', [
                'label' => '메이팅일',
                'name' => 'mating_at',
            ])
        </div>

        <div class="mobile-none">
            @include('parts.table-select', ['list' => [
                '10' => '10',
                '20' => '30',
                '40' => '40',
                'all' => 'ALL'],
                'name' => 'paginate',
                'label' => '페이징'
            ])
        </div>
    </x-filter-table-menu>

    @include('parts.list', [
        'showRoute' => 'mating.show',
        'title' => "메이팅($listLength)",
        'headers' => ['부', '모', '메이팅일', '작성일', '수정일'],
        'datas' => ['father_name', 'mather_name', 'mating_at', 'created_at', 'updated_at'],
     ])

    @if(($_GET['paginate'] ?? '') != 'all' )
        {!! $list->links() !!}
    @endif
</x-app-layout>
