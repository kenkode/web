@extends('layouts.hotel')

@section('content')
<style type="text/css">
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 500px; /* New width for default modal */
        }
        .modal-sm {
          width: 250px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 450px; /* New width for large modal */
        }
    }  
       
    #imagePreview {
      width: 180px;
      height: 180px;
      background-position: center center;
      background-size: cover;
      background-image:url("{{url('/public/uploads/logo/default_photo.png')}}");
      -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
      display: inline-block;
    }  

    .modal-body {
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }  

    .modal { overflow: auto !important; } 
</style>

<div class="wrapper wrapper-content  animated fadeInRight">
  <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        {{strtoupper($organization->name)}}
                        HOTEL ROOMS
                    </h5>                                    
                </div>
                <div class="ibox-content">                     
                <!-- Begin Content Here--> 
                <div class="row">
                    <div class="panel blank-panel">
                        <div class="panel-heading">                            
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Rooms</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-desktop"></i>Rates</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-signal"></i>Foods</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-bar-chart-o"></i>Reservations</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-bar-chart-o"></i>History Log</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active table-responsive "> 
                                    <div style="margin-bottom:20px;margin-left:10px;">
                                        <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">
                                            New Hotel Room
                                        </a>  
                                        &emsp;
                                        <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Hotel Rooms Report
                                        </a>        
                                    </div>                                
<form id="form" action="" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">                         
                    <div class="modal-body">
                        <div id="loading" style="display:none;">
                             <div style="margin-top:5%;">
                             <p id="sucessmessage"> 
                                 Saving Data...
                             </p>
                             <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                             </div>
                         </div>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
                        </span><span class="sr-only">Close</span>
                    </button>
                    <h3 id="title" class="m-t-none m-b">Create Hotel Room</h3>
                         <input type="hidden" id="room_id" placeholder="Enter Room Name" 
                         class="form-control" required data-error="Please insert hotel room name">     
                            <div class="form-group">
                            <label>Branch</label> 
                                 <select class="form-control" name="branch" required 
                                 data-error="Please select hotel branch" id="branch" placehoder="Please select hotel branch">
                                        <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">
                                            {{$branch->name}}
                                        </option>
                                    @endforeach
                                 </select>                                
                                 <p id="errors22" style="color:red"></p>
                             </div>                                            
                             <div class="form-group">
                             <label>Room Number</label> 
                                 <input type="text" id="room_number" placeholder="Enter Room Number" name="room_number" class="form-control" required 
                                 data-error="Please insert hotel room number">
                                 <p id="errors1" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Room Type</label> 
                                 <select class="form-control" name="room_type" required 
                                 data-error="Please select room type" id="room_type">
                                     <option value="">Select Room Type</option>
                                     <option value="Single">Single</option>
                                     <option value="Double">Double</option>
                                     <option value="Executive">Executive</option>
                                     <option value="Conference">Conference</option>
                                     <option></option>
                                 </select>                                
                                 <p id="errors2" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Adults</label> 
                                 <input type="text" id="adult_number" placeholder="Enter Maximum Adult Number" name="adult_number" 
                                 class="form-control" required 
                                 data-error="Please insert room maximum adult number">
                                 <p id="errors3" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Children</label> 
                                 <input type="text" id="children_number" placeholder="Enter Maximum Children Number" name="children_number" 
                                 class="form-control" required 
                                 data-error="Please insert room maximum Children number">
                                 <p id="errors4" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Available Rooms</label> 
                                 <input type="text" id="room_count" placeholder="Enter Maximum Rooms Available" name="room_count" 
                                 class="form-control" required 
                                 data-error="Please insert rooms available!">
                                 <p id="errors36" style="color:red"></p>
                             </div>    
                             <div class="form-group"><label>Price</label> 
                                             <input type="text" id="price" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#price').priceFormat();
                                             });
                                             </script>
                                             </div>                         
                             <div class="form-group">
                             <label>Room Image</label> 
                                 <input id="image" type="file" name="image">
                                 <br>
                                 <div id="imagePreview"></div>
                                 <p id="errors5" style="color:red"></p>
                             </div>                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" id="submit" class="btn btn-primary sub-form">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>                
