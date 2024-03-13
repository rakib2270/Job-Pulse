@extends('employee.employee')

@section('emContent')
<div class="container">
   <div class="card border-0 p-3 shadow mb-4">
       <div class="card-body">
    <h2>Payment Details</h2>
    <p>Customer Name: {{Auth::user()->name}}</p>
    <p>Customer Email: {{Auth::user()->email}}</p>
    <p>Subscription Fee: $10 </p>
    <p>Payment Method: Card</p>
       </div>
   </div>
    <div class="checkoutCard">
            <form action="{{route('employee.addSubscription',['user' => Auth::user()->id])}}" method="POST">
                 @csrf
                 @method('PUT')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <button class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                            </svg>
                    </button>
            </form>
        <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
        <label class="cardlabel">Card number:</label>
        <input  id="user" type="text" class="input cardnumber"  placeholder="1234 5678 9101 1121">
        <label class="cardlabel">Name:</label>
        <input class="input name"  placeholder="Edgar Pérez">
        <label class="cardlabel">CCV:</label>
        <input class=" cardlabel  toleft ccv" placeholder="321">
    </div>
    <div class="receipt">
        <div class="col"><p>Cost:</p>
            <h2 class="cost">$400</h2><br>
            <p>Name:</p>
            <h2 class="seller">Codedgar</h2>
        </div>
        <div class="col">
            <p>Bought Items:</p>
            <h3 class="bought-items">Corsair Mouse</h3>
            <p class="bought-items description">Gaming mouse with shiny lights</p>
            <p class="bought-items price">$200 (50% discount)</p><br>
            <h3 class="bought-items">Gaming keyboard</h3>
            <p class="bought-items description">Look mommmy, it has colors!</p>
            <p class="bought-items price">$200 (50% discount)</p><br>
        </div>
        <p class="comprobe">This information will be sended to your email</p>
    </div>
</div>

@endsection
