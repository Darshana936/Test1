
 @extends('layouts.master')
 @section('pagename','User List')
 @section('header','User List')
 @section('content')

 <div class="card" style="
  overflow: auto;
  white-space: nowrap;" >  
    <div class="card-header" >
       
        <a href="{{route('user.add')}}">
    <button   class="btn btn-primary float-left" ><i class="fas fa-plus" ></i> Add User</button></a>
    </div>

  
        <div class="card-body p-0">
            <table class="table table-striped">
            
                <tr>
                    <th>S.no</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Contact Number</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Profile Photo</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $key=>$user)
                
                    <tr>
                        
                    <td> {{$key+$users->firstItem()}} </td>
                    <td> {{$user->firstname}} </td>
                    <td> {{$user->lastname}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->contact_number}} </td>
                    <td> {{$user->city}} </td>
                    <td> {{$user->gender}} </td>
                    @if($user->age==null)
                    <td> - </td>
                    @else
                    <td> {{$user->age}} </td>
                    @endif
                    <td> <img src="{{asset('dist/images/'.$user->profile_photo)}}" height="75px" width="75px"></td>
                    <td> {{$user->status}} </td>
                    <td> {{$user->created_at}} </td>
                    <td> {{$user->updated_at}} </td>
                    <td class="project-actions text-right">
                    <a href="{{route('user.edit',$user->id)}}" class="btn-info btn btn-sm" ><i class="fas fa-pencil-alt">
            </i>Edit</a>
                    <a href="{{route('user.delete',$user->id)}}" onclick="return confirm('Are you sure to delete this item?')" class="btn-danger btn btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                    </td>
                    </tr>                
                @endforeach

            </table>
         
        </div>
        <div class="card-footer clearfix" style="width: 165.5%;">
            {{$users->links()}}
            
              </div>
    </div>

@endsection
