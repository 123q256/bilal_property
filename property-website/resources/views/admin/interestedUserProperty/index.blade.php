@extends('layouts.admin')
@section('title','All Property Interested Users')

@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        color: #555;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .pagination li.active a {
        color: #fff;
        background-color: #007bff;
    }

    .pagination li.disabled a {
        color: #999;
        pointer-events: none;
        cursor: default;
    }
  
  
</style>


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


    

    <div class="container-fluid">
      <div class="page-title">

        
        <div class="row">
          <div class="col-6">
            <h3>Chat Bot Users</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Interested Property Users</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-12">

                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif 
                
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="table-data__tool  checkbox_hidden_btn" style="display: none"> 
                         <button type="button"  class="btn btn-info" id="all_delete_userschat"> Delete</button>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: end;">
                     <a href="{{url('admin/users/create')}}"  class="btn btn-primary">Add User</a>
                    </div> --}}
                </div>
               




              </div>
            <div class="card-body">
              <div class="table-responsive product-table">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th ><input type="checkbox" name="check[]"   style="width: 17px;height:17px;" id="master" class="sub_chk_1"></th>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone No</th>
                      <th>Language</th>
                      <th>Message</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>



                      
                    @isset($Interestpropertys)
                        
                    @forelse ($Interestpropertys as $Interestproperty)

                    <tr class="tr-shadow select_{{$Interestproperty->id}}">
                        <td><input type="checkbox"  name="check[]" class="sub_chk" data-id="{{$Interestproperty->id}}" id="master"></td>
                        <td>{{ $Interestproperty->id }}</td>
                        <td>{{ $Interestproperty->interest_name }}</td>
                        <td>{{ $Interestproperty->interest_email }}</td>
                        <td>{{ $Interestproperty->phone }}</td>
                        <td>{{ $Interestproperty->language }}</td>
                        <td>{{ $Interestproperty->interest_message }}</td>
                    
                        <td>
                            <div class="table-data-feature">
                             
                                <a  data-id="{{ $Interestproperty->id }}"  style="right:45%;cursor: pointer;" class="item developer_item_one userschat_item_one" data-toggle="tooltip" data-placement="top" title="Delete">
                                   <i class="zmdi zmdi-delete" style="font-size: 25px;"></i>
                                  
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="16" style="text-align: center;color:red">No ChatBox Users Found</td>
                        </tr>
                    @endisset


                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
      </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection






@section('custom_js')



<script>
    $(document).ready(function() {
            //on page load uncheck any ticked checkboxes
            $(".sub_chk").prop('checked', false);
            $(".sub_chk_1").prop('checked', false);

            // $("input:checkbox:checked").prop('checked', false);
        });
    

        $(document).ready(function() {
            
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                    $('.checkbox_hidden_btn').show('slow');
                  
                } else {
                    $(".sub_chk").prop('checked', false);
                    $('.checkbox_hidden_btn').hide('slow');
                   
                }
            });
            $('.sub_chk').on('click', function(e) {
                
                if($('.sub_chk:checked').length > 0){
                    $('.checkbox_hidden_btn').show('slow');
                }else{
                    $('.checkbox_hidden_btn').hide('slow');
                }
    
            });
            
        });
    </script>

 
    <script>


        $(document).on('click', '.userschat_item_one', function(e) {
                    e.preventDefault();
        var dataId = $(this).attr("data-id");
        // alert(dataId);
        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to Delete this order!",
                            imageUrl: '{{asset("popup_images/Untitled.jpeg")}}',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                var v_token = "{{csrf_token()}}";
                                   var params = {dataId:dataId, _token: v_token};

                                $.ajax({
                                    type: 'DELETE',
                                    data: params,
                                    url: "{{ route('interestusers_delete') }}",
                                    success: function(data) {

                                        if(data.status == 200){
                                            Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                            
                                        $('.select_'+dataId).hide('slow');
                                        $('.checkbox_hidden_btn').hide('slow');
                                     
                                        }else{
                                            Swal.fire(
                                            'Something Error!',
                                            'Your file has Not been deleted.',
                                            'danger'
                                        )
                                        }
                                    },
                                    // error: function(data) {
                                    //     alert(data.responseText);
                                    // }
                                });

                            }
});
});

    
        </script>
    

  {{-- Single delete item --}}


{{-- Checkbox  select multiples item  deleted --}}


  <script>
    
       
         $(document).on('click', '#all_delete_userschat', function(e) {
                        e.preventDefault();
                        var allVals = [];
                        $(".sub_chk:checked").each(function() {
                            allVals.push($(this).attr('data-id'));
                            var v_token = "{{csrf_token()}}";
    
                        });
                        if (allVals.length <= 0) {
    
                            Swal.fire(
                                'Alert?',
                                'Please Select the Checkbox?',
                                '???????'
                            )
                        } else {
                            // var check = confirm("Are you sure you want to delete this row?");
                            Swal.fire({
                                title: 'Are you sure?',
                                text: " You want to Delete these orders!",
                                imageUrl: '{{asset("popup_images/Untitled.jpeg")}}',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var join_selected_values = allVals.join(",");
                                    // alert(join_selected_values);
                                   
                                    var v_token = "{{csrf_token()}}";
                                       var params = {join_selected_values:join_selected_values, _token: v_token};
    
                                    $.ajax({
                                        type: 'DELETE',
                                        data: params,
                                        url: "{{ route('interestusersDeleteAll') }}",
                                        success: function(data) {
    
                                            if(data.status == 200){
                                                Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                            )
                                                
                                            // $('.load_datatable').dataTable().api().ajax.reload();
                                            var getvalues =join_selected_values.split(",");
                                                $.each(getvalues , function(index, val) { 
                                                    $('.select_'+val).hide('slow');
                                                });
    
                                                $(".sub_chk_1").prop('checked', false);
                                                $('.checkbox_hidden_btn').hide('slow');
                                        
                                            }else{
                                                Swal.fire(
                                                'Something Error!',
                                                'Your file has Not been deleted.',
                                                'danger'
                                            )
                                            }
                                        },
                                        // error: function(data) {
                                        //     alert(data.responseText);
                                        // }
                                    });
                                    $.each(allVals, function(index, value) {
                                        $('table tr').filter("[data-row-id='" + value + "']")
                                            .remove();
                                    });
                                    //}
                                }
                            })
                        }
                    });
    
                    $('[data-toggle=confirmation]').confirmation({
                        rootSelector: '[data-toggle=confirmation]',
                        onConfirm: function(event, element) {
                            element.trigger('confirm');
                        }
                    });
    
    
                    //Checkbox  select multiples Products iwith images  deleted
        </script>

{{-- Checkbox  select multiples item  deleted --}}
  
@endsection