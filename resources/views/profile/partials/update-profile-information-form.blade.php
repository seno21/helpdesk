<section>
    <header>
        <h2 class="font-weight-bold">Profile Settings</h2>
    </header>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Profile Information</h4>
                <form class="forms-sample" id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Username</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    @if (session('status') === 'profile-updated')
                        {{-- <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p> --}}
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success Update Profile',
                                text: 'Something went wrong!'
                            })
                        </script>
                    @endif
                </form>
            </div>
        </div>
    </div>

</section>
