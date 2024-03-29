{{--
    $name : input name
    $label : label
    $placeholder: input placeholder
    $isRequired : required 여부
--}}

<div class="mr-4">
    <label for="table-search-{{$name}}" class="text-sm">
        {{$label}}
    </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input id="table-search-{{$name}}" type="text" name="{{$name}}"
               {{isset($isRequired) && !$isRequired ? '' : 'required'}}
               class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-sm"
               placeholder="{{$placeholder ?? 'input'}}" value="{{$_GET[$name] ?? ''}}">
    </div>
</div>