</form>

 <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/rooms')}}" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             {{ csrf_field() }}
                                             <div class="form-group"><label>Report Type <span style="color:red">*</span></label> 
                                            <select required="" id="type" name="type" class="form-control">
                                             <option value="">Select Report Type</option>
                                             <option value="pdf"> PDF</option>
                                             <option value="excel"> Excel</option>
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <input type="submit" class="btn btn-primary sub-form" value="Select" />
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Rooms</h3>
                                        <table class="table table-bordered table-hover">

                                            <tr>
                                               <td><strong>Image : </strong></td><td class="tdimage"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Branch : </strong></td><td class="tdbranch"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Room Number : </strong></td><td class="tdroomno"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Room Type : </strong></td><td class="tdtype"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Children Number : </strong></td><td class="tdchildren"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Adult Number : </strong></td><td class="tdadult"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Room Count : </strong></td><td class="tdcount"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Price : </strong></td><td class="tdprice"></td>
                                            </tr>

                                        </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>


                                         <table class="table table-condensed table-hover dataTables-example" id="users">
                                         <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Room #</th>
                                                <th>Type</th>
                                                <th>Room Count</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="displayrecord">
                                              <?php $i=1;?>
                                               @foreach($rooms as $room) 
                                                <tr class="{{'del'.$room->id}}">
                                                  <td>
                                                    {{$i}}
                                                  </td>                 
                                                  
                                                  <td>
                                                  <img src="{{url('/public/uploads/hotel/rooms/'.$room->image)}}" width="100" height="100" alt="No Room Sample Image" />
                                                            
                                                  </td>
                                                  <td>
                                                    {{$room->roomno}}
                                                  </td>
                                                  <td>{{$room->type}}</td>
                                                  <td>{{$room->room_count}}</td>
                                                  <td>{{number_format($room->price,2)}}</td>
                                                  <td>
                                                      <div class="btn-group">
                                                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                          </button>          
                                                          <ul class="dropdown-menu" role="menu">
                                                          <li>
                                                                <a class="view" data-toggle="modal" data-name="{{$room->roomno}}" data-id="{{$room->id}}" data-roomtype="{{$room->type}}" data-adultno="{{$room->adults}}" data-childrenno="{{$room->children}}" data-image="{{$room->image}}" data-branch="{{App\Room::getBranch($room->branch_id)}}" data-count="{{$room->room_count}}" data-price="{{number_format($room->price,2)}}" href="#modal-view">
                                                                    View
                                                                </a>
                                                            </li> 
                                                            <li>
                                                                <a class="edit" data-toggle="modal" data-name="{{$room->roomno}}" data-id="{{$room->id}}" data-roomtype="{{$room->type}}" data-adultno="{{$room->adults}}" data-childrenno="{{$room->children}}" data-image="{{$room->image}}" data-branch="{{$room->branch_id}}" data-count="{{$room->room_count}}" data-price="{{number_format($room->price,2)}}" href="#modal-form">
                                                                    Update
                                                                </a>
                                                            </li>                   
                                                            <li>
                                                                <a id="{{$room->id}}" class="delete">
                                                                    <form id="delform">
                                                                    {{ csrf_field() }}
                                                                        Delete
                                                                    </form>
                                                                </a>
                                                            </li>                    
                                                          </ul>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $i++; ?>
                                              @endforeach
                                            </tbody>
                                    </table>                  
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    
                                </div>
                                <div id="tab-4" class="tab-pane">
                                                                        
                                </div>
                                <div id="tab-5" class="tab-pane">
                                                                        
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--End Content Here-->                
               </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
