@extends('layouts.pos')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card align-items-center">
            @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
            
            <div class="card-body ">
                
                @foreach ($mesas as $mesa)
                @if($mesa->activo == 'SI')
                    <div class="card" style="width: 20rem;">
                        <a class="btn btn-primary" href="{{ route('pos.edit',$mesa->id) }}"> {{$mesa->nombre }}</a>
                    </div>
                @else
                    <div class="card " style="width: 20rem;">
                        <a class="btn btn-danger" href="{{ route('pos.edit',$mesa->id) }}"> {{$mesa->nombre }}</a>
                    </div>
                @endif
                @endforeach
                
            </div>
            
        </div>
    </div>
</div>
</div>
@endsection