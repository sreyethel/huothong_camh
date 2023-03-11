@extends('website::pages.auth.index')
@section('auth-content')
    <div class="auth-content" x-data="form">
        <div class="auth-wrapper">
            <div class="logo">
                <img src="{{ asset('images/logo/logo.png') }}" alt="">
            </div>

            <form id="form" action="{{ route('website-auth-access-sign-in') }}" method="POST" x-form="submit">
                {{ csrf_field() }}
                <input type="hidden" name="returnUrl" value={{ request()->returnUrl }}>
                <div class="row">
                    <div class="form-row">
                        <div class="flex items-center">
                            <i class="h-5 w-5 mr-1" data-feather="user"></i>
                            <label>@lang('website.form.label.user_or_phone')</label>
                        </div>
                        <input type="text" class="form-control" name="user" placeholder="@lang('website.form.placeholder.user_or_phone')">
                        <span class="error-require flex items-center mt-2" x-show="validate?.user">
                            <i class="h-3 w-3 mr-1" data-feather="alert-triangle"></i>
                            <small x-text="validate?.user"></small>
                        </span>
                    </div>
                    <div class="form-row" x-data={show:false}>
                        <label>@lang('website.form.label.password') </label>
                        <input x-bind:type="!show ? 'password' : 'text'" class="form-control" name="password"
                            placeholder="@lang('website.form.placeholder.password')">
                        <div class="form-row-item" @click="show = !show">
                            <span x-show="!show">
                                <i data-feather="eye"></i>
                            </span>
                            <span x-show="show">
                                <i data-feather="eye-off"></i>
                            </span>
                        </div>
                        <span class="error-require flex items-center mt-2" x-show="validate?.password">
                            <i class="h-3 w-3 mr-1" data-feather="alert-triangle"></i>
                            <small x-text="validate?.password"></small>
                        </span>
                    </div>
                </div>

                <p class="!w-auto">
                    <a class="w-auto h-auto"
                        href="{{ route('website-auth-forgot-password', ['returnUrl' => request('returnUrl')]) }}">
                        @lang('website.form.button.forgot_password') </a>
                </p>


                <div class="form-submit mt-5">
                    <button type="submit" class="btn btn-primary">@lang('website.form.button.login') </button>
                </div>

                <div class="not-yet-register">
                    <span>@lang('website.form.button.not_have_account')</span>
                    <a class="w-auto h-auto"
                        href="{{ route('website-auth-sign-up', ['returnUrl' => request('returnUrl')]) }}">
                        <p>@lang('website.form.button.register')</p>
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data("form", () => ({
                loading: false,
                validate: null,

                submit(response) {
                    this.loading = response.loading;
                    this.validate = response?.data?.errors;
                    var data = response?.data;
                    if (data.error == false && response.completed == true) {
                        Toast({
                            message: data.message,
                            status: data.status,
                            size: 'small',
                        });

                        window.location.href = data.redirect;
                    }

                    if (data.error == true) {
                        Toast({
                            message: data.message,
                            status: data.status,
                            size: 'small',
                        });
                    }
                },
            }));
    </script>
@stop
