@php
    use \App\Models\Admin\ManagerUser\Permission;

    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";
@endphp

<header class="top-0 inset-x-0 grid grid-cols-2 h-16 bg-blue-900 border-b text-sm">
    <div class="flex items-center justify-start w-full p-2">
        <button type="button" data-hs-overlay="#application-sidebar" aria-label="Toggle navigation" aria-controls="application-sidebar"
            class="hs-dropdown-toggle p-3 block lg:hidden justify-center items-center rounded-lg text-sm font-medium text-gray-200 hover:text-white hover:border hover:border-gray-500">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="flex items-center justify-end w-full p-2">
        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle hs-dropdown-toggle p-3 block justify-center items-center rounded-lg text-sm font-medium text-gray-200 hover:text-white hover:border hover:border-gray-500">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-basic">
                <div class="py-3 px-5 -m-2 rounded-t-lg bg-gray-800">
                    <p class="text-sm font-bold text-gray-100 uppercase">{{ Auth::user()->name }}</p>
                    <p class="text-sm font-medium text-gray-400">{{ Auth::user()->role->name }}</p>
                </div>
                <div class="mt-2 py-2 first:pt-0 last:pb-0">
                    @can('view', $modifyProfile)
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:text-blue-700 hover:underline hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ route('profile.edit') }}">
                            <div class="flex">
                                <svg aria-hidden="true" class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" fill-rule="evenodd"></path>
                                </svg>
                                {{ __('admin/onboarding.labelProfile') }}
                            </div>
                        </a>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:text-blue-700 hover:underline hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <div class="flex">
                                <x-codicon-sign-out class="w-6 h-6 mr-2" />
                                {{ __('admin/onboarding.labelLogOut') }}
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
