@extends('website::shared.layout')
@section('content')
    <div class="user-content container">
        <div class="user-wrapper section-aside">
            @include('website::pages.user.sidebar')
            <section>
                <div class="form-container form-bg-container">
                    <div class="form-content">
                        <form action="{{ route('website-user-profile-store') }}" method="POST" id="form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-row">
                                    <div class="form-select-photo profile {{ $user->avatar ? 'active' : '' }}">
                                        <div class="select-photo">
                                            <div class="icon">
                                                <i data-feather="upload-cloud"></i>
                                            </div>
                                            <div class="title">
                                                <span>Upload profile</span>
                                            </div>
                                        </div>
                                        <div class="image-view {{ $user?->avatar ? 'active' : '' }}">
                                            <img src="{{ $user?->avatar_url }}" alt="">
                                        </div>
                                        <input type="file" name="profile" accept="image/*" class="selectImage">
                                        <input type="hidden" name="tmp_profile"
                                            value="{{ $user->avatar ? $user->avatar : '' }}">
                                    </div>
                                    @error('profile')
                                        <div class="error-require">
                                            <i data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row row-2">
                                <div class="form-row">
                                    <label>@lang('website.form.label.name') <span class="require">*</span></label>
                                    <input type="text" placeholder="@lang('website.form.placeholder.name')" name="name" autocomplete="off"
                                        value="{{ isset($user->name) ? $user->name : old('name') }}">
                                    @error('name')
                                        <div class="error-require mt-2">
                                            <i class="h-5 w-5 mr-2" data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-row">
                                    <label>@lang('website.form.label.username') <span class="require">*</span></label>
                                    <input type="text" placeholder="@lang('website.form.placeholder.username')" name="username" autocomplete="off"
                                        value="{{ isset($user->username) ? $user->username : old('username') }}">
                                    @error('username')
                                        <div class="error-require flex items-center mt-2">
                                            <i class="h-5 w-5 mr-2" data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-row">
                                    <label>@lang('website.form.label.email')</label>
                                    <input type="email" placeholder="@lang('website.form.placeholder.email')" name="email" autocomplete="off"
                                        value="{{ $user?->email ?? old('email') }}">
                                    @error('email')
                                        <div class="error-require mt-2">
                                            <i class="h-5 w-5 mr-2" data-feather="alert-triangle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row-submit">
                                <div class="row-submit-group">
                                    <button type="submit" class="btn">
                                        <i class="h-5 w-5 mr-2" data-feather="save"></i>
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
        $(".selectImage").on("change", function() {
            let parent = $(this).closest(".form-select-photo");

            $readURL(this, function(res) {
                parent.find(".image-view").addClass("active");
                parent.find(".image-view").find("img").attr('src', res);
                parent.find(".select-photo").addClass("active");
            });
        });

        $(document).ready(function() {
            feather.replace();

            // convert username to lowercase
            $('input[name="username"]').keyup(function() {
                this.value = this.value.replace(/ /g, '_');
                this.value = this.value.replace(/[^a-zA-Z0-9_]/g, '');
                this.value = this.value.toLowerCase();
            });
        });
    </script>
@stop
