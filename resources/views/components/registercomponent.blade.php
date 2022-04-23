

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf
        <div class="title">Register</div>

        <div class="input-box underline">
          <input  type="text" class="" @error('name')  is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus >
          <div class="underline"></div>
          @error('name')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

        <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          <div class="underline"></div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

         

        <div class="input-box">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="underline"></div>
          @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>

         

          <div class="input-box">
          <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Conform Password">
          <div class="underline"></div>
          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>

        <div class="input-box">
          <input id="phone" type="number"  name="phone" required  placeholder="Phone" value="{{ old('img') }}">
          <div class="underline"></div>
          @error('phone')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>

        <div class="input-box">
           <input id="image" type="file" class=" border-secondary form-control" name="image" required >
          <div class="underline"></div>
          @error('image')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
        </div>

         

    

        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>


