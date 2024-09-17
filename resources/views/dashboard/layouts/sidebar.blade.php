@canany(['isAdmin', 'isMedia', 'isMarketing', 'isOwner', 'isWorkshop', 'isAccounting'])
    <div name="nav-menu" id="nav-menu" class="flex fixed h-screen pb-24 pt-2 px-2 top-14">
        <div class="bg-teal-50 rounded-2xl overflow-y-auto border">
            <div class="flex fixed p-2 rounded-2xl items-center bg-teal-50 z-10">
                <button class="" id="hamburger" name="hamburger" type="button">
                    <span class="origin-top-left hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="origin-bottom-left hamburger-line transition duration-300 ease-in-out"></span>
                </button>
                <span id="menu" name="menu" class="w-40 mx-2 justify-center hidden border-b"> MAIN MENU </span>
            </div>
            <nav class="mt-10 relative z-0">
                <ul class="block">
                    <div>
                        <!-- Sidebar Dashboard start-->
                        <div class="nav-a mx-2">
                            <a class="nav-a" href="/dashboard">
                                <svg class="nav-svg transition duration-300 ease-in-out {{ Request::is('dashboard') ? 'active' : '' }}"
                                    role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>DASHBOARD</title>
                                    <path
                                        d="M11.9922 1.3945a.7041.7041 0 00-.498.211L.1621 13.0977A.5634.5634 0 000 13.494a.567.567 0 00.5664.5664H2.67v8.0743c0 .2603.2104.4707.4707.4707h7.9473v-3.6836L8.037 15.8672a2.42 2.42 0 01-.9473.1933c-1.3379 0-2.4218-1.0868-2.4218-2.4257 0-1.339 1.084-2.4239 2.4218-2.4239 1.338 0 2.422 1.085 2.422 2.4239 0 .3359-.068.6563-.1915.9472l1.7676 1.7676v-5.375C10.2 10.615 9.5723 9.744 9.5723 8.7266c0-1.339 1.0859-2.4258 2.4238-2.4258 1.338 0 2.4219 1.0868 2.4219 2.4258 0 1.0174-.6259 1.8884-1.5137 2.248v5.375l1.7656-1.7676a2.4205 2.4205 0 01-.1914-.9472c0-1.339 1.086-2.4239 2.4238-2.4239 1.338 0 2.422 1.085 2.422 2.4239 0 1.3389-1.084 2.4257-2.422 2.4257a2.42 2.42 0 01-.9472-.1933l-3.0508 3.0547v3.6836h7.9473a.4702.4702 0 00.4707-.4707v-8.0743h2.1113a.5686.5686 0 00.3965-.162c.2233-.2185.2262-.5775.0078-.8008l-2.5156-2.5723V6.4707c0-.2603-.2104-.4727-.4707-.4727h-1.9649c-.2603 0-.4707.2124-.4707.4727v1.1035L12.5 1.6035a.7056.7056 0 00-.5078-.209zm.0039 6.3614c-.5352 0-.9688.4351-.9688.9707 0 .5355.4336.9687.9688.9687a.9683.9683 0 00.9687-.9687c0-.5356-.4335-.9707-.9687-.9707zM7.0898 12.666a.9683.9683 0 00-.9687.9688c0 .5355.4336.9707.9687.9707.5352 0 .9688-.4352.9688-.9707a.9683.9683 0 00-.9688-.9688zm9.8125 0c-.5351 0-.9707.4332-.9707.9688 0 .5355.4356.9707.9707.9707.5352 0 .9688-.4352.9688-.9707a.9683.9683 0 00-.9688-.9688Z" />
                                </svg>
                            </a>
                            <li id="liDashboard" data-name="liDashboard" class="group hidden">
                                <a href="#" class="nav-a mx-2 {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <span class="flex w-40"> Dashboard </span>
                                </a>
                            </li>
                        </div>
                        <!-- Sidebar Dashboard End-->

                        <!-- Sidebar Barang start-->
                        <div class="div-nav-a">
                            <a class="nav-a" href="/dashboard/categories">
                                <svg class="nav-svg transition duration-300 ease-in-out {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                                    role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Barang</title>
                                    <path d="M11.5 23l-8.5-4.535v-3.953l5.4 3.122 3.1-3.406v8.772zm1-.001v-8.806l3.162 3.343 5.338-2.958v3.887l-8.5 4.534zm-10.339-10.125l-2.161-1.244 3-3.302-3-2.823 8.718-4.505 3.215 2.385 3.325-2.385 8.742 4.561-2.995 2.771 2.995 3.443-2.242 1.241v-.001l-5.903 3.27-3.348-3.541 7.416-3.962-7.922-4.372-7.923 4.372 7.422 3.937v.024l-3.297 3.622-5.203-3.008-.16-.092-.679-.393v.002z"/>
                                </svg>
                            </a>
                            <li class="group hidden" id="liMedia" name="liMedia" onclick="showHideDropdown(this)">
                                <a href="#" class="nav-a mx-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                                    <span class="flex w-40"> Barang </span>
                                    <svg id="mediaArrow" name="mediaArrow"
                                        class="svg-arrow rotate-180 transition duration-300 ease-in-out" role="img"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Arrow</title>
                                        <path
                                            d="M12.468.186a.7.7 0 0 0-.95 0L1.924 9.193a1.705 1.705 0 0 0-.475 1.095v3.59c0 .358.214.452.475.207l9.601-9.01a.705.705 0 0 1 .95 0l9.603 9.01c.262.245.475.151.475-.207v-3.59a1.71 1.71 0 0 0-.475-1.095zm0 9.783a.705.705 0 0 0-.95 0l-9.595 9.002a1.705 1.705 0 0 0-.475 1.094v3.59c0 .358.214.453.475.208l9.601-9.007a.701.701 0 0 1 .95 0l9.603 9.008c.262.244.475.15.475-.208v-3.59a1.71 1.71 0 0 0-.475-1.094Z" />
                                    </svg>
                                </a>
                                <!-- Child Barang start-->
                                <ul class="hidden" id="mediaChild" name="mediaChild">
                                    <li class="group">
                                        <a class="nav-a ml-2 border-t-[1px] {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                                            href="/dashboard/categories">
                                            <svg class="child-nav-svg" xmlns="http://www.w3.org/2000/svg" role="img"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 2c-1.229 0-2.18-1.084-3-2h-8c-.82.916-1.771 2-3 2h-3v22h20v-22h-3zm-7 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm8 20h-3.824c1.377-1.103 2.751-2.51 3.824-3.865v3.865zm0-8.457c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362v-18h4l2.102 2h3.898l2-2h4v9.543z" />
                                            </svg>
                                            <span class="flex w-40"> Kategori Barang </span>
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a class="nav-a ml-2 {{ Request::is('dashboard/products*') ? 'active' : '' }}"
                                            href="/dashboard/products">
                                            <svg class="child-nav-svg" xmlns="http://www.w3.org/2000/svg" role="img"
                                                viewBox="0 0 24 24">
                                                <path d="m10.5 17.25c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75zm-1.5-3.55c0-.53-.47-1-1-1h-5c-.53 0-1 .47-1 1v4.3c0 .53.47 1 1 1h5c.53 0 1-.47 1-1zm1.5-1.7c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75zm-1.5-6c0-.53-.47-1-1-1h-5c-.53 0-1 .47-1 1v4.3c0 .53.47 1 1 1h5c.53 0 1-.47 1-1zm1.5.75c0-.414.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75h-10c-.414 0-.75-.336-.75-.75z" fill-rule="nonzero"/>
                                            </svg>
                                            <span class="flex w-40"> Daftar Barang </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Child Products end-->
                            </li>
                        </div>
                        <!-- Sidebar Barang End-->

                        <!-- Sidebar Supplier start-->
                        <div class="div-nav-a">
                            <a class="nav-a {{ Request::is('dashboard/categorysuppliers*') ? 'active' : '' }}" href="/dashboard/categorysuppliers">
                                <svg role="img" class="nav-svg transition duration-300 ease-in-out"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Supplier</title>
                                    <path d="M5 15.613c0-.788.061-1.243.992-1.458 1.074-.249 2.075-.466 1.591-1.381-1.476-2.785-.392-4.274 1.166-4.274 1.054 0 1.874.681 1.874 1.936 0 2.907-1.605 1.551-1.623 5.564v1h-4v-1.387zm14 1.387h-9v-1c0-1.373-.11-2.129 1.322-2.46 1.433-.331 2.27-.621 1.623-1.841-1.966-3.713-.521-5.699 1.555-5.699 2.117 0 3.527 2.062 1.556 5.699-.666 1.227.218 1.518 1.621 1.841 1.411.326 1.323 1.067 1.323 2.46v1zm-6 4.949v-2.949h-2v2.949c-4.717-.472-8.479-4.232-8.949-8.949h2.949v-2h-2.949c.47-4.718 4.232-8.479 8.949-8.95v2.95h2v-2.95c4.717.471 8.479 4.232 8.949 8.95h-2.949v2h2.949c-.47 4.717-4.232 8.477-8.949 8.949zm-1-21.949c-6.627 0-12 5.372-12 12 0 6.627 5.373 12 12 12s12-5.373 12-12c0-6.628-5.373-12-12-12z"/>
                                </svg>
                            </a>

                            <li class="group hidden" id="liMarketing" name="liMarketing"
                                onclick="showHideDropdown(this)">
                                <a href="#"
                                    class="nav-a mx-2 {{ Request::is('dashboard/categorysuppliers*') ? 'active' : '' }}">
                                    <span class="flex w-40"> Supplier </span>
                                    <svg id="marketingArrow" name="marketingArrow"
                                        class="svg-arrow rotate-180 transition duration-300 ease-in-out" role="img"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Arrow</title>
                                        <path
                                            d="M12.468.186a.7.7 0 0 0-.95 0L1.924 9.193a1.705 1.705 0 0 0-.475 1.095v3.59c0 .358.214.452.475.207l9.601-9.01a.705.705 0 0 1 .95 0l9.603 9.01c.262.245.475.151.475-.207v-3.59a1.71 1.71 0 0 0-.475-1.095zm0 9.783a.705.705 0 0 0-.95 0l-9.595 9.002a1.705 1.705 0 0 0-.475 1.094v3.59c0 .358.214.453.475.208l9.601-9.007a.701.701 0 0 1 .95 0l9.603 9.008c.262.244.475.15.475-.208v-3.59a1.71 1.71 0 0 0-.475-1.094Z" />
                                    </svg>
                                </a>
                                <!-- Child Supplier Start -->
                                <ul class="hidden" id="marketingChild" name="marketingChild">
                                    <!-- Category Start -->
                                    <li class="group">
                                        <a class="nav-a ml-2 border-t-[1px] {{ Request::is('dashboard/categorysuppliers*') ? 'active' : '' }}"
                                            href="/dashboard/categorysuppliers">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M7 16.488l1.526-.723c1.792-.81 2.851-.344 4.349.232 1.716.661 2.365.883 3.077 1.164 1.278.506.688 2.177-.592 1.838-.778-.206-2.812-.795-3.38-.931-.64-.154-.93.602-.323.818 1.106.393 2.663.79 3.494 1.007.831.218 1.295-.145 1.881-.611.906-.72 2.968-2.909 2.968-2.909.842-.799 1.991-.135 1.991.72 0 .23-.083.474-.276.707-2.328 2.793-3.06 3.642-4.568 5.226-.623.655-1.342.974-2.204.974-.442 0-.922-.084-1.443-.25-1.825-.581-4.172-1.313-6.5-1.6v-5.662zm-1 6.538h-4v-8h4v8zm1-7.869v-1.714c-.006-1.557.062-2.447 1.854-2.861 1.963-.453 4.315-.859 3.384-2.577-2.761-5.092-.787-7.979 2.177-7.979 2.907 0 4.93 2.78 2.177 7.979-.904 1.708 1.378 2.114 3.384 2.577 1.799.415 1.859 1.311 1.853 2.879 0 .13-.011 1.171 0 1.665-.483-.309-1.442-.552-2.187.106-.535.472-.568.504-1.783 1.629-1.75-.831-4.456-1.883-6.214-2.478-.896-.304-2.04-.308-2.962.075l-1.683.699z" />
                                            </svg>
                                            <span class="flex w-36"> Katagori Supplier </span>
                                        </a>
                                    </li>
                                    <!-- Category End -->

                                    <!-- Daftar Supplier Start -->
                                    <li id="penawaran" name="penawaran" class="group" onclick="childMenu(event,this)">
                                        <a class="nav-a ml-2 {{ Request::is('dashboard/suppliers*') ? 'active' : '' }}" href="/dashboard/suppliers" >
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z"/>
                                            </svg>
                                            <span class="flex w-36"> Daftar Supplier </span>
                                        </a>
                                    </li>
                                    <!-- Daftar Supplier end -->
                                </ul>
                                <!-- Child Supplier End -->
                            </li>
                        </div>
                        <!-- Sidebar Supplier End-->

                        <!-- Sidebar Gudang start-->
                        <div class="nav-a mx-2">
                            <a class="nav-a" href="/dashboard/warehouses">
                                <svg class="nav-svg transition duration-300 ease-in-out {{ Request::is('dashboard/warehouses*') ? 'active' : '' }}"
                                    role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title> Gudang</title>
                                    <path d="M17.059 17.926l-3.995-4.318c-1.067-1.068-.04-2.262 2.54-2.52 0 0-1.428-.703-3.019-.703-.808 0-1.657.181-2.384.728-1.224.921-.973 1.658-1.525 2.21-.507.507-1.114.074-1.114.074l-.875.875 2.474 2.473.874-.875s-.361-.622.037-1.019c.282-.281.822-.412 1.285.052.195.194 4.148 4.353 4.148 4.353 1.078 1.078 2.363-.522 1.554-1.33zm6.941-4.925h-3v10h-18v-10h-3l12-12.001 12 12.001zm-4-5.424l-3-3v-2.576h3v5.576z"/>
                                </svg>
                            </a>
                            <li id="liDashboard" data-name="liDashboard" class="group hidden">
                                <a href="#" class="nav-a mx-2 {{ Request::is('dashboard/warehouses*') ? 'active' : '' }}">
                                    <span class="flex w-40"> Gudang </span>
                                </a>
                            </li>
                        </div>
                        <!-- Sidebar Gudang End-->

                        <!-- Sidebar Mutasi Barang start-->
                        <div class="div-nav-a">
                            <a class="nav-a {{ Request::is('dashboard/purchases*') ? 'active' : '' }}" href="/dashboard/purchases" >
                                <svg role="img" class="nav-svg transition duration-300 ease-in-out"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Mutasi Barang</title>
                                    <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm2.085 14h-9v2h9v3l5-4-5-4v3zm-4-6v-3l-5 4 5 4v-3h9v-2h-9z"/>
                                </svg>
                            </a>
                            <li id="liAccounting" name="liAccounting" class="group hidden"
                                onclick="showHideDropdown(this)">
                                <a href="#"
                                    class="nav-a mx-2 {{ Request::is('dashboard/purchases*') ? 'active' : '' }}">
                                    <span class="flex w-40"> Mutasi Barang </span>
                                    <svg id="accountingArrow" name="accountingArrow"
                                        class="svg-arrow rotate-180 transition duration-300 ease-in-out" role="img"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Arrow</title>
                                        <path
                                            d="M12.468.186a.7.7 0 0 0-.95 0L1.924 9.193a1.705 1.705 0 0 0-.475 1.095v3.59c0 .358.214.452.475.207l9.601-9.01a.705.705 0 0 1 .95 0l9.603 9.01c.262.245.475.151.475-.207v-3.59a1.71 1.71 0 0 0-.475-1.095zm0 9.783a.705.705 0 0 0-.95 0l-9.595 9.002a1.705 1.705 0 0 0-.475 1.094v3.59c0 .358.214.453.475.208l9.601-9.007a.701.701 0 0 1 .95 0l9.603 9.008c.262.244.475.15.475-.208v-3.59a1.71 1.71 0 0 0-.475-1.094Z" />
                                    </svg>
                                </a>
                                <!-- Mutasi Barang Start -->
                                <ul id="accountingChild" name="accountingChild" class="hidden">
                                    <!-- Pembelian Start -->
                                    <li id="penagihan" name="penagihan" class="group">
                                        <a class="nav-a ml-2 border-t-[1px] {{ Request::is('dashboard/purchases*') ? 'active' : '' }}" href="/dashboard/purchases">
                                            <svg class="child-nav-svg" role="img" fill="#000000"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M20.332 23h-6.999l-2.226-6.543c-.136-.279-.42-.457-.732-.457h-.375v-1h3.729l2.056-3.738c.106-.171.285-.262.467-.262.426 0 .691.469.467.834l-1.741 3.166h4.044l-1.741-3.166c-.224-.365.041-.834.467-.834.182 0 .361.091.467.262l2.056 3.738h3.729v1h-.374c-.312 0-.597.178-.733.459l-2.561 6.541zm-8.396-1h-11.936c0-.277-.002-2.552-.004-2.803-.008-2.111.083-3.319 2.514-3.88 2.663-.614 5.801-1.165 4.537-3.495-3.744-6.906-1.067-10.822 2.954-10.822 3.942 0 6.686 3.771 2.952 10.822l-1.091 2.178h-1.862c-.552 0-1 .448-1 1v1c0 .552.448 1 1 1h.236l1.7 5zm3.546-4.426c0-.276-.224-.5-.5-.5s-.5.224-.5.5v3c0 .276.224.5.5.5s.5-.224.5-.5v-3zm2-.074c0-.276-.224-.5-.5-.5s-.5.224-.5.5v3c0 .276.224.5.5.5s.5-.224.5-.5v-3zm2.036 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v3c0 .276.224.5.5.5s.5-.224.5-.5v-3z"/>
                                            </svg>
                                            <span class="flex w-36"> Pembelian </span>
                                        </a>
                                    </li>
                                    <!-- Pembelian End -->
                                    <!-- Pemakaian start -->
                                    <li id="ppn" name="ppn" class="group">
                                        <a class="nav-a ml-2" href="#">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M7 16.462l1.526-.723c1.792-.81 2.851-.344 4.349.232 1.716.661 2.365.883 3.077 1.164 1.278.506.688 2.177-.592 1.838-.778-.206-2.812-.795-3.38-.931-.64-.154-.93.602-.323.818 1.106.393 2.663.79 3.494 1.007.831.218 1.295-.145 1.881-.611.906-.72 2.968-2.909 2.968-2.909.842-.799 1.991-.135 1.991.72 0 .23-.083.474-.276.707-2.328 2.793-3.06 3.642-4.568 5.226-.623.655-1.342.974-2.204.974-.442 0-.922-.084-1.443-.25-1.825-.581-4.172-1.313-6.5-1.6v-5.662zm-1 6.538h-4v-8h4v8zm15-11.497l-6.5 3.468v-7.215l6.5-3.345v7.092zm-7.5-3.771v7.216l-6.458-3.445v-7.133l6.458 3.362zm-3.408-5.589l6.526 3.398-2.596 1.336-6.451-3.359 2.521-1.375zm10.381 1.415l-2.766 1.423-6.558-3.415 2.872-1.566 6.452 3.558z"/>
                                            </svg>
                                            <span class="flex w-36"> Pemakaian </span>
                                        </a>
                                    </li>
                                    <!-- Pemakaian end -->
                                    <!-- Pemindahan start -->
                                    <li id="ppn" name="ppn" class="group">
                                        <a class="nav-a ml-2" href="#">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"fill-rule="evenodd" clip-rule="evenodd">
                                                <path d="M21 13v10h-21v-19h12v2h-10v15h17v-8h2zm3-12h-10.988l4.035 4-6.977 7.07 2.828 2.828 6.977-7.07 4.125 4.172v-11z"/>
                                            </svg>
                                            <span class="flex w-36"> Pemindahan </span>
                                        </a>
                                    </li>
                                    <!-- Pemindahan end -->
                                </ul>
                                <!-- Mutasi Barang End -->
                            </li>
                        </div>
                        <!-- Sidebar Mutasi Barang End-->

                        <!-- Sidebar Laporan start-->
                        <div class="div-nav-a">
                            <a class="nav-a" href="">
                                <svg role="img" class="nav-svg transition duration-300 ease-in-out"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>Laporan</title>
                                    <path d="M7 22v-16h14v7.543c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-5.362zm16-7.614v-10.386h-18v20h8.189c3.163 0 9.811-7.223 9.811-9.614zm-10 1.614h-4v-1h4v1zm6-4h-10v1h10v-1zm0-3h-10v1h10v-1zm1-7h-17v19h-2v-21h19v2z"/>
                                </svg>
                            </a>
                            <li id="liWorkshop" name="liWorkshop" class="group hidden" onclick="showHideDropdown(this)">
                                <a href="#"
                                    class="nav-a mx-2 {{ Request::is('dashboard/workshop*') ? 'active' : '' }}">
                                    <span class="flex w-40"> Laporan </span>
                                    <svg id="workshopArrow" name="workshopArrow"
                                        class="svg-arrow rotate-180 transition duration-300 ease-in-out" role="img"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Arrow</title>
                                        <path
                                            d="M12.468.186a.7.7 0 0 0-.95 0L1.924 9.193a1.705 1.705 0 0 0-.475 1.095v3.59c0 .358.214.452.475.207l9.601-9.01a.705.705 0 0 1 .95 0l9.603 9.01c.262.245.475.151.475-.207v-3.59a1.71 1.71 0 0 0-.475-1.095zm0 9.783a.705.705 0 0 0-.95 0l-9.595 9.002a1.705 1.705 0 0 0-.475 1.094v3.59c0 .358.214.453.475.208l9.601-9.007a.701.701 0 0 1 .95 0l9.603 9.008c.262.244.475.15.475-.208v-3.59a1.71 1.71 0 0 0-.475-1.094Z" />
                                    </svg>
                                </a>
                                <!-- Laporan Child Start -->
                                <ul id="workshopChild" name="workshopChild" class="hidden">
                                    <li id="monitoring" name="monitoring" class="group">
                                        <a class="nav-a ml-2 border-t-[1px]" href="#">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path d="M22 24h-20v-24h14l6 6v18zm-7-23h-12v22h18v-16h-6v-6zm3 15v1h-12v-1h12zm0-3v1h-12v-1h12zm0-3v1h-12v-1h12zm-2-4h4.586l-4.586-4.586v4.586z"/>
                                            </svg>
                                            <span class="flex w-36"> Lap. Pembelian</span>
                                        </a>
                                    </li>
                                    <li id="gambar" name="gambar" class="group">
                                        <a class="nav-a ml-2 border-b-[1px]" href="#">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path d="M22 24h-20v-24h14l6 6v18zm-7-23h-12v22h18v-16h-6v-6zm3 15v1h-12v-1h12zm0-3v1h-12v-1h12zm0-3v1h-12v-1h12zm-2-4h4.586l-4.586-4.586v4.586z"/>
                                            </svg>
                                            <span class="flex w-36"> Lap. Pemakaian </span>
                                        </a>
                                    </li>
                                    <li id="gambar" name="gambar" class="group">
                                        <a class="nav-a ml-2 border-b-[1px]" href="#">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path d="M22 24h-20v-24h14l6 6v18zm-7-23h-12v22h18v-16h-6v-6zm3 15v1h-12v-1h12zm0-3v1h-12v-1h12zm0-3v1h-12v-1h12zm-2-4h4.586l-4.586-4.586v4.586z"/>
                                            </svg>
                                            <span class="flex w-36"> Lap. Pemindahan </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Laporan Child End -->
                            </li>
                        </div>
                        <!-- Sidebar Laporan End-->

                        <!-- Sidebar User start-->
                        <div class="div-nav-a">
                            <a class="nav-a" href="/dashboard/users/users">
                                <svg role="img"
                                    class="nav-svg transition duration-300 ease-in-out {{ Request::is('dashboard/users*') ? 'active' : '' }}"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <title>User</title>
                                    <path
                                        d="M5.331 3.987H4.012v-1.32h1.32zm7.605 16.001c-1.78-.08-3.15-.532-4.21-1.185.718 3.118 3.405 4.65 3.535 4.723l.792.437c6.063-.405 9.611-4.318 9.611-9.436v-1.109c-1.441 4.7-4.795 6.793-9.728 6.57M4.006 9.605h1.332v2.94h1.336V7.627H8.01v9.612C8.009 21.8 12 24 12 24c-6.705 0-10.664-4.065-10.664-9.473V3.65H2.67v7.274h1.336zM2.67 1.334H1.336V0H2.67zm2.661 6.953h-1.32v-1.32h1.32zm1.334-1.98h-1.32v-1.32h1.32zm1.343-1.66H6.674v-1.32h1.335zM6.674 2.654H5.338v-1.32h1.336zM22.147 13.26l.517-1.688V.015c-6.045 0-6.674 2.317-6.674 4.531V17.24c0 .657-.064 1.354-.197 2.037 3.205-.583 5.296-2.565 6.354-6.016Z" />
                                </svg>
                            </a>
                            <li id="liUser" name="liUser" class="group hidden" onclick="showHideDropdown(this)">
                                <a href="#"
                                    class="nav-a mx-2 {{ Request::is('dashboard/users/users*') ? 'active' : '' }}">
                                    <span class="flex w-40"> User </span>
                                    <svg id="userArrow" name="userArrow"
                                        class="svg-arrow rotate-180 transition duration-300 ease-in-out" role="img"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Arrow</title>
                                        <path
                                            d="M12.468.186a.7.7 0 0 0-.95 0L1.924 9.193a1.705 1.705 0 0 0-.475 1.095v3.59c0 .358.214.452.475.207l9.601-9.01a.705.705 0 0 1 .95 0l9.603 9.01c.262.245.475.151.475-.207v-3.59a1.71 1.71 0 0 0-.475-1.095zm0 9.783a.705.705 0 0 0-.95 0l-9.595 9.002a1.705 1.705 0 0 0-.475 1.094v3.59c0 .358.214.453.475.208l9.601-9.007a.701.701 0 0 1 .95 0l9.603 9.008c.262.244.475.15.475-.208v-3.59a1.71 1.71 0 0 0-.475-1.094Z" />
                                    </svg>
                                </a>
                                <!-- User Child Start -->
                                <ul id="userChild" name="userChild" class="hidden">
                                    <li class="group">
                                        <a class="nav-a ml-2 border-t-[1px] {{ Request::is('/dashboard/users/users*') ? 'active' : '' }}"
                                            href="/dashboard/users/users">
                                            <svg class="child-nav-svg" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z" />
                                            </svg>
                                            <span class="flex w-40"> User </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- User Child End -->
                            </li>
                        </div>
                        <!-- Sidebar User End-->

                        <!-- Sidebar Logout start-->
                        <div class="div-nav-a">
                            <form class="nav-a" action="/logout" method="post">
                                @csrf
                                <button type="submit" class="nav-a">
                                    <svg role="img" class="nav-svg transition duration-300 ease-in-out"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>LOGOUT</title>
                                        <path
                                            d="M12 0C5.373 0 0 5.37 0 12s5.373 12 12 12c6.63 0 12-5.37 12-12S18.63 0 12 0zm-.84 4.67h1.68v8.36h-1.68V4.67zM12 18.155c-3.24-.002-5.865-2.63-5.864-5.868 0-2.64 1.767-4.956 4.314-5.655v1.71c-1.628.64-2.698 2.21-2.695 3.96 0 2.345 1.903 4.244 4.248 4.243 2.344-.002 4.244-1.903 4.243-4.248 0-1.745-1.07-3.312-2.694-3.95V6.63c2.55.7 4.314 3.018 4.314 5.66 0 3.24-2.626 5.864-5.865 5.864z" />
                                    </svg>
                                </button>
                                <li name="liLogout" id="liLogout" class="group hidden">
                                    <button type="submit" class="nav-a mx-2">
                                        <span class="flex w-40"> Logout </span>
                                    </button>

                                </li>
                            </form>
                        </div>
                        <!-- Sidebar Logout End-->
                </ul>
            </nav>
        </div>
    </div>
@endcanany
