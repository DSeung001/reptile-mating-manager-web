{{--
    $route : 보낼 경로
--}}

<div class="text-left mt-3 inline-block">
    <a href="{{$route}}">
        <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <image src="{{asset('images/list.svg')}}" class="w-5 h-5 inline-block"/>
            목록
        </button>
    </a>
</div>
