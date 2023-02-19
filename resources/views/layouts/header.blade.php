@php
    use \App\Models\Admin\ManagerUser\Permission;

    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";
@endphp

<header class="fixed top-0 left-0 right-0 z-20 flex items-center justify-between px-2 py-1 lg:px-6 lg:py-4 bg-gray-900 bg-opacity-70 lg:static lg:none lg:bg-sky-800 lg:bg-opacity-100">
    <!-- INICIO CENTRO MENU TOP -->
    <div class="flex items-center">
        <!-- BOTÃO QUANDO FICA PEQUENO -->
        <button @click="sidebarOpen = true" class="text-white ml-2 focus:outline-none lg:hidden">
            <svg class="w-5 h-5 lg:w-6 lg:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- FIM CENTRO MENU TOP -->
    <!-- INICIO DIREITA MENU TOP -->
    <div class="flex items-center">
        <!-- INICIO NOTIFICAÇÕES MENU TOP -->
        {{-- <div x-data="{ notificationOpen: false }" class="relative">
            <button @click="notificationOpen = ! notificationOpen" class="flex mx-4 text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <div x-cloak x-show="notificationOpen" @click="notificationOpen = false"
                class="fixed inset-0 z-10 w-full h-full"></div>

            <div x-cloak x-show="notificationOpen"
                class="absolute right-0 z-10 mt-2 overflow-hidden bg-white rounded-lg shadow-xl w-80"
                style="width:20rem;">
                <a href="#"
                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                    <img class="object-cover w-8 h-8 mx-1 rounded-full"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                        alt="avatar">
                    <p class="mx-2 text-sm">
                        <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                            class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m
                    </p>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                    <img class="object-cover w-8 h-8 mx-1 rounded-full"
                        src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                        alt="avatar">
                    <p class="mx-2 text-sm">
                        <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                    </p>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                    <img class="object-cover w-8 h-8 mx-1 rounded-full"
                        src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                        alt="avatar">
                    <p class="mx-2 text-sm">
                        <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                            class="font-bold text-indigo-400" href="#">Test with TDD</span> artical . 1h
                    </p>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                    <img class="object-cover w-8 h-8 mx-1 rounded-full"
                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
                        alt="avatar">
                    <p class="mx-2 text-sm">
                        <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                    </p>
                </a>
            </div>
        </div> --}}
        <!-- FIM NOTIFICAÇÕES MENU TOP -->

        <!-- INICIO HAVATAR MENU TOP -->
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="relative text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 lg:p-2.5 text-center inline-flex items-center mr-1 lg:mr-2">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="sr-only">Icon description</span>
            </button>
            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>
            <div x-cloak x-show="dropdownOpen" class="absolute mt-1 right-0 z-10 w-64 overflow-hidden drop-shadow-md bg-gradient-to-r from-cyan-600 to-blue-600 rounded-md shadow-xl">
                <div class="items-center px-2 py-2 mt-4 text-white bg-gray-700 bg-opacity-25">
                    <p class="mx-2 font-bold text-sm uppercase">{{ Auth::user()->role->name }}</p>
                </div>
                @can('view', $modifyProfile)
                    <x-responsive-nav-link :href="route('profile.edit')">
                        <div class="flex">
                            <svg aria-hidden="true" class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" fill-rule="evenodd"></path>
                            </svg>
                            {{ __('admin/onboarding.labelProfile') }}
                        </div>
                    </x-responsive-nav-link>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="flex">
                            <x-codicon-sign-out class="w-6 h-6 mr-2" />
                            {{ __('admin/onboarding.labelLogOut') }}
                        </div>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        <!-- FINAL HAVATAR MENU TOP -->
    </div>
    <!-- FIM DIREITA MENU TOP -->
</header>
