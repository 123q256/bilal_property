@extends('layouts.admin')
@section('title','Add Budget')

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
 

  .customizer-links{
        display: none;
    }

    </style>

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>Add Budget</h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Budget Create</li>
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

          <form action="{{url('admin/addbudget/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form theme-form">
            <div class="row">

            <?php $currencys = App\Models\Addcurrency::where('status', '0')->get();?>  
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong> Currency</strong></label>
                            <select name="currency_ids" class="form-select @error('currency_ids') is-invalid @enderror" >
                              <option value="" ><strong>Select Currency</strong></option>
                              @forelse ($currencys as $currency)
                              <option value="{{ $currency->id }}" {{ old('currency_ids') == $currency->id ? 'selected' : '' }} >{{ $currency->currency }}</option>
                              @empty
                              <option value="option2">No Found Currency</option>
                              @endforelse
                            </select>
                            @error('currency_ids')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>


              <div class="col">
                <div class="mb-3">
                  <label><strong> Add Budget Range</strong></label>
                  <input class="form-control @error('budget') is-invalid @enderror" name="budget" value="{{ old('budget') }}"  type="text" placeholder="Add Budget *" >
                  @error('budget')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <div class="col-md-12 mt-2">
                    <div class="field">
                      <label for="label"><strong>Status</strong></label>
                      Checked:Hidden ,Unchecked:Visible
                  </div>
                  <!-- Default switch -->
                        <label class="switch">
                          <input type="checkbox"   class="check_get_id"  {{ old('status') ? 'checked' : '' }}   name="status">
                          <span class="slider round"></span>
                        </label>
                    </div>
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <button type="submit" class="btn btn-success me-3">Add Budget</button>
                
                  <a class="btn btn-danger" href="{{url('admin/addbudget')}}">Cancel</a>
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