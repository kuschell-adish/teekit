@include('partials.header', ['title' => 'adish HAP | Reset Password'])
@include('partials.nav')
<div class="relative flex items-center justify-center h-16 mt-20">
    <div class="absolute top-0 flex items-center justify-center rounded-full bg-white h-16 w-16">
        <div class="text-custom-orange text-4xl">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
</div>
<div class="w-full px-10 flex flex-col justify-center items-center -mt-5">
    <div class="w-1/3 bg-custom-gray text-center flex flex-col gap-y-8 p-10">
        <p class="font-bold text-sm">Please reset your password</p>
        <p class="text-sm">You're almost there! We have sent an email to <span class="font-bold text-sm">{{$email}}</span> to confirm your registration.</p>
        <p class="text-sm">If you don’t see it, you may need to <span class="text-sm font-bold">check your spam</span> folder.</p>

        <div class="text-left px-2">
            <form action="#" method="POST">
                @csrf
                <label for="old_password" class="text-left text-sm">Old Password</label>
                <input type="password" name="old_password" id="old_password" placeholder="Enter your old password" class="mt-2 mb-2 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
                    @error('old_password')
                    <p class="text-xs text-red-700 mt-2">{{$message}}</p>
                    @enderror
                    
                <label for="password" class="text-sm">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="mt-2 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
                <p class="text-xs text-gray-400 mb-2">Passwords must be 8 characters long, and must contain one lowercase letter, one uppercase letter, one number, and one symbol.  </p>
                    @error('password')
                    <p class="text-xs text-red-700 mt-2">{{$message}}</p>
                    @enderror
                
                <label for="confirm_password" class="text-sm">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Re-type your password" class="mt-2 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
                    @error('confirm_password')
                    <p class="text-xs text-red-700 mt-2">{{$message}}</p>
                    @enderror
                <div class="flex justify-center items-center">
                <button type="submit" class="p-2 w-1/2 mt-7 bg-blue-500 rounded-sm text-white text-sm font-semibold">Reset Password</button>
                </div>
            </form>
            </div>

        <p class="text-sm text-center mt-3">Need help? <a href="#" class="text-custom-orange underline">Contact us</a>.</p>
    </div>
</div>
@include('partials.footer')