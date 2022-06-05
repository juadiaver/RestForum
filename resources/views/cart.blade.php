@extends('layouts.carrito')
  
@section('content')
<table id="cart" class="">
    <thead>
        <tr>
            <th style="width:50%">Producto</th>
            <th style="width:10%">Precio</th>
            <th style="width:8%">Cantidad</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td >
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="/storage/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }} €</td>
                    <td data-th="Quantity">
                        <input type="number"  value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} €</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger  remove-from-cart">X</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total {{ $total }} €</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                    <form action="{{ route('realizarPedido.cart') }}" method="POST">						 
                        @csrf
                        <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('carrito') }}"> Volver</a>
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Deseas realizar el pedido')||event.preventDefault()"> Pedir </button>   
                        </div>
                        </form>
                </td>    
                
                
                
            </td>
        </tr>
    </tfoot>
</table>
@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection