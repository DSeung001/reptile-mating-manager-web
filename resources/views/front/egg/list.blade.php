<x-app-layout>
    <x-slot name="header">
        알 목록
    </x-slot>

    <x-filter-table-menu action="{{route('egg.index')}}">
        @include('parts.table-date', [
            'label' => '산란일',
            'name' => 'spawn_at',
        ])

        <div class="mobile-none">
            @include('parts.table-select', [
                'list' => [
                    'y' => '해칭완료',
                    'n' => '해칭실패',
                    'w' => '대기'
                ],
                'name' => 'hatching',
                'default' => '전체',
                'label' => '부화여부'
           ])
        </div>

        @include('parts.table-select', [
            'list' => $typeList,
            'name' => 'type',
            'default' => '전체',
            'label' => '종류'
       ])

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
        'showRoute' => 'egg.show',
        'list' => $list,
        'title' => "알($listLength)",
        'headers' => ['산란일', '예상 부화일', '부화여부', '종', '부', '모'],
        'datas' => ['spawn_at', 'estimated_date', 'is_hatching', 'type_name', 'father_name', 'mather_name'],
    ])

    @if(($_GET['paginate'] ?? '') != 'all' )
        {!! $list->links() !!}
    @endif
</x-app-layout>
