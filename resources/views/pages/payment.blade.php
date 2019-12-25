@extends('layout')

@section('content')
  <section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Shopping Cart</li>
        </ol>
      </div>
      <div class="table-responsive cart_info">
        <?php
        $contents = Cart::content();
        // echo "<pre>";
        // print_r($contents);
        // echo "</pre>";
        ?>
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Image</td>
              <td class="description">Name</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
          @foreach($contents as $contents)
            <tr>
              <td class="cart_product">
                <a href=""><img height="80px" width="80px" src="{{$contents->options->image}}" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{$contents->name}}</a></h4>
                {{-- <p>Web ID: 1089772</p> --}}
              </td>
              <td class="cart_price">
                <p>BDT {{$contents->price}}</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                  <form class="" action="{{url('/update-cart')}}" method="post">
                    {{csrf_field()}}
                    <input class="cart_quantity_input" type="text" name="qty" value="{{$contents->qty}}" autocomplete="off" size="2">
                    <input type="hidden" name="rowId" value="{{$contents->rowId}}">
                    <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                  </form>
                  {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">{{$contents->total}}</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{URL::to('/delete-from-cart/'.$contents->rowId)}}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next ? </h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="#">Home</a> </li>
        <li class="active">Payment method</li>
      </ol>
    </div>
    <div class="paymentCont">
      <div class="headingWrap">
        <h3 class="headingTop text-center">Select Your Payment Method</h3>
        <p class="text-center">Created with bootstrap button and radio button</p>
      </div>
      {{-- <div class="paymentWrap">
        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
          <label class="btn paymentMethod active">
            <div class="method visa"></div>
            <input type="radio" name="options" checked>
          </label>
          <label class="btn paymentMethod">
            <div class="method master-card"></div>
            <input type="radio" name="options">
          </label>
          <label class="btn paymentMethod">
            <div class="method amex"></div>
            <input type="radio" name="options">
          </label>
           <label class="btn paymentMethod">
            <div class="method vishwa"></div>
            <input type="radio" name="options">
          </label>
          <label class="btn paymentMethod">
            <div class="method ez-cash"></div>
            <input type="radio" name="options">
          </label>
        </div>
      </div>
      <div class="footerNavWrap clearfix">
        <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span>Done</div>
      </div> --}}
      <form action="{{url('/order-place')}}" method="post">
        @csrf
        <input type="radio" name="payment_method" value="handcash"> Hand Cash <br>
        <input type="radio" name="payment_method" value="card"> Debit card <br>
        <input type="radio" name="payment_method" value="bkash"> Bkash <br>
        <input type="submit" name="" value="Done">
      </form>
    </div>
  </div>
</section>
@endsection
