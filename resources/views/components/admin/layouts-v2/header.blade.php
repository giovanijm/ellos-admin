@php
    use \App\Models\Admin\ManagerUser\Permission;

    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";
@endphp

<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-gray-200 text-sm py-2.5 sm:py-4 xl:pl-64 dark:bg-gray-800 dark:border-gray-700">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">
        <div class="mr-5 lg:mr-0 xl:hidden">
            <a class="flex justify-items-center text-xl font-semibold dark:text-white tracking-wide" href="#" aria-label="Brand">
                <img class="mr-2 w-10 h-12 p-1 dark:backdrop-brightness-200 dark:bg-white dark:rounded" src="{{getUrlImageServidor('802f9a82-0015-43c4-0ab9-2da5d868cd00')}}"/>
                <div class="grid grid-cols-1">
                    <span>Ellos</span>
                    <span class="text-xs whitespace-nowrap uppercase text-gray-500">Tecnologia de ponta</span>
                </div>
            </a>
        </div>
        <div class="w-full flex items-center justify-end ml-auto sm:justify-between sm:gap-x-3 sm:order-3">
            <div class="sm:hidden">

            </div>

            <div class="hidden sm:block">

            </div>

            <div class="flex flex-row items-center justify-end gap-2">
                <!-- Dark Mode Toggle -->
                <div class="hs-dropdown" data-hs-dropdown-placement="bottom-right" data-hs-dropdown-offset="30">
                    <a class="hs-dropdown-toggle hs-dark-mode group py-2.5 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-400 focus-visible:ring-offset-2 focus-visible:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus-visible:ring-gray-700 dark:focus-visible:ring-offset-gray-800" href="javascript:;">
                        <svg class="hs-dark-mode-active:hidden block w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                        </svg>
                        <svg class="hs-dark-mode-active:block hidden w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                        </svg>
                    </a>

                    <div id="selectThemeDropdown" class="ellos-dropdown hs-dropdown-menu hs-dropdown-open:opacity-100 transition-[margin,opacity] opacity-0 duration-300 ellos-dropdown-menu">
                        <div class="content">
                            <a class="hs-auto-mode-active:font-bold" href="javascript:;" data-hs-theme-click-value="auto">
                                <x-eos-configuration-file class="icon-item" />
                                Padrão do Sistema
                            </a>
                            <a class="hs-default-mode-active:font-bold hs-default-mode-active:bg-gray-100" href="javascript:;" data-hs-theme-click-value="default">
                                <x-eos-light-mode-o class="icon-item" />
                                Tema Claro
                            </a>
                            <a class="hs-dark-mode-active:font-bold hs-dark-mode-active:bg-gray-600"  href="javascript:;" data-hs-theme-click-value="dark">
                                <x-eos-dark-mode class="icon-item" />
                                Tema Escuro
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Dark Mode Toggle -->
                <div class="hs-dropdown" data-hs-dropdown-placement="bottom-right" data-hs-dropdown-offset="30">
                    <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle py-2.5 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-400 focus-visible:ring-offset-2 focus-visible:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus-visible:ring-gray-700 dark:focus-visible:ring-offset-gray-800">
                        <svg aria-hidden="true" class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <div class="ellos-dropdown hs-dropdown-menu hs-dropdown-open:opacity-100 transition-[opacity,margin] duration" aria-labelledby="hs-dropdown-basic">
                        <div class="header-menu">
                            <h1>{{ Auth::user()->name }}</h1>
                            <p>{{ Auth::user()->role->name }}</p>
                        </div>
                        <div class="content">
                            @can('view', $modifyProfile)
                                <a href="{{ route('profile.edit') }}">
                                    <svg aria-hidden="true" class="icon-item" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" fill-rule="evenodd"></path>
                                    </svg>
                                    {{ __('admin/onboarding.labelProfile') }}
                                </a>
                            @endcan
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <x-codicon-sign-out class="icon-item" />
                                    {{ __('admin/onboarding.labelLogOut') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
