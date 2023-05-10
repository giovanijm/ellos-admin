@php
    use \App\Models\Admin\ManagerUser\Permission;

    $modifyProfile = new Permission(); $modifyProfile->name = "ModifyProfile";
@endphp

<header class="ellos-header">
    <div class="ellos-header-left">
        <button type="button"
            data-hs-overlay="#application-sidebar"
            aria-label="Toggle navigation"
            aria-controls="application-sidebar"
            class="hs-dropdown-toggle ellos-header-button block lg:hidden z-30"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <div class="ellos-header-center">

    </div>
    <div class="ellos-header-right">
        <div class="hs-dropdown ellos-dropdown">
            <button id="hs-dropdown-basic" type="button" class="hs-dropdown-toggle ellos-header-button">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <div class="menu-nav hs-dropdown-menu hs-dropdown-open:opacity-100 transition-[opacity,margin] duration" aria-labelledby="hs-dropdown-basic">
                <div class="header">
                    <h1>{{ Auth::user()->name }}</h1>
                    <p>{{ Auth::user()->role->name }}</p>
                </div>
                <div class="content">
                    @can('view', $modifyProfile)
                        <a class="clockUi-show" href="{{ route('profile.edit') }}">
                            <div class="flex">
                                <svg aria-hidden="true" class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" fill-rule="evenodd"></path>
                                </svg>
                                {{ __('admin/onboarding.labelProfile') }}
                            </div>
                        </a>
                    @endcan
                    <form method="POST" class="form-clockUi-show" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
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

