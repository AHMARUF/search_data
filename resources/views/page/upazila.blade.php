@extends('layouts.layout')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-4">
        <form method="POST" action="{{url('/upazila/store')}}">
            @csrf
           <div class="card">
               <div class="card-header">
                   Division
               </div>
               <div class="card-body">
                    <div class="form-group">
                        <label for="division">Division Name</label>
                        <select class="form-control @error('division') is-invalid @enderror" id="division" name="division_id">
                        	<option>Selecte One....</option>
                        	@foreach($devision as $row)
                        	<option value="{{$row->id}}">{{$row->name}}</option>
                        	@endforeach
                        </select>
                         @error('division_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="division">Division Name</label>
                        <select class="form-control @error('district_id') is-invalid @enderror" id="district" name="district_id">
                        	<option>Selecte One....</option>
                        </select>
                         @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">District Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Division Name">
                         @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
               </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>
        </form>
       </div>
       <div class="col-md-8">
           <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Division Name</th>
                                    <th>District Name</th>
                                    <th>Upazila Name</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$datas)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$datas->Division->name}}</td>
                                <td>{{$datas->District->name}}</td>
                                <td>{{$datas->name}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
   </div> 
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
$('#division').on('change',function(e) {
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
                      data = data + "<option value="+0+">"+"--------Select One-------"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.name+"</option>"
                     
                       
                    })
                    $('#district').html(data);
                    
                }
                
            })
});
});
</script>
@endsection