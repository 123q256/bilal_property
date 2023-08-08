@extends('layouts.admin')
@section('title','Listing Property ')

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




    table tr th{
    font-weight: bold!important;
    color: black!important;
}

table tr td{
    font-weight: normal!important;
color: black!important;
}




  </style>



<div class="container-fluid">
    <div class="page-title">

      
      <div class="row">
        <div class="col-6">
          <h3>Listing Property</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Apps</li>
            <li class="breadcrumb-item active">Listing Property list</li>
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
                       <button type="button"  class="btn btn-info" id="all_delete_listing_property"> Delete</button>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: end;">
                   <a href="{{url('admin/listing_property/create')}}"  class="btn btn-primary">Add Listing Property</a>
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
                    <th>Name/title </th>
                    <th>Type of Property </th>
                    <th>No of Bed </th>
                    <th>Handover </th>
                    <th>Payment Plans </th>
                    <th>First Payment Plans </th>
                    <th>Second Payment Plans </th>
                    <th>Location </th>
                    <th>Highlights </th>
                    <th>Project Details  </th>
                    <th>Incentives </th>
                    <th>Developer </th>
                    <th>Currency </th>
                    <th>Budget/Price </th>
                    <th>Sqare foot </th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $num = 1 ?>
                    @isset($listing_properties)
                        
                    @forelse ($listing_properties as $listing_properte)


        <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('id',$listing_properte->type_of_property )->where('status', '0')->first();?>  
        <?php $Bedrooms = App\Models\Bedroom::where('id',$listing_properte->number_of_bedrooms  )->where('status', '0')->first();?>  
        <?php $handovers = App\Models\CompletionDate::where('id',$listing_properte->handover  )->where('status', '0')->first();?>  
        <?php $PaymentPlans = App\Models\PaymentPlan::where('id',$listing_properte->payment_plane  )->where('status', '0')->first();?>  
        <?php $Locations = App\Models\Location::where('id',$listing_properte->location )->where('status', '0')->first();?>  

        <?php $Developers = App\Models\Developer::where('id',$listing_properte->about_the_developer )->where('status', '0')->first();?>  
        <?php $addcurrencys = App\Models\Addcurrency::where('id',$listing_properte->currencys )->where('status', '0')->first();?>  
 
       

                    <tr class="tr-shadow select_{{$listing_properte->id}}">
                        <td><input type="checkbox"  name="check[]" class="sub_chk" data-id="{{$listing_properte->id}}" id="master"></td>
                        <td>{{$num++}}</td>
                        <td>{{$listing_properte->title_name}}</td>
                        <td class="desc">{{ $TypeOfPropertys->property_type ?? 'Not found'  }}</td>
                        <td class="desc">{{ $Bedrooms->number_of_bed ?? 'Not found'  }}</td>
                        <td class="desc">{{ $handovers->completions ?? 'Not found'  }}</td>
                        <td class="desc">{{ $PaymentPlans->payment_plane_years ?? 'Not found'  }}</td>
                        <td class="desc">{{ $listing_properte->first_payment ?? 'Not found'  }}</td>
                        <td class="desc">{{ $listing_properte->second_payment ?? 'Not found'  }}</td>
                        <td class="desc">{{ $Locations->location ?? 'Not found'  }}</td>
                        <td class="desc">{{ \Illuminate\Support\Str::limit($listing_properte->highlights, 20, '...') ?? 'Not found' }}</td>
                        <td class="desc">{{ \Illuminate\Support\Str::limit($listing_properte->Project_details, 20, '...') ?? 'Not found' }}</td>
                        <td class="desc">{{ \Illuminate\Support\Str::limit($listing_properte->other_incentives, 20, '...') ?? 'Not found' }}</td>
                        <td class="desc">{{ $Developers->developer_name ?? 'Not found'  }}</td>
                        <td>{{$addcurrencys->currency}}</td>
                        <td>{{$listing_properte->budgets}}</td>
                        <td>{{$listing_properte->desired_size}}</td>
                    
                        <td class="desc"> 
                        
                        <label class="switch">
                        <input type="checkbox" onchange="switch_listing_property_checkbox('{{ $listing_properte->id }}')"  class="check_get_id" @if ($listing_properte->status == 1) checked  @else '' @endif    name="checkbox_get_value">
                        <span class="slider round"></span>
                    </label>
                           
                         
                        </td>
                        <td class="desc">{{ $listing_properte->created_at->format('d-m-Y') ?? 'Not found'  }}</td>
                        <td>
                         <a style="padding: 6px 15px;font-size: 14px;" href="{{ url('admin/listing_property/'.$listing_properte->id.'/edit') }}" class="btn btn-success btn-xs" data-original-title="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Edit">Edit </a>
                         <button  data-id="{{ $listing_properte->id }}"  class="btn btn-danger btn-xs listing_property_item_one" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr >
                            <td colspan="8" style="text-align: center;color:red">No Listing Property  Found</td>
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






  {{-- active and inactive --}}

    

  {{-- active and inactive --}}








  {{-- Single delete item --}}
    <script>



 function switch_listing_property_checkbox(types_id){


    var v_token = "{{csrf_token()}}";
        var property = {types_id:types_id, _token: v_token};
 
    $.ajax({
                type: 'get',
                data: property,
                url: "{{ route('switch_listing_checkbox') }}",
                success: function(data) {

                    if(data.status2 == 0){
                        Swal.fire(
                        'Updated Status Active!',
                        'Your Status has been Updated.',
                        'success'
                    )
                        
                    }else if(data.status2 == 1){

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


        $(document).on('click', '.listing_property_item_one', function(e) {
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
                                    url: "{{ route('listing_property_delete') }}",
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
    
       
         $(document).on('click', '#all_delete_listing_property', function(e) {
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
                                        url: "{{ route('listing_propertyDeleteAll') }}",
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