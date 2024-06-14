@include('partials.header', ['title' => 'adish HAP | User Forms'])
@include('partials.nav')
<div class="bg-custom-gray">
<div class="flex flex-row flex justify-around mx-10">
    <div class="w-1/3 p-10 ">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
                <label for="profile_picture" class="text-sm">Profile Picture</label>
                <img src="../images/user.png" alt="Default Profile Picture" class="w-20 h-20 mb-3 mt-2">
                <input type="file"  name="profile_picture" id="profile_picture" class="w-full text-sm file:mr-2 file:py-2 file:px-3 file:rounded-sm file:border-0 file:text-sm file:bg-[#EAEAEA]"/>
                <p class="text-xs text-gray-400 mb-5 mt-1">Accepts formats such as JPEG, PNG, BMP, TIFF, and must not exceed into 2MB.</p>

                <label for="email" class="text-sm">Work Email</label>
                <input type="text" name="email" id="email" class="mt-2 mb-5 w-full bg-[#EAEAEA] p-2 text-sm rounded-sm" value="{{$email}}" readonly>

                <label for="password" class="text-sm">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="mt-2 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
                <p class="text-xs text-gray-400 mb-7 mt-1">Passwords must be 8 characters long, and must contain one lowercase letter, one uppercase letter, one number, and one symbol.  </p>

                <label for="confirm_password" class="text-sm">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Re-type your password" class="mt-2 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
    </div>
    <div class="w-1/3 p-10">
                <label for="first_name" class="text-sm">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" class="mt-2 mb-7 w-full border-[1px] border-black p-2 text-sm rounded-sm" required value={{old('first_name')}}>

                <label for="middle_name" class="text-sm">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" placeholder="Enter your middle name" class="mt-2 mb-7 w-full border-[1px] border-black p-2 text-sm rounded-sm" value={{old('middle_name')}}>

                <label for="last_name" class="text-sm">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" class="mt-2 mb-7 w-full border-[1px] border-black p-2 text-sm rounded-sm" required value={{old('last_name')}}>

                <label for="company" class="text-sm">Company</label>
                <input type="text" name="email" id="email" class="mt-2 mb-7 w-full bg-[#EAEAEA] p-2 text-sm rounded-sm" value="adish International Corporation" readonly>

                <label for="department" class="text-sm">Department</label>
                <select name="department" id="department" class="mt-2 mb-7 w-full border-[1px] border-black p-2 text-sm rounded-sm" required>
                    <option value="" {{ old('department') == "" ? 'selected' : '' }}>Select your department</option>
                    <option value="HRAD" {{ old('department') == "HRAD" ? 'selected' : '' }}>HRAD</option>
                    <option value="Team Banana" {{ old('department') == "Team Banana" ? 'selected' : '' }}>Team Banana</option>
                </select>

                <label for="position" class="text-sm">Position</label>
                <input type="text" name="position" id="position" placeholder="Enter your position" class="mt-2 mb-7 w-full border-[1px] border-black p-2 text-sm rounded-sm" required value={{old('position')}}>

                <div class="flex flex row gap-x-5">
                    <a id="cancelButton" href="#" class="w-full p-2 mt-5 text-sm text-right">Cancel</a>
                    <button type="submit" class="w-1/2 p-2 mt-5 bg-custom-orange rounded-sm text-white text-sm font-bold">Submit</button>
                </div>
    </form>
    
    </div>
</div>
</div>

<script>
    var cancelButton = document.getElementById("cancelButton");
    cancelButton.addEventListener("click", function(){
    var clearElements = ["profile_picture", "password", "confirm_password", "first_name", "middle_name", "last_name", "department", "position"];
        clearElements.forEach(function(elementId) {
        document.getElementById(elementId).value = "";
    });
    });
</script>
@include('partials.footer')