<header class="top-0 left-0 absolute w-full flex items-center z-10">
    <div id="main-header" class="w-full bg-cyan-800">
        <div class="flex items-center relative justify-between">
            <!-- Logo & Tittle Start-->
            <div class="flex items-center ml-2 px-2 w-full sm:max-w-[180px]">
                <a href="/dashboard" class="flex font-bold text-lg py-3">
                    <div
                        class="flex mx-2 items-center w-[30px] h-[30px] rounded-full bg-white border border-slate-200 drop-shadow-xl shadow-inner">
                        <img class="sm:w-[26px] sm:h-[26px] flex m-auto" src="/img/logo-vista-media.png" alt="">
                    </div>
                    <span class="text-white mx-1">Vista</span>
                    <span class="text-red-500 mx-1">Media</span>
                </a>
            </div>
            <!-- Logo & Tittle End-->
            <!-- Hamburger Menu Start-->
            <div class="justify-start items-center px-2 w-full hidden sm:flex">
                <nav class="sm:flex w-full hidden">
                    <ul
                        class="flex justify-start group w-max lg:w-24 h-6 hover:scale-110 transition duration-300 ease-in-out">
                        <a class="right-nav text-white {{ Request::is('dashboard') ? 'active' : '' }}"
                            href="/dashboard">
                            <svg class="fill-current w-5 mx-2" role="img" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>DASHBOARD</title>
                                <path
                                    d="M11.9922 1.3945a.7041.7041 0 00-.498.211L.1621 13.0977A.5634.5634 0 000 13.494a.567.567 0 00.5664.5664H2.67v8.0743c0 .2603.2104.4707.4707.4707h7.9473v-3.6836L8.037 15.8672a2.42 2.42 0 01-.9473.1933c-1.3379 0-2.4218-1.0868-2.4218-2.4257 0-1.339 1.084-2.4239 2.4218-2.4239 1.338 0 2.422 1.085 2.422 2.4239 0 .3359-.068.6563-.1915.9472l1.7676 1.7676v-5.375C10.2 10.615 9.5723 9.744 9.5723 8.7266c0-1.339 1.0859-2.4258 2.4238-2.4258 1.338 0 2.4219 1.0868 2.4219 2.4258 0 1.0174-.6259 1.8884-1.5137 2.248v5.375l1.7656-1.7676a2.4205 2.4205 0 01-.1914-.9472c0-1.339 1.086-2.4239 2.4238-2.4239 1.338 0 2.422 1.085 2.422 2.4239 0 1.3389-1.084 2.4257-2.422 2.4257a2.42 2.42 0 01-.9472-.1933l-3.0508 3.0547v3.6836h7.9473a.4702.4702 0 00.4707-.4707v-8.0743h2.1113a.5686.5686 0 00.3965-.162c.2233-.2185.2262-.5775.0078-.8008l-2.5156-2.5723V6.4707c0-.2603-.2104-.4727-.4707-.4727h-1.9649c-.2603 0-.4707.2124-.4707.4727v1.1035L12.5 1.6035a.7056.7056 0 00-.5078-.209zm.0039 6.3614c-.5352 0-.9688.4351-.9688.9707 0 .5355.4336.9687.9688.9687a.9683.9683 0 00.9687-.9687c0-.5356-.4335-.9707-.9687-.9707zM7.0898 12.666a.9683.9683 0 00-.9687.9688c0 .5355.4336.9707.9687.9707.5352 0 .9688-.4352.9688-.9707a.9683.9683 0 00-.9688-.9688zm9.8125 0c-.5351 0-.9707.4332-.9707.9688 0 .5355.4356.9707.9707.9707.5352 0 .9688-.4352.9688-.9707a.9683.9683 0 00-.9688-.9688Z" />
                            </svg>
                            <span class="lg:flex hidden"> Dashboard </span>
                        </a>
                    </ul>
                    <ul
                        class="flex justify-start group w-max lg:w-24 h-6 ml-4 hover:scale-110 transition duration-300 ease-in-out">
                        <a class="right-nav text-white {{ Request::is('dashboard/media/billboards*') ? 'active' : '' }}"
                            href="/dashboard/media/billboards">
                            <svg class="fill-current w-5 mx-2" xmlns="http://www.w3.org/2000/svg" role="img"
                                viewBox="0 0 24 24">
                                <path d="M11.5 23l-8.5-4.535v-3.953l5.4 3.122 3.1-3.406v8.772zm1-.001v-8.806l3.162 3.343 5.338-2.958v3.887l-8.5 4.534zm-10.339-10.125l-2.161-1.244 3-3.302-3-2.823 8.718-4.505 3.215 2.385 3.325-2.385 8.742 4.561-2.995 2.771 2.995 3.443-2.242 1.241v-.001l-5.903 3.27-3.348-3.541 7.416-3.962-7.922-4.372-7.923 4.372 7.422 3.937v.024l-3.297 3.622-5.203-3.008-.16-.092-.679-.393v.002z"/>
                            </svg>
                            <span class="lg:flex hidden"> Barang </span>
                        </a>
                    </ul>
                    <ul
                        class="flex justify-start group w-max lg:w-24 ml-4 h-6 hover:scale-110 transition duration-300 ease-in-out">
                        <a class="right-nav text-white {{ Request::is('dashboard/media/videotron*') ? 'active' : '' }}"
                            href="/dashboard/media/videotrons">
                            <svg class="fill-current w-5 mx-2" xmlns="http://www.w3.org/2000/svg" role="img"
                                viewBox="0 0 24 24">
                                <path d="M5 15.613c0-.788.061-1.243.992-1.458 1.074-.249 2.075-.466 1.591-1.381-1.476-2.785-.392-4.274 1.166-4.274 1.054 0 1.874.681 1.874 1.936 0 2.907-1.605 1.551-1.623 5.564v1h-4v-1.387zm14 1.387h-9v-1c0-1.373-.11-2.129 1.322-2.46 1.433-.331 2.27-.621 1.623-1.841-1.966-3.713-.521-5.699 1.555-5.699 2.117 0 3.527 2.062 1.556 5.699-.666 1.227.218 1.518 1.621 1.841 1.411.326 1.323 1.067 1.323 2.46v1zm-6 4.949v-2.949h-2v2.949c-4.717-.472-8.479-4.232-8.949-8.949h2.949v-2h-2.949c.47-4.718 4.232-8.479 8.949-8.95v2.95h2v-2.95c4.717.471 8.479 4.232 8.949 8.95h-2.949v2h2.949c-.47 4.717-4.232 8.477-8.949 8.949zm-1-21.949c-6.627 0-12 5.372-12 12 0 6.627 5.373 12 12 12s12-5.373 12-12c0-6.628-5.373-12-12-12z"/>
                            </svg>
                            <span class="lg:flex hidden"> Supplier </span>
                        </a>
                    </ul>
                    <ul class="flex justify-start group w-max ml-4 h-6 hover:scale-110 transition duration-300 ease-in-out">
                        <a class="right-nav text-white {{ Request::is('dashboard/media/signages*') ? 'active' : '' }}"
                            href="/dashboard/media/signages">
                            <svg class="fill-current w-5 mx-2 rotate-90" xmlns="http://www.w3.org/2000/svg"
                                role="img" viewBox="0 0 24 24">
                                <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm2.085 14h-9v2h9v3l5-4-5-4v3zm-4-6v-3l-5 4 5 4v-3h9v-2h-9z"/>
                            </svg>
                            <span class="lg:flex hidden"> Mutasi Barang </span>
                        </a>
                    </ul>
                    <ul class="flex group w-max ml-4 h-6 hover:scale-110 transition duration-300 ease-in-out">
                        <a class="right-nav text-white {{ Request::is('dashboard/media/signages*') ? 'active' : '' }}"
                            href="/dashboard/media/signages">
                            <svg class="fill-current w-5 mx-2 rotate-90" xmlns="http://www.w3.org/2000/svg"
                                role="img" viewBox="0 0 24 24">
                                <path d="M7 22v-16h14v7.543c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-5.362zm16-7.614v-10.386h-18v20h8.189c3.163 0 9.811-7.223 9.811-9.614zm-10 1.614h-4v-1h4v1zm6-4h-10v1h10v-1zm0-3h-10v1h10v-1zm1-7h-17v19h-2v-21h19v2z"/>
                            </svg>
                            <span class="lg:flex hidden"> Laporan </span>
                        </a>
                    </ul>
                </nav>
            </div>

            <!-- Hamburger Menu End-->
            <!-- Right Nav Start-->
            <div class="flex px-2 w-full  text-end py-3 items-center text-white justify-end">
                <div>
                    <div class="group" id="profile" name="profile">
                        <a href="#" class="right-nav">
                            @if (auth()->user()->avatar)
                                <img class="m-auto flex rounded-full items-center w-6 h-6 sm:w-8 sm:h-8"
                                    src="{{ asset('storage/' . auth()->user()->avatar) }}">
                            @else
                                <img class="m-auto flex rounded-full items-center w-6 h-6 sm:w-8 sm:h-8"
                                    src="/img/photo_profile.png">
                            @endif
                            <Span class="hidden md:flex ml-2">{{ auth()->user()->name }}</Span>
                            <svg name="profileArrow" id="profileArrow"
                                class="ml-1 w-4 sm:w-5 fill-current transition duration-300 ease-in-out"
                                role="img" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m16.843 10.211c.108-.141.157-.3.157-.456 0-.389-.306-.755-.749-.755h-8.501c-.445 0-.75.367-.75.755 0 .157.05.316.159.457 1.203 1.554 3.252 4.199 4.258 5.498.142.184.36.29.592.29.23 0 .449-.107.591-.291 1.002-1.299 3.044-3.945 4.243-5.498z" />
                            </svg>
                        </a>
                    </div>
                    <div class="justify-end absolute mt-3 items-center transition duration-500 ease-in-out origin-center hidden"
                        id="profileChild" name="profileChild">
                        <div
                            class="flex bg-opacity-90 bg-emerald-50 w-12 md:w-36 h-28 top-0 rounded-b-xl border drop-shadow-md">
                            <nav class="flex top-0 w-12 md:w-36">
                                <ul class="ml-4 text-left">
                                    <li class="group">
                                        <a class="mt-0 nav-a" href="/dashboard/users/users/{{ auth()->user()->id }}">
                                            <svg class="fill-current" role="img"
                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                viewBox="0 0 24 24">
                                                <title>My Profile</title>
                                                <path
                                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z" />
                                            </svg>
                                            <span class="ml-1 hidden md:flex"> My Profile</span>
                                        </a>
                                    </li>
                                    <li class="group">
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="mt-1 nav-a">
                                                <svg class="fill-current w-4" role="img" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <title>Logout</title>
                                                    <path
                                                        d="M12 0C5.373 0 0 5.37 0 12s5.373 12 12 12c6.63 0 12-5.37 12-12S18.63 0 12 0zm-.84 4.67h1.68v8.36h-1.68V4.67zM12 18.155c-3.24-.002-5.865-2.63-5.864-5.868 0-2.64 1.767-4.956 4.314-5.655v1.71c-1.628.64-2.698 2.21-2.695 3.96 0 2.345 1.903 4.244 4.248 4.243 2.344-.002 4.244-1.903 4.243-4.248 0-1.745-1.07-3.312-2.694-3.95V6.63c2.55.7 4.314 3.018 4.314 5.66 0 3.24-2.626 5.864-5.865 5.864z" />
                                                </svg>
                                                <span class="ml-1 hidden md:flex"> Logout </span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Nav End-->
        </div>
    </div>
</header>
