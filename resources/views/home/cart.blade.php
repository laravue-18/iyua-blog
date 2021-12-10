@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:15%">Product</th>
                <th style="width:35%"></th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
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
                        <td data-th="Product">
                            <img src="/images/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/>
                        </td>
                        <td>
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">
                    <a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <a href="{{ route('checkout.address') }}" class="btn btn-secondary">Checkout</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@push('script')
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('cart.update') }}',
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
                    url: '{{ route('cart.destroy') }}',
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
@endpush

@push('css')
    <style>
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
@endpush
