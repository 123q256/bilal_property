@extends('layouts.admin')
@section('title','Developers')

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
          <h3>Developers</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/developer/create')}}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Apps</li>
            <li class="breadcrumb-item active">Developers list</li>
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
                       <button type="button"  class="btn btn-info" id="all_delete_developer"> Delete</button>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: end;">
                   <a href="{{url('admin/developer/create')}}"  class="btn btn-primary">Add Developer</a>
                  </div>
              </div>
             




            </div>
          <div class="card-body">
            <div class="table-responsive product-table">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th ><input type="checkbox" name="check[]"   style="width: 17px;height:17px;" id="master" class="sub_chk_1"></th>
                    <th>#</th>
                    <th style="">Developer Name  </th>
                    <th>Email</th>
                    <th>Developer Logo</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Locatin</th>
                    <th>Type Property</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $num = 1 ?>
                    @isset($developers)

                  
                        
                    @forelse ($developers as $developer)

                    <tr class="tr-shadow select_{{$developer->id}}">
                        <td><input type="checkbox"  name="check[]" class="sub_chk" data-id="{{$developer->id}}" id="master"></td>
                        <td>{{$num++}}</td>
                        <td class="desc">{{ $developer->developer_name  ?? 'Not found'}}</td>
                        <td class="desc">{{ $developer->email ?? 'Not found' }}</td>
                        <td class="desc" style="border-radius: 50%;">
                            @if(!empty($developer->developer_logo))
                            <img src="{{asset('admin_images/developer_logo/'.$developer->developer_logo)}}" style="width: 75px; border-radius: 50%;" />
                            @else
                            <div>No Image Found</div>
                            @endif

                        </td>
                     
                        <td class="desc">{{ Str::words($developer->description, 5, ' ....')  }}</td>
                        <td class="desc"> 
                        
                              <label class="switch">
                                <input type="checkbox" onchange="update_row('{{ $developer->id }}')"  class="check_get_id" @if ($developer->status == 1) checked  @else '' @endif    name="checkbox_get_value">
                                <span class="slider round"></span>
                            </label>
                           
                         
                        <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('id',$developer->type_of_property)->where('status', '0')->first();?>  
                        <?php 
                        $Locations = App\Models\Location::where('id',$developer->location)->where('status', '0')->first();
                        ?>  



                        </td>
                        <td class="desc">{{ $TypeOfPropertys->property_type ?? 'Not found' }}</td>
                        <td class="desc">{{ $Locations->location ?? 'Not found' }}</td>
                        <td class="desc">{{ $developer->created_at->format('d-m-Y') ?? 'Not found' }}</td>
                        <td>
                          

                        <a style="padding: 6px 15px;font-size: 14px;" href="{{ url('admin/developer/'.$developer->id.'/edit') }}" class="btn btn-success btn-xs" data-original-title="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Edit">
                            Edit
                        </a>
  
                            <button  data-id="{{ $developer->id }}"  class="btn btn-danger btn-xs developer_item_one" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
  


                           
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="8" style="text-align: center;color:red">No Developer Found</td>
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

function update_row(developer_id)
{
    // alert(developer_id);

        var v_token = "{{csrf_token()}}";
        var params = {developer_id:developer_id, _token: v_token};
            $.ajax({
                type: 'get',
                data: params,
                url: "{{ route('developer_checkbox') }}",
                success: function(data) {

                    if(data.status1 == 0){
                        Swal.fire(
                        'Updated Status Active!',
                        'Your Status has been Updated.',
                        'success'
                    )
                        
                    }else if(data.status1 == 1){

                        Swal.fire(
                        'Updated Status Inactive!',
                        'Your Status has been Updated.',
                        'error'
                    )   
                    
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







</script>



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

        $(document).on('click', '.developer_item_one', function(e) {
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
                                    url: "{{ route('developer_delete') }}",
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





    
         //Checkbox  select multiples Products with images  deleted
         $(document).on('click', '#all_delete_developer', function(e) {
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
                                        url: "{{ route('developerDeleteAll') }}",
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
    

  
@endsection