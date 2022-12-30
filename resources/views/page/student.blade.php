@extends('layouts.layout')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-6">
        <form method="POST" action="{{url('/students/store')}}">
            @csrf
           <div class="card">
               <div class="card-header">
                   Division
               </div>
               <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
                         @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="father_name">father_name</label>
                        <input type="father_name" name="father_name" class="form-control @error('father_name') is-invalid @enderror" id="father_name" placeholder="father_name">
                         @error('father_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mother_name">mother_name</label>
                        <input type="mother_name" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" placeholder="mother_name">
                         @error('mother_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gmail">gmail</label>
                        <input type="gmail" name="gmail" class="form-control @error('gmail') is-invalid @enderror" id="gmail" placeholder="gmail">
                         @error('gmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number">number</label>
                        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="number">
                         @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                        <label for="district">District Name</label>
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
                        <label for="upazila">Upazila Name</label>
                        <select class="form-control @error('upazila_id') is-invalid @enderror" id="upazila" name="upazila_id">
                        	<option>Selecte One....</option>
                        </select>
                         @error('upazila_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">address</label>
                        <textarea name="address" id="address" rows="4" class="form-control @error('address') is-invalid @enderror"></textarea>
                         @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
               </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{url('all/students')}}" class="btn btn-outline-secondary"> All Student</a>
               </div>
           </div>
        </form>
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
$(document).ready(function () {
$('#district').on('change',function(e) {
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
                      data = data + "<option value="+0+">"+"--------Select One-------"+"</option>"
                    $.each(response.data , function(key, value){
                      
                        data = data + "<option value="+value.id+">"+value.name+"</option>"
                     
                       
                    })
                    $('#upazila').html(data);
                    
                }
                
            })
});
});
</script>
@endsection