<nav class="hs-accordion-group nav-menu">
    <label>Menus</label>
    <ul>
        <li class="hs-accordion" id="account-accordion" data-hs-accordion-always-open>
            <a class="hs-accordion-toggle hs-accordion-active:text-teal-700 hs-accordion-active:hover:bg-transparent dark:hs-accordion-active:text-red-300" href="javascript:;">
                <x-eos-manage-accounts class="icon-item" />
                {{ __('admin/sidebar.labelSectionManagerUsers') }}
                <svg class="hs-accordion-active:block ml-auto hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
                <svg class="hs-accordion-active:hidden ml-auto block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg>
            </a>

            <div id="account-accordion-child" class="hs-accordion-content transition-[height] duration-300 hidden submenu">
                <ul>
                    <li>
                        <a href="javascript:;">
                            <x-clarity-user-solid class="icon-item" />
                            {{ __('admin/sidebar.labelMenuUsers') }}
                        </a>
                    </li>
                    <li class="item-selected">
                        <a href="javascript:;">
                            <x-typ-group class="icon-item" />
                            {{ __('admin/sidebar.labelMenuRoles') }}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <x-typ-lock-closed class="icon-item" />
                            {{ __('admin/sidebar.labelMenuPermissions') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<nav class="nav-menu">
    <ul>
        <li>
            <a class="" href="javascript:;">
                <x-eos-edit-calendar-o class="icon-item" />
                Calendar
            </a>
        </li>
    </ul>
</nav>
<nav class="nav-menu">
    <ul>
        <li>
            <a class="" href="javascript:;">
                <x-eos-document-scanner class="icon-item" />
                Documentation
            </a>
        </li>
    </ul>
</nav>
