<div>
 
<div class="row mb-2">
                          <div class="col-md-12">
                            <label for="name" ><i class="fas fa-file-signature"></i>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            

                            <div class="col-md-12">
                                <label for="email" ><i class="fa fa-fw fa-envelope"></i>{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="password" ><i class="fa fa-fw fa-key"></i>{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                             <div class="col-md-12">
                                <label for="password-confirm"><i class="fa fa-fw fa-key"></i>{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-2">
                             <div class="col-md-12">
                                <label for="phone"><i class="fa fa-fw fa-key"></i>{{ __('Phone Number') }}</label>
                                <input id="phone" type="number" class="form-control" name="phone" required >
                            </div>
                        </div>
                        <div class="row mb-2">
                             <div class="col-md-12">
                                <label for="image"><i class="fas fa-image"></i>{{ __('Image') }}</label>
                                <input id="image" type="file" class="form-control" name="image" required >
                            </div>
                        </div>
 </div>