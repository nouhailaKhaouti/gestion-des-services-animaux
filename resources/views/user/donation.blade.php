@include('user.navbar')
@include('user.head')
<main class="main" id="top">
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row min-vh-xl-100 min-vh-xxl-25">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/donate.jpg" alt="hero-header" width="600" height="600" style=" border-radius: 8px; " /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
              <h1 class="fw-light font-base fs-6 fs-xxl-7"><strong> Donation </strong></h1>
              <p class="fs-1 mb-5">You can get the care you need 24/7 – be it online or in <br />person. You will be treated by caring specialist doctors. </p>
            </div>
          </div>
        </div>
      </section>

<div class="right">
    <div class="bloc">
      <h1>Donation d'argent</h1>
      <div class="titre">
        <div class="titre">
          <p><strong>10 dirhams</strong></p>
        </div>
        
      </div>
      <div class="distributor " >
    <p>This earth was made for all beings not just human beings.</p>
          </div>
      <div class="description">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nemo et commodi suscipit. Repellat nemo et commodi suscipit.</p>
        <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos quibusdam laudantium ad corporis, ipsum minima inventore? Soluta enim eos officiis perspiciatis quaerat.</p>
      </div>

      <div id="paypal-payment-button"></div>
    
    </div>
  </div>
        
  <div class="bloc">

       <h1>Donation de nourriture</h1>
       <div class="description">
        <p> <strong >Donate food to our local shelter</strong></p>
        <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos quibusdam laudantium ad corporis, ipsum minima inventore? Soluta enim eos officiis perspiciatis quaerat.</p>
      </div>
      <div id="googleMap" style="width:100%;height:400px;"></div>

</div>

<script src="https://www.paypal.com/sdk/js?client-id=ASSm0DJKZJAtZGGYSfoLT5vh6ecHA2xRbxZ761_ZemEfI4aVebhCjLa7gHSGDlKGIcQ8ZviOMZUgpaEW&currency=EUR"></script>
<script>
    paypal.Buttons({
    style : {
        color: 'blue'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units:[{
              amount: {
                  value:'0.10'
              }
            }]
        })
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            console.log(details)
          window.location.replace("success.html")
        })
    }
}).render('#paypal-payment-button');
</script>
<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@include('user.script')
