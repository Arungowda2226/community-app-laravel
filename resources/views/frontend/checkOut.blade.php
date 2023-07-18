<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-weight: bold">PAYMENT</div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:12.5%">EventName</th>
                                    <th style="width:12.5%">EventPrice</th>
                                    <th style="width:12.5%">Price Per Member</th>
                                    <th style="width:12.5%">age&lt;6Price</th>
                                    <th style="width:12.5%">age&lt;18Price</th>
                                    <th style="width:12.5%">age&gt;6 Price</th>
                                    <th style="width:12.5%">Name</th>
                                    <th style="width:12.5%">Price</th>
                                    <th style="width:12.5%">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$checkOut->event_name}}</td>
                                    <td>{{$checkOut->event_price}}</td>
                                    <td>{{$checkOut->price_per_member}}</td>
                                    <td>{{$checkOut->ageLess6}}</td>
                                    <td>{{$checkOut->ageLess18}}</td>
                                    <td>{{$checkOut->ageGreather60}}</td>
                                    <td>{{$checkOut->addtional_name}}</td>
                                    <td>{{$checkOut->addtional_price}}</td>
                                    @php
                                    $subtotal = 0;
                                    
                                    $subtotal += intval($checkOut->price_per_member);
                                    $subtotal += intval($checkOut->ageLess6);
                                    $subtotal += intval($checkOut->ageLess18);
                                    $subtotal += intval($checkOut->ageGreather60);
                                    $additionalPrices = explode(',', $checkOut->addtional_price);
                                    foreach ($additionalPrices as $price) {
                                        $subtotal += intval($price);
                                    }
                                    @endphp
                                    <td>{{$subtotal}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                    <tr>
                                        <td colspan="10" style="text-align:right;"><h3><strong>Total:{{$subtotal}}</strong></h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align:right;">
                                        <form action="/session" method="post">
                                        <a href="{{url('/eventList')}}" class="btn btn-danger"><i class="fa fa-arrow-left">return to event</i></a>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                        <input type="hidden" name="total" value="{{$subtotal}}" >
                                        <input type="hidden" name="eventname" value="{{$checkOut->event_name}}" >
                                        <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i>checkout</button>
                                        </form>
                                        </td>
                                    </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
