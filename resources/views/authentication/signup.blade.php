@include('partials.header', ['title' => 'adish HAP | Sign Up'])
@include('partials.nav')
    <div class="bg-custom-gray w-full flex flex-col py-32 items-center gap-y-10">
        <div class="w-1/4 text-center">
            <p class="text-4xl font-bold">Empowering support, one ticket at a time with adish HAP.</p>
        </div>
        <div class="w-1/4">
            <form action="/mail/send" method="GFT">
                @csrf
                    <p class="text-sm">Work Email</p>
                    <input type="text" name="email" id="email" placeholder="Enter your work email" class="mt-2 w-full border-[1px] border-black p-1.5 text-sm rounded-sm" required value={{old('email')}} >
                    
                    <div class="flex flex-col md:flex-row items-start mt-3">
                        <input type="checkbox" id="agreement" name="agreement" class="mr-1 mt-0.5 accent-custom-orange" required>
                        <p class="text-xs text-justify">I agree to the <a href="#" class="text-custom-orange underline">adish HAP Customer Agreement</a>, which incorporates by reference to the <a href="#" class="text-custom-orange underline">Product-Specific Terms</a> and acknowledge the <a href="#" class="text-custom-orange underline">Privacy Policy</a></p>.
                    </div>

                    <button type="submit" class="w-full p-2 mt-5 bg-custom-orange rounded-sm text-white text-sm font-bold">Sign Up</button>
            </form>
            <p class="text-sm text-center mt-3">Have an account already? <a href="/login" class="text-custom-orange underline">Login here</a>.</p>
        </div>
    </div>
@include('partials.footer')