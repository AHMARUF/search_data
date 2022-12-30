@extends('layouts.layout')
@section('content')
@php
$Division =  App\Division::all();
@endphp
<div class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                    	<div class="col-md-12 mt-2 mb-5">
                    		<form method="Get" action="{{url('Search')}}">
                                @csrf
                    		<div class="row">
                    			<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Division">Division</label>
                                        <select class="form-control" name="Division" id="Division">
                                            <option value="">All Division</option>
                                            @foreach($Division as $Divisions)
                                                <option value="{{$Divisions->id}}">{{$Divisions->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
	                    		</div>
	                    		<div class="col-md-3">
	                    			<div class="form-group">
                                        <label for="District">District</label>
                                        <select class="form-control" name="District" id="District">
                                            <option value="">All District</option>
                                        </select>
                                    </div>
	                    		</div>
	                    		<div class="col-md-3">
	                    			<div class="form-group">
                                        <label for="Upazila">Upazila</label>
                                        <select class="form-control" name="Upazila" id="Upazila">
                                            <option value="">All Upazila</option>
                                        </select>
                                    </div>
	                    		</div>
	                    		<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Search">Search</label>
                                        <input type="text"  class="form-control" name="Search" id="Search" />
                                    </div>
	                    		</div>
	                    		<div class="col-md-12 text-center mt-4">
	                    			<button class="btn btn-success">Search</button>
	                    		</div>
                    		</div>
                    		</form>
                    	</div>
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Gmail</th>
                                    <th>Number</th>
                                    <th>Division Name</th>
                                    <th>Distict Name</th>
                                    <th>Upazila Name</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$datas)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$datas->name}}</td>
                                <td>{{$datas->father_name}}</td>
                                <td>{{$datas->mother_name}}</td>
                                <td>{{$datas->gmail}}</td>
                                <td>{{$datas->number}}</td>
                                <td>{{$datas->Division->name}}</td>
                                <td>{{$datas->District->name}}</td>
                                <td>{{$datas->Upazila->name}}</td>
                                <td>{{$datas->address}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
   </div> 
   <div class="row">
      <div class="col-md-12">
          {{ $data->links() }}
      </div> 
   </div>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
$('#Division').on('change',function(e) {
var division_id = this.value;
$.ajax({
    type: "POST",
    data:{
          division_id : division_id,
          _token: '{{ csrf_token() }}'
        },
                url: "{{ route('district') }}",
                success:function(response){
                      var data =""
                      data = data + "<option value="+""+">"+"--------Select One-------"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.name+"</option>"
                     
                       
                    })
                    $('#District').html(data);
                    
                }
                
            })
});
});

$(document).ready(function () {
$('#District').on('change',function(e) {
var district_id = this.value;
$.ajax({
    type: "POST",
    data:{
          district_id : district_id,
          _token: '{{ csrf_token() }}'
        },
                url: "{{ route('upazila') }}",
                success:function(response){
                      var data =""
                      data = data + "<option value="+""+">"+"--------Select One-------"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.name+"</option>"
                     
                       
                    })
                    $('#Upazila').html(data);
                    
                }
                
            })
});
});
</script>
@endsection