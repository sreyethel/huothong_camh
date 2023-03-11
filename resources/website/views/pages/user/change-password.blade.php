@extends('website::shared.layout')
@section('content')
    <div class="user-content container">
        <div class="user-wrapper section-aside">
            @include('website::pages.user.sidebar')
            <section>
                <div class="form-container form-bg-container">
                    <div class="form-content" x-data="form">
                        <form action="{{ route('website-user-change-password-store') }}" method="POST" id="form"
                            enctype="multipart/form-data" x-form="submit">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-row" x-data={show:false}>
                                    <label><i data-feather="key"></i> @lang('website.form.label.password')</label>
                                    <input x-bind:type="!show ? 'password' : 'text'" class="form-control" name="password"
                                        placeholder="@lang('website.form.placeholder.password')" value="{{ old('password') }}">
                                    <div class="form-row-item" @click="show = !show">
                                        <span x-show="!show">
                                            <i data-feather="eye"></i>
                                        </span>
                                        <span x-show="show">
                                            <i data-feather="eye-off"></i>
                                        </span>
                                    </div>
                                    <span class="error-require flex items-center mt-1" x-show="validate?.password">
                                        <i class="w-5 h-5 mr-1" data-feather="alert-triangle"></i>
                                        <small x-text="validate?.password"></small>
                                    </span>
                                </div>
                                <div class="form-row" x-data={show:false}>
                                    <label><i data-feather="key"></i> @lang('website.form.label.confirm_password')</label>
                                    <input x-bind:type="!show ? 'password' : 'text'" class="form-control"
                                        name="password_confirmation" placeholder="@lang('website.form.placeholder.confirm_password')"
                                        value="{{ old('password_confirmation') }}">
                                    <div class="form-row-item" @click="show = !show">
                                        <span x-show="!show">
                                            <i data-feather="eye"></i>
                                        </span>
                                        <span x-show="show">
                                            <i data-feather="eye-off"></i>
                                        </span>
                                    </div>
                                    <span class="error-require flex items-center mt-1"
                                        x-show="validate?.password_confirmation">
                                        <i class="w-5 h-5 mr-1" data-feather="alert-triangle"></i>
                                        <small x-text="validate?.password_confirmation"></small>
                                    </span>
                                </div>
                            </div>

                            <div class="row-submit">
                                <div class="row-submit-group">
                                    <button type="submit" class="btn">
                                        <i data-feather="save"></i>
                                        @lang('website.form.button.save')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type="module">
        Alpine.data('form', () => ({
            validate: null,

            submit(response) {
                    this.validate = response?.data?.errors;
                    var data = response?.data;
                    if (data.error == false && response.completed == true) {
                        document.getElementById('form').reset();
                        Toast({
                            message: data.message,
                            status: data.status,
                            size: 'small',
                        });
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