<script type="text/javascript">
$(document).ready(function() {
    $("#image").on("change", function(){
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<script type="text/javascript">
  var submit_url;
  var room_id;
  $(document).ready(function() {    
     $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Hotel Room');
     $('#submit').html('Save Changes');
     $('#sucessmessage').html('Saving Data...');
     $("#update").attr("id", "submit");
     $('#errors').html("");

    function displaydata(){
       $.ajax({
          url     : "{{URL::to('hotelrooms/showrecord')}}",
          type    : "GET",
          async   : false,       
          success : function(s){
            $('.displayrecord').html(s)
          }        
        });
    }
      
     $('#add').on("click", function() {
         $("#update").attr("id", "submit");
         $('#submit').removeAttr('disabled');
         $('#title').html('Create Hotel Room');
         $('#submit').html('Save Changes');
         $('#sucessmessage').html('Saving Data...');     
         $('#room_number').val('');
         $('#branch').val('');
         $('#adult_number').val('');
         $('#children_number').val('');
         $('#room_type').val('');
         $('#room_count').val('');
         $('#errors1').html("");
         $('#errors3').html("");
         $('#errors2').html("");
         $('#errors22').html("");  
         $('#errors4').html("");
         $('#errors5').html("");
         $('#errors36').html("");
         $("#form").attr("action", "hotelrooms/store");
   });

    $("#users").on("click",".edit", function(){
         var id = $(this).data('id');
         var name = $(this).data('name');   
         var branch = $(this).data('branch');
         var adultno = $(this).data('adultno');  
         var childrenno = $(this).data('childrenno');  
         var roomtype = $(this).data('roomtype');
         var room_count = $(this).data('count');
         var price = $(this).data('price');
         var l = window.location;
         var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
         var image = base_url+'/public/uploads/hotel/rooms/'+$(this).data('image'); 
         $('#update').removeAttr('disabled');
         $(".modal-body #room_number").val( name );
         $(".modal-body #room_id").val( id );
         $(".modal-body #branch").val(branch);
         $(".modal-body #adult_number").val(adultno);
         $(".modal-body #children_number").val(childrenno);
         $(".modal-body #room_type").val(roomtype);
         $(".modal-body #room_count").val(room_count);
         $(".modal-body #price").val(price);
         $(".modal-body #imagePreview").css('background-image', 'url('+image+')');
         $('#title').html('Update Hotel Room');
         $('#submit').html('Update changes');
         $('#sucessmessage').html('Updating Data...');
         $('#errors1').html("");
         $('#errors3').html("");
         $('#errors2').html("");
         $('#errors22').html("");  
         $('#errors4').html("");
         $('#errors5').html("");
         $('#errors36').html("");
         //$("#submit").attr("id", "update");
         $('.sub-form').remove();
         var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
         $("#modal-form .modal-footer").append(r);
         $("#form").attr("action", "hotelrooms/update");
   });

   $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');   
     var branch = $(this).data('branch');
     var adultno = $(this).data('adultno');  
     var childrenno = $(this).data('childrenno');  
     var roomtype = $(this).data('roomtype');
     var room_count = $(this).data('count');
     var price = $(this).data('price');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var image = base_url+'/public/uploads/hotel/rooms/'+$(this).data('image'); 
     $('#update').removeAttr('disabled');
     $(".modal-body .tdcount").html( childrenno + adultno );
     $(".modal-body .tdadult").html( adultno );
     $(".modal-body .tdchildren").html( childrenno );
     $(".modal-body .tdroomno").html( name );
     $(".modal-body .tdbranch").html( branch );
     $(".modal-body .tdtype").html( roomtype );
     $(".modal-body .tdcount").html( room_count );
     $(".modal-body .tdprice").html( price );
     $(".modal-body .tdimage").html('<img src="'+image+'" width="100" height="100" alt="no logo" />');
    });

  
      $('body').on("click","#submit",function() {
     if($('#room_number').val() == ""){
        $('#errors1').html("Please insert name!");
        return false;
     }
     if($('#adult_number').val() == ""){
        $('#errors3').html("Please insert adult number!");
        return false;
     }
     if($('#room_type').val() == ""){
        $('#errors2').html("Please select room type!");
        return false;
     }
    if($('#branch').val() == ""){
        $('#errors22').html("Please select hotel branch!");
        return false;
     }
     if($('#children_number').val() == ""){
        $('#errors4').html("Please insert children number!");
        return false;
     }

     if($('#room_count').val() == ""){
        $('#errors36').html("Please insert rooms available!");
        return false;
     }

     
     if($('#image').val() == ""){
        $('#errors5').html("Please select an image!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var room_number = $('#room_number').val();
        var image = $("#form input[name=image]").val();
        var room_type = $('#room_type').val();
        var adult_number = $('#adult_number').val();
        var children_number = $('#children_number').val();
        var id = $('#room_id').val();
        var branch=$('#branch').val();
        var room_count = $('#room_count').val();
        var price = $('#price').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        
        data.append("room_number",room_number);
        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("room_type",room_type);
        data.append("adult_number",adult_number);
        data.append("id",id);
        data.append("branch",branch);
        data.append("room_count",room_count);
        data.append("price",price);
        data.append("children_number",children_number);
        data.append("_token",token);                
        $.ajax({
              type: "POST",
              url: urL,
              data: data,
              processData: false,
              contentType: false,
              beforeSend: function() { $('#loading').show(); },
              success: function(response) {                      
                  if(response != 1){
                    $('#errors').html(response);
                  }else if(response == 1){
                      $('#submit').removeAttr('disabled');
                      $('#name').val('');
                      displaydata();                  
                      $.notify({
                            // options
                            icon: 'glyphicon glyphicon-ok',
                            title: 'Hotel Room',
                            message: ' successfully created....',
                            url: '',
                            target: '_blank'
                        },{
                                // settings
                            element: 'body',
                            position: null,
                            allow_duplicates:false,
                            type: "info",
                            allow_dismiss: true,
                            newest_on_top: false,
                            showProgressbar: false,
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            offset: 20,
                            spacing: 10,
                            z_index: 1031,
                            delay: 3000,
                            timer: 1000,
                            url_target: '_blank',
                            mouse_over: null,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            },
                            onShow: null,
                            onShown: null,
                            onClose: null,
                            onClosed: null,
                            icon_type: 'class',
                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                '<span data-notify="icon"></span> ' +
                                '<span data-notify="title">{1}</span> ' +
                                '<span data-notify="message">{2}</span>' +
                                '<div class="progress" data-notify="progressbar">' +
                                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                '</div>' +
                                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>' 
                });
                $('#modal-form').fadeOut();
                $('body').removeClass('modal-open');
                $('#loading').hide();
                }
            },
            error: function(xhr,thrownError) {
               console.log(xhr.statusText);
               console.log(xhr.responseText);
               console.log(xhr.thrownError);
               setTimeout(function(){ 
                       alert("An error occured....Please reload page and try again!!!"); 
                       $('#loading').hide();
                       location.reload();
                       }, 10000);
                //return false;
            } 
        });
     }
   });
   
     $('body').on("click","#update",function() {    
     if($('#room_number').val() == ""){
        $('#errors1').html("Please insert room number!");
        return false;
     }
     if($('#adult_number').val() == ""){
        $('#errors3').html("Please insert adult number!");
        return false;
     }
     if($('#room_type').val() == ""){
        $('#errors2').html("Please select room type!");
        return false;
     }
    if($('#branch').val() == ""){
        $('#errors22').html("Please select hotel branch!");
        return false;
     }
     if($('#children_number').val() == ""){
        $('#errors4').html("Please insert children number!");
        return false;
     }
     if($('#room_count').val() == ""){
        $('#errors36').html("Please insert rooms available!");
        return false;
     }
     else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var room_number = $('#room_number').val();
        var image = $("#form input[name=image]").val();
        var room_type = $('#room_type').val();
        var adult_number = $('#adult_number').val();
        var children_number = $('#children_number').val();
        var id = $('#room_id').val();
        var branch=$('#branch').val();
        var room_count = $('#room_count').val();
        var price = $('#price').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        
        data.append("room_number",room_number);
        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("room_type",room_type);
        data.append("adult_number",adult_number);
        data.append("id",id);
        data.append("room_count",room_count);
        data.append("price",price);
        data.append("branch",branch);
        data.append("children_number",children_number);
        data.append("_token",token);
        $.ajax({
          type: "POST",
          url: urL,
          data: data,
          processData: false,
          contentType: false,
          beforeSend: function() { $('#loading').show(); },
          success: function(response) {
          //alert(response);return;          
          if(response != 1){
            $('#errors').html(response);
          }else if(response == 1){
             $('#update').removeAttr('disabled');             
             displaydata();        
             $.notify({
                        // options
                        icon: 'glyphicon glyphicon-ok',
                        title: 'Hotel Room Name',
                        message: ' successfully updated....',
                        url: '',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        allow_duplicates:false,
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 2000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>' 
                    });
                    $('#modal-form').fadeOut();
                    $('body').removeClass('modal-open');
                    $('#loading').hide();
                      }
                     },
                     error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                       setTimeout(function(){ 
                       alert("An error occured....Please reload page and try again!!!"); 
                       $('#loading').hide();
                       location.reload();
                       }, 10000);
                     }
                     });
                 }
               });

               $('#room_number').keyup(function(){
                if($('#room_number').val() == ""){
                    $('#errors1').html("Please insert room number!");
                    return false;
                 }else{
                  $('#errors1').html("");
                 }
               });

               $('#adult_number').keyup(function(){
                if($('#adult_number').val() == ""){
                  $('#errors3').html("Please insert adult number!");
                  return false;
                }else{
                  $('#errors3').html("");
                 }
               });

               $('#room_type').keyup(function(){
                if($('#room_type').val() == ""){
                  $('#errors2').html("Please select room type!");
                  return false;
                }else{
                  $('#errors2').html("");
                 }
               });  

               $('#branch').on('change', function() {
                if($('#branch').val() == ""){
                  $('#errors22').html("Please select hotel branch!");
                  return false;
                }else{
                  $('#errors22').html("");
                 }
               });  

               $('#children_number').keyup(function(){
                if($('#children_number').val() == ""){
                  $('#errors4').html("Please insert children number!");
                  return false;
                }else{
                  $('#errors4').html("");
                 }
               });

               $('#room_count').keyup(function(){
                if($('#room_count').val() == ""){
                  $('#errors36').html("Please insert rooms available!");
                  return false;
                }else{
                  $('#errors36').html("");
                 }
               });

               $('#image').on('change', function() {
                if($('#image').val() == ""){
                  $('#errors5').html("Please select an image!");
                  return false;
                }else{
                  $('#errors5').html("");
                 }
               });            
  });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   $("#users").on("click",".delete", function(){    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();                
                if(confirm("Are you sure you want to delete this hotel room?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('hotelrooms/delete')}}",
                        data: {id:id,_token:token},
                        success: function(){                           
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
                                // options
                                icon: 'glyphicon glyphicon-ok',
                                title: 'Hotel Room',
                                message: ' successfully deleted....',
                                url: '',
                                target: '_blank'
                            },{
                                // settings
                                element: 'body',
                                position: null,
                                type: "danger",
                                allow_dismiss: true,
                                newest_on_top: false,
                                showProgressbar: false,
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                offset: 20,
                                spacing: 10,
                                z_index: 1031,
                                delay: 2000,
                                timer: 1000,
                                url_target: '_blank',
                                mouse_over: null,
                                animate: {
                                    enter: 'animated fadeInDown',
                                    exit: 'animated fadeOutUp'
                                },
                                onShow: null,
                                onShown: null,
                                onClose: null,
                                onClosed: null,
                                icon_type: 'class',
                                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                    '<span data-notify="icon"></span> ' +
                                    '<span data-notify="title">{1}</span> ' +
                                    '<span data-notify="message">{2}</span>' +
                                    '<div class="progress" data-notify="progressbar">' +
                                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                    '</div>' +
                                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                '</div>' 
                            });
                        },
                       error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                        //return false;
                     } 
                    });
                }else{                    
                }
            });       
    });
</script>
@endsection
