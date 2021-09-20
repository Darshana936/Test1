
 @extends('layouts.master')
 @section('pagename','Add User')

 @section('content')

 <div class="card card-primary"style="width:70%" >
 <div class="card-header">
        <h3 class="card-title">Add User</h3>
</div>
        <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id">
            <div class="card-body">
                <div class="form-group" style="height:75px;">
                    <label for="firstname">First Name</label><br>
                    <input type="text" name="firstname" class="form-control" id="firstname" value="{{$data->firstname}}">
                <span style="color: red;">@error('firstname'){{$message}}@enderror</span>
                <span id="checkFname"></span>
                </div>
                <div class="form-group" style="height:75px;">
                    <label for="lastname">Last Name</label><br>
                    <input type="text" name="lastname" class="form-control" id="lastname" value="{{$data->lastname}}">
                    <span style="color: red;">@error('lastname'){{$message}}@enderror</span>
                    <span id="checkLname"></span>

                </div>
                <div class="form-group" style="height:75px;">
                    <label for="email">Email Address</label><br>
                    <input type="email" name="email" class="form-control" id="email" value="{{$data->email}}">
                    <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    <span id="checkMail"></span>
                </div>

                <div class="form-group" style="height:75px;">
                    <label for="contactNumber">Contact Number (Mobile Number)</label><br>
                    <input type="tel" name="contactNumber" class="form-control" id="contactNumber" value="{{$data->contact_number}}">
                    <span style="color: red;">@error('contactNumber'){{$message}}@enderror</span>
                    <span id="checkNumb"></span>
                </div>

                <div class="form-group" style="height:75px;">
                    <label for="city">City</label><br>
                    <input type="text" name="city" class="form-control" id="city" value="{{$data->city}}">
                    <span style="color: red;">@error('city'){{$message}}@enderror</span>
                    <span id="checkCity"></span>

                </div>

                <div class="form-group" style="height:75px;">
                    <label>Gender</label><br>
                 <input type="radio" value="Female" name="gender" {{($data->gender=='Female') ? 'checked' : ''}} >
                  <label style="margin: 5px; font:inherit;"> Female</label>

                   <input type="radio" value="Male"  {{($data->gender=='Male') ? 'checked':''}} name="gender" >
                   <label style="margin: 5px; font:inherit;">Male</label>
                   <input type="radio" value="Other"  {{($data->gender=='Other') ? 'checked':''}} name="gender" >
                   <label style="margin: 5px; font:inherit;">Other</label><br>
                   <span style="color: red;">@error('gender'){{$message}}@enderror</span>
                   <span id="checkGen"></span>
                </div>
             
                <div class="form-group" id="ageForMale"  @if($data->gender!='Male') style="display:none;" @endif>
                    <label for="age">Age</label><br>
                    <input type="number" step="any" name="age" min="1" class="form-control" id="age" value="{{$data->age}}">
                <span>@error('age'){{$message}}@enderror</span>
                <span id="checkAge"></span>
                </div>  
               
            <div class="form-group">
                <label for="profilePhoto">Upload Profile Photo</label><br>
       
                <input type="file" name="profilePhoto" class="form-control" id="EditProfilePhoto" >
                <span>@error('profilePhoto'){{$message}}@enderror</span>
                <span id="checkEditImg"></span>
            </div>  
            <div class="form-group">
                <img src="{{asset('dist/images/'.$data->profile_photo)}}" alt="user profile" height="75px" width="75px">
            </div>
            <div class="form-group" style="height:75px;">
                    <label>Status</label><br>
                  <input type="radio" value="Active" {{ ($data->status =='Active')? "checked" : "" }} name="status" ><label style="margin: 5px; font:inherit;"> Active</label> 


                   <input type="radio" value="Inactive" {{ ($data->status =='Inactive')? "checked" : "" }} name="status">
                   <label style="margin: 5px; font:inherit;">Inactive</label>
                  <span style="color: red;">@error('status'){{$message}}@enderror</span>
                  <span id="checkRadio"></span>
                </div>
                
                       
            </div>
                
             
            <div class="card-footer">
                  <a href="{{route('user.list')}}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary" id="UserEditSubmit">Submit</button>
                </div>
        </form>
 

    </div>
  
@endsection

