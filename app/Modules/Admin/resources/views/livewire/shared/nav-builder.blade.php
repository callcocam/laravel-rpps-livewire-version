<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/coreui-base-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo">
        <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/coreui-signet-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo"></div>
    <ul class="c-sidebar-nav">
        @if(\Illuminate\Support\Facades\Route::has('admin-admin-stores'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin-admin-stores') }}">
                    <i class="fas fa-home c-sidebar-nav-icon"></i>
                    @lang('admin.admin.stores')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('profile-admin-stores'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('profile-admin-stores') }}">
                    <i class="fas fa-user c-sidebar-nav-icon"></i>
                    @lang('admin.profile.stores')
                </a>
            </li>
        @endif
        @if($this->appMenus)
            @foreach($this->appMenus as $menuel)
                @if($menuel['assets'] === 'link')
                    <li class="c-sidebar-nav-item">
                        @if(is_string($menuel['href']))
                            <a class="c-sidebar-nav-link" href="{{ url($menuel['href']) }}">
                                @if($menuel['hasIcon'] === true)
                                    @if($menuel['iconType'] === 'coreui')
                                        <i class="{{ $menuel['icon'] }} c-sidebar-nav-icon"></i>
                                    @endif
                                @endif
                                {{ $menuel['name'] }}
                            </a>
                        @endif
                    </li>
                @elseif($menuel['assets'] === 'dropdown')
                    <li class="c-sidebar-nav-dropdown">
                        <a class="c-sidebar-nav-dropdown-toggle" href="#">
                            @isset($menuel['icon'])
                             <i class="c-sidebar-nav-icon {{ $menuel['icon'] }}"></i>
                            @endisset
                            {{  $menuel['name'] }}
                        </a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            @foreach($menuel['elements'] as $element)
                                <li class="c-sidebar-nav-item">
                                    <a class="c-sidebar-nav-link" href="{{url($element['href'])}}">
                                        <span class="c-sidebar-nav-icon"></span> {{ $element['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @elseif($menuel['assets'] === 'title')
                    <li class="c-sidebar-nav-title">
                        @if($menuel['hasIcon'] === true)
                            @if($menuel['iconType'] === 'coreui')
                                <i class="{{ $menuel['icon'] }} c-sidebar-nav-icon"></i>
                            @endif
                        @endif
                        {{ $menuel['name'] }}
                    </li>
                @endif
            @endforeach
        @endif

        @if(\Illuminate\Support\Facades\Route::has('home-index-stores'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('home-index-stores') }}">
                    <i class="fas fa-user c-sidebar-nav-icon"></i>
                    @lang('admin.index.stores')
                </a>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Route::has('logout'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('logout') }}">
                    <i class="cil-cloud-download c-sidebar-nav-icon"></i>
                    @lang('logout')
                </a>
            </li>
        @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
