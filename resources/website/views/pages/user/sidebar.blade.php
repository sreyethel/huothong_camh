<aside>
    <div class="user-aside-header">
        <div class="user-aside-header-avatar">
            <img src="{{ $user->avatar_url }}" alt=""
                onerror="this.onerror=null;this.src='{{ asset('images/logo/profile.png') }}';">
        </div>
        <div class="user-aside-header-info">
            <h3>{{ $user->name ?? '' }}</h3>
            @isset($user?->phone)
                <p>{{ $user?->phone }}</p>
            @endisset
            @isset($user?->email)
                <p>{{ $user?->email }}</p>
            @endisset
        </div>
    </div>
    <div class="user-aside-body">
        <a class="user-aside-body-item {{ Request::is('user/profile') ? 'active' : '' }}"
            href="{{ route('website-user-profile') }}">
            <i data-feather="edit"></i>
            <p>Profile</p>
        </a>
        <a class="user-aside-body-item {{ Request::is('user/order') ? 'active' : '' }}"
            href="{{ route('website-user-order') }}">
            <i data-feather="shopping-cart"></i>
            <p>Order</p>
        </a>
        <a class="user-aside-body-item {{ Request::is('user/favorite') ? 'active' : '' }}"
            href="{{ route('website-user-favorite') }}">
            <i data-feather="heart"></i>
            <p>Favorite</p>
        </a>
        <a class="user-aside-body-item {{ Request::is('user/change-password') ? 'active' : '' }}"
            href="{{ route('website-user-change-password') }}">
            <i data-feather="key"></i>
            <p>Change Password</p>
        </a>
        <div class="user-aside-body-item btn-sign-out" data-url="{{ route('website-auth-sign-out') }}">
            <i data-feather="log-out"></i>
            <p>Sign Out</p>
        </div>
    </div>
</aside>
