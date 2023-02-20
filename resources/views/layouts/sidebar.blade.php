@php
    use \App\Models\Admin\ManagerUser\Permission;

    $sectionHome = new Permission(); $sectionHome->name = "SectionHome";
    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";

    $sectionManagerUsers = new Permission(); $sectionManagerUsers->name = "sectionManagerUsers";
        $cadPermissoes = new Permission(); $cadPermissoes->name = "CadPermissoes";
        $cadGrupos = new Permission(); $cadGrupos->name = "CadGrupos";
        $cadUsuarios = new Permission(); $cadUsuarios->name = "CadUsuarios";

@endphp

<!-- INICIO SIDE BAR -->
        <div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full hidden fixed inset-y-0 left-0 z-[60] w-64 overflow-y-auto transition duration-300 transform scrollbar-y lg:block bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
            <!-- INICIO MENU SIDE BAR -->
            <x-avatar-sidebar>
                @if(Auth::user()->id == 3)
                    <img class="object-cover w-full h-full" src="/imagem/user/fotoGiovani.png" alt="{{ Auth::user()->name }}">
                @else
                    <span class="font-bold text-gray-300">{{ Str::upper(Str::substr(Auth::user()->name, 0, 2)) }}</span>
                @endif
            </x-avatar-sidebar>
            <nav class="mt-5 mx-2">
                <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase ml-2 dark:text-gray-400">Menu</h5>
                @can('view', $sectionHome)
                    <x-sidebar-menu-v2 :active="request()->routeIs('admin.index')" :open="request()->routeIs('admin.index')">
                        <x-sidebar-menu-section-v2>
                            <svg aria-hidden="true" class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.36 1.37l6.36 5.8-.71.71L13 6.964v6.526l-.5.5h-3l-.5-.5v-3.5H7v3.5l-.5.5h-3l-.5-.5V6.972L2 7.88l-.71-.71 6.35-5.8h.72zM4 6.063v6.927h2v-3.5l.5-.5h3l.5.5v3.5h2V6.057L8 2.43 4 6.063z" />
                            </svg>
                            <span class="ml-2 text-sm">{{ __('admin/sidebar.labelHome') }}</span>
                        </x-sidebar-menu-section-v2>
                        <x-sidebar-submenu labelName="{{ __('admin/sidebar.labelHome') }}">
                            <x-sidebar-menu-option-v2 :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                {{ __('admin/sidebar.labelDashboard') }}
                            </x-sidebar-menu-option-v2>
                        </x-sidebar-submenu>
                    </x-sidebar-menu-v2>
                @endcan
                @can('view', $sectionManagerUsers)
                    <x-sidebar-menu-v2 :active="request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')" :open="request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')">
                        <x-sidebar-menu-section-v2>
                            <svg aria-hidden="true" class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="ml-2 text-sm">{{ __('admin/sidebar.labelSectionManagerUsers') }}</span>
                        </x-sidebar-menu-section-v2>
                        <x-sidebar-submenu labelName="{{ __('admin/sidebar.labelSectionManagerUsers') }}">
                            @can('view', $cadUsuarios)
                                <x-sidebar-menu-option-v2 :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ __('admin/sidebar.labelMenuUsers') }}
                                </x-sidebar-menu-option-v2>
                            @endcan
                            @can('view', $cadGrupos)
                                <x-sidebar-menu-option-v2 :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ __('admin/sidebar.labelMenuRoles') }}
                                </x-sidebar-menu-option-v2>
                            @endcan
                            @can('view', $cadPermissoes)
                                <x-sidebar-menu-option-v2 :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.*')">
                                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ __('admin/sidebar.labelMenuPermissions') }}
                                </x-sidebar-menu-option-v2>
                            @endcan
                        </x-sidebar-submenu>
                    </x-sidebar-menu-v2>
                @endcan

            </nav>

            {{-- <div id="dropdown-cta" class="p-4 mt-6 mx-3 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                <div class="flex items-center mb-3">
                    <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Beta</span>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 inline-flex h-6 w-6 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800" data-dismiss-target="#dropdown-cta" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">Preview the new Flowbite dashboard navigation! You can turn the new navigation off for a limited time in your profile.</p>
                <a class="text-sm text-blue-800 underline hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" href="#">Turn new navigation off</a>
            </div> --}}

            <!-- FINAL MENU SIDE BAR -->
        </div>
<!-- FINAL SIDE BAR -->
