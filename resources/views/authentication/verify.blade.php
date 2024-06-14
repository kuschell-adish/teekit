@include('partials.header', ['title' => 'adish HAP | Email Verification'])
@include('partials.nav')
<div class="relative flex items-center justify-center h-16 mt-20">
    <div class="absolute top-0 flex items-center justify-center rounded-full bg-white h-16 w-16">
        <div class="text-custom-orange text-4xl">
            <i class="fas fa-envelope"></i>
        </div>
    </div>
</div>
<div class="w-full p-10 flex flex-col justify-center items-center -mt-16">
    <div class="w-1/3 bg-custom-gray text-center flex flex-col gap-y-10 p-10">
        <p class="font-bold text-sm">Please confirm your email</p>
        <p class="text-sm">You're almost there! We have sent an email to <span class="font-bold text-sm">{{$email}}</span></p>
        <p class="text-sm">If you don’t see it, you may need to <span class="text-sm font-bold">check your spam</span> folder.</p>
        <div class="flex flex-col items-center">
            <p class="text-sm">Have you received the email?</p>
            <div class="flex flex-row gap-x-2">
                <a href="/mail/resend" class="p-2 w-28 mt-2 border-blue-500 border-[1px] rounded-sm text-sm font-semibold">Resend Email</a>
                <a href="/forms" class="p-2 w-28 mt-2 bg-blue-500 rounded-sm text-white text-sm font-semibold">Confirm Email</a>
            </div>
        </div>
        <p class="text-sm text-center mt-3">Need help? <a href="#" class="text-custom-orange underline">Contact us</a>.</p>
    </div>
</div>
@include('partials.footer')