@extends('layouts.pos')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
            @foreach ($mesas as $mesa)
            
                {{$mesa->nombre }}
                <a class="dropdown-item " href="{{ route('pos.edit',$mesa->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
            @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection