<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach(config('menu.menu') as $menu)
                @if(!empty($menu['url']))
                    {{--                    @can('roles', $menu['can'])--}}
                    <li>
                        <a href="{{$menu['url']}}"
                           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            @include('components.icons.' . $menu['icon'])
                            <span class="ms-3">{{ $menu['title'] }}</span>
                        </a>
                    </li>
                    {{--                @endcan--}}

                @else
                    <li>
                        <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg
                                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                            </svg>
                            <span
                                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{$menu['title']}}</span>
                            @include('components.icons.' . $menu['icon'])
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            @foreach($menu['menu'] as $child)
                                <li>
                                    <a href="{{$child['url']}}"
                                       class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{$child['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
