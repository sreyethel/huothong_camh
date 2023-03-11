@extends('website::pages.auth.index')
@section('auth-content')
    <div class="auth-content" x-data="form">
        <div class="auth-wrapper">
            <form id="form" action="{{ route('website-auth-reset-password') }}" method="POST" x-form="submit">
                @csrf
                <input type="hidden" name="returnUrl" value="{{ request('returnUrl') }}">
                <div x-show="step <= 2" style="display:none" x-transition:enter.duration.300ms>
                    <div class="row">
                        <h3 class="text-center font-bold text-xl py-5">@lang('website.form.header.enter_phone_to_get_otp')</h3>
                        <div class="form-row">
                            <label> <i data-feather="phone-call"></i> @lang('website.form.label.phone')</label>
                            <input type="text" class="form-control user-input" name="phone"
                                placeholder="@lang('website.form.placeholder.phone')">
                            <span class="error-require flex items-center mt-1" x-show="validate?.phone">
                                <i class="mr-1" data-feather="alert-triangle"></i>
                                <small x-text="validate?.phone"></small>
                            </span>
                            <div class="error-require">
                                <span class="user-required"></span>
                                <span class="user-phone"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit mt-10" x-show="step == 1">
                        <button type="button" class="btn btn-primary btn-sign-up" @click="onRequestOtp">
                            <span>
                                @lang('website.form.button.send')
                                <i class="fas fa-spinner fa-spin" x-show="loading == true"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div x-show="step == 2" style="display:none" x-transition:enter.duration.300ms>
                    <div class="row">
                        <div class="form-row">
                            <label><i data-feather="code"></i> @lang('website.form.label.verification_code')</label>
                            <div style="position: relative;">
                                <input type="text" class="form-control verification-code" name="verification_code"
                                    placeholder="@lang('website.form.placeholder.verification_code')" autocomplete="off" maxlength="6">
                                <button type="button" x-show="countdown == true" class="btn-request-otp">
                                    <span class="countdown" x-show="countdown == true"></span>
                                </button>
                            </div>
                            <span class="error-require verify-otp"></span>
                        </div>
                    </div>
                    <template x-if="countdown == false">
                        <p class="flex justify-end !w-auto" @click="onRequestOtp">@lang('website.form.button.resend')</p>
                    </template>
                    <template x-if="countdown == true">
                        <div class="form-submit mt-10">
                            <button type="button" class="btn btn-primary btn-sign-up" @click="confirmOTP">
                                <span>
                                    @lang('website.form.button.send')
                                    <i class="fas fa-spinner fa-spin" x-show="loading == true"></i>
                                </span>
                            </button>
                        </div>
                    </template>
                </div>
                <div x-show="step == 3" style="display:none" x-transition:enter.duration.300ms>
                    <h3 class="text-center font-bold text-xl py-5">@lang('website.form.header.reset_password')</h3>
                    <div class="row">
                        <div class="form-row" x-data={show:false}>
                            <label>@lang('website.form.label.password')</label>
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
                                <i class="mr-1" data-feather="alert-triangle"></i>
                                <small x-text="validate?.password"></small>
                            </span>
                        </div>
                        <div class="form-row" x-data={show:false}>
                            <label>@lang('website.form.label.confirm_password')</label>
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
                            <span class="error-require flex items-center mt-1" x-show="validate?.password_confirmation">
                                <i class="mr-1" data-feather="alert-triangle"></i>
                                <small x-text="validate?.password_confirmation"></small>
                            </span>
                        </div>
                    </div>

                    <p @click="changePhone">@lang('website.form.button.change_phone_number')</p>

                    <div class="form-submit mt-5">
                        <button type="submit" class="btn btn-primary btn-sign-up">
                            @lang('website.form.button.save')</button>
                    </div>
                </div>
                <div class="not-yet-register">
                    <span>@lang('website.form.button.already_have_account')</span>
                    <a class="w-auto h-auto"
                        href="{{ route('website-auth-sign-in', ['returnUrl' => request('returnUrl')]) }}">
                        <p>@lang('website.form.button.login')</p>
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
    {!! HTML::script('firebase/app.js') !!}
    {!! HTML::script('firebase/auth.js') !!}
    {!! HTML::script('firebase/firestore.js') !!}

    <script type="module">
        Alpine.data('form', () => ({
            step: 1,
            loading: false,
            validate: null,
            verifying: false,
            countdown: false,
            interval: null,

            init() {
                this.onfirebaseInitialize();
                this.onRenderRecaptcha();
                window.recaptchaVerifier.render().then(function(widgetId) {
                    grecaptcha.reset(widgetId);
                });
                this.onKeyUp();
                localStorage.removeItem('verification_code');
            },

            onfirebaseInitialize() {
                const firebaseConfig = {
                    apiKey: "AIzaSyB5r4o6UmJ8L_bZwptpN1HDqKK08MQ5bVA",
                    authDomain: "houthong-camh.firebaseapp.com",
                    projectId: "houthong-camh",
                    storageBucket: "houthong-camh.appspot.com",
                    messagingSenderId: "842539727928",
                    appId: "1:842539727928:web:df9ce3630fb2de28e37acd"
                    };
                firebase.initializeApp(firebaseConfig);
            },

            onRenderRecaptcha() {
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                    'size': 'invisible',
                });
                recaptchaVerifier.render();
            },

            onCountdown() {
                this.countdown = true;
                var timer2 = "1:00";
                clearInterval(this.interval);
                this.interval = setInterval(() => {
                    var timer = timer2.split(':');
                    var minutes = parseInt(timer[0], 10);
                    var seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;
                    if (minutes < 0) clearInterval(this.interval);
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    $('.countdown').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                    if (timer2 == '0:00') {
                        this.countdown = false;
                        clearInterval(this.interval);
                        $('.verify-otp').html('');
                    }
                }, 1000);
            },

            onKeyUp() {
                // phone number input
                $('input[name="phone"]').keyup(function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    // max length 10
                    if (this.value.length > 10) {
                        this.value = this.value.slice(0, 10);
                    }
                });

                // convert username to lowercase
                $('input[name="username"]').keyup(function() {
                    this.value = this.value.replace(/ /g, '_');
                    this.value = this.value.replace(/[^a-zA-Z0-9_]/g, '');                    
                    this.value = this.value.toLowerCase();
                });
            },

            onRequestOtp() {
                this.loading = true;
                this.verifying = true;
                $('.verify-otp').html('');
                $('.countdown').html('');

                setTimeout(() => {
                    let phone = $('input[name="phone"]').val();
                    let type = 'forgot';
                    Axios.post("{{ route('website-auth-request-otp') }}", {
                        phone: phone,
                        type: type,
                    }).then(res => {
                        this.validate = res.data.errors;
                        if (res.data.status == true) {
                            this.loading = false;
                            this.verifying = false;

                            const phoneNumber = '+855' + phone;
                            const appVerifier = window.recaptchaVerifier;
                            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                                .then((confirmationResult) => {
                                    window.confirmationResult = confirmationResult;
                                    this.onCountdown();
                                    this.step = 2;
                                    Swal.fire({
                                        text: "6 digit code has been sent to phone number: " + phone,
                                        imageUrl: "{{ asset('images/phone-sms.png') }}",
                                        imageWidth: "100%",
                                        imageHeight: "auto",
                                        imageAlt: 'Phone SMS',
                                        showConfirmButton: true,
                                        ShowCancelButton: false,
                                        confirmButtonText: "Close",
                                        timer: 10000
                                    });

                                }).catch((error) => {
                                    this.loading = false;
                                    this.countdown = false;
                                    if (error.code == 'auth/too-many-requests') {
                                        $('.verify-otp').html('Too many request, please try again later.');
                                    }

                                    if(error.code == 'auth/invalid-phone-number'){
                                        $('.verify-otp').html('Invalid phone number.');
                                    }

                                    if(error.code == 'auth/quota-exceeded'){
                                        $('.verify-otp').html('Quota exceeded, please try again later.');
                                    }
                                });  
                        }
                    }).catch(err => {
                        this.loading = false;
                        this.verifying = false;
                        this.validate = err.response?.data?.errors;
                    });
                }, 500);
            },

            confirmOTP() {
                let verification_code = $('input[name="verification_code"]').val();
                $('.verify-otp').html('');
                this.loading = true;

                setTimeout(() => {
                    if (verification_code > 0) {
                        this.loading = true;
                        try {
                            this.loading = false;
                            window.confirmationResult.confirm(verification_code).then((result) => {
                                $('.verify-otp').html(`
                                    <div class="success">
                                        <i class="fas fa-check-circle"></i>
                                        <p>Verification successful</p>
                                    </div>
                                `);
                                this.countdown = false;
                                clearInterval(this.interval);

                                setTimeout(() => {
                                    this.step = 3;
                                }, 500);

                            }).catch((error) => {
                                if (error.code == 'auth/code-expired') {
                                    $('.verify-otp').html('Verification code is expired');
                                    this.countdown = false;
                                    clearInterval(this.interval);
                                } else {
                                    $('.verify-otp').html('Verification code is not correct');
                                }
                            });
                        } catch (error) {
                            this.loading = false;
                            $('.verify-otp').html('Verification code is not correct');
                        }
                    } else {
                        this.loading = false;
                        $('.verify-otp').html('Please enter verification code');
                    }
                }, 500);
            },

            changePhone() {
                document.querySelector('input[name="verification_code"]').value = '';
                this.step = 1;
                this.loading = false;
                this.countdown = false;
                clearInterval(this.interval);
                $('.verify-otp').html('');
                localStorage.removeItem('verification_code');
            },

            submit(response) {
                this.loading = response.loading;
                this.validate = response.data.errors;
                var data = response.data;
                this.countdown = true;

                if (this.validate?.phone || this.validate?.verification_code) {
                    this.step = 1;
                }

                if (data.error == false && response.completed == true) {
                    Toast({
                        message: data.message,
                        status: data.status,
                        size: 'small',
                    });

                    window.location.href = data.redirect;
                }

                if (data.error == true && response.completed == true) {
                    Toast({
                        message: data.message,
                        status: data.status,
                        size: 'small',
                    });
                }

                this.loading = response.loading;
            },
        }))
    </script>
@stop
