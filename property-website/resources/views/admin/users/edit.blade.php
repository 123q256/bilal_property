@extends('layouts.admin')
@section('title','Update User')

@section('content')


<style>
  .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
  }

  .switch input {
      opacity: 0;
      width: 0;
      height: 0;
  }

  .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
  }

  .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
  }

  input:checked+.slider {
      background-color: #2196F3;
  }

  input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
      border-radius: 34px;
  }

  .slider.round:before {
      border-radius: 50%;
  }


  .customizer-links{
      display: none;
  }


</style>
    

<style>
 

  .customizer-links{
        display: none;
    }

    </style>

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>
            update user</h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">User update</li>
            </ol>
          </div>
    </div>
  </div>
</div>
 <!-- Container-fluid starts-->
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
                  @if(session('success'))
                  <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if($errors->any())

                 <div class="alert alert-success">
                    @foreach($errors->all() as $error)
                  <div>{{$error}}</div>
                   @endforeach
                  </div>
                 @endif 
      <div class="card">
        <div class="card-body">

          <form action="{{url('admin/users/'.$userse->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="form theme-form">
            <div class="row">

              <div class="col-md-6">
                <div class="mb-3">
                  <label><strong> Name</strong></label>
                  <input class="form-control" value="{{ $userse->name }}"  name="name" type="text" placeholder="Name *">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label> <strong>Email</strong></label>
                
                  <input type="email"  placeholder="Email *"  id="email" value="{{ $userse->email }}"   class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label> <strong>Password</strong></label>
                  <input name="password" id="password" type="password" value="{{ $userse->show_password }}" placeholder="Password *" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  <span style="position: absolute; top: 40px;right: 7px;font-size: 25px;" toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <span class="icon is-small is-left"></span>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
            </div>
             

              <div class="col-md-6">
                <div class="mb-3">
                  <label> <strong>Confirm Password</strong></label>
             
                  <input  id="password-confirm" class="form-control" type="password" value="{{ $userse->show_password }}"  name="password_confirmation" placeholder="Confirm Password *" required autocomplete="new-password">
                  <span style="position: absolute; top: 40px;right: 7px;font-size: 25px;" toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <span class="icon is-small is-left"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label><strong>Select Role</strong></label>
                  <select name="user_role" class="form-select" required>
                  <option default disabled selected >Select Role</option>
                 <option @if($userse->user_role === '0' ) selected  @endif  value="0">User</option>
                 <option @if($userse->user_role === '1' ) selected  @endif  value="1">Admin</option>

                  </select>
                </div>
              </div>

              <div class="col-md-6 mt-2">
                <div class="field">
                  <label for="label"><strong>Status</strong></label>
                  Checked:Hidden ,Unchecked:Visible
              </div>
              <!-- Default switch -->
              <label class="switch">
                <input type="checkbox"  class="check_get_id" @if ($userse->status == 1) checked  @else '' @endif    name="checkbox_get_value">
                <span class="slider round"></span>
            </label>
                </div>

            </div>
           
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <button type="submit" class="btn btn-success me-3">Add user</button>
                
                  <a class="btn btn-danger" href="{{url('admin/users')}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->






@endsection


@section('custom_js')
<script>

    $(".toggle-password").click(function() {
    
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
    });
    
        </script>


@endsection