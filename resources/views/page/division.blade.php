@extends('layouts.layout')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-4">
        <form method="POST" action="{{url('/division/store')}}">
            @csrf
           <div class="card">
               <div class="card-header">
                   Division
               </div>
               <div class="card-body">
                    <div class="form-group">
                        <label for="name">Division Name</label>
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
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $key=>$datas)
                              <tr>
                                <td>{{++$key}}</td>
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
@endsection