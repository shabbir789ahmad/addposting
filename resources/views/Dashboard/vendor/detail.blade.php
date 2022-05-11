@extends('Dashboard.admin')
@section('content')
 
 <style type="text/css">
     #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  height: 30rem;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 3rem;
  right: 35px;
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
 </style>
<div class="card backgorund">
    <div class="card-body">
        <h4 class="font-weight-bold">
           Vendor Detail
        </h4>
    </div>
</div>


<div class="card">
 <div class="card-body">
   <div class="row">
     <div class="col-md-4">
       <img src="{{asset('uploads/user/'.$vendor['user_image'])}}" width="100%" height="500rem" class="rounded">
     </div>

     <div class="col-md-8 " style="display:flex; justify-content: space-between;">
      <div class="detail_image  w-100">
        <div class="detail">
          <p>Name:</p>
          <span>{{$vendor['user_name']}}</span>
        </div>
        <div class="detail">
          <p>Email:</p>
          <span>{{$vendor['email']}}</span>
        </div>
        <div class="detail">
          <p>Phone:</p>
          <span>{{$vendor['phone']}}</span>
        </div>
        <div class="detail">
          <p>Company Name:</p>
          <span>{{$vendor['company_name']}}</span>
        </div>
        <div class="detail">
          <p>Company City:</p>
          <span>{{$vendor['city']}}</span>
        </div>
        <div class="detail">
          <p> Zip Code:</p>
          <span>{{$vendor['zip_code']}}</span>
        </div>
        <div class="detail">
          <p>Company Address:</p>
          <span>{{$vendor['company_address']}}</span>
        </div>
        <div class="detail">
          <p>Company Licence No:</p>
          <span>{{$vendor['licenece_no']}}</span>
        </div>
        <div class="detail">
          <p class="mb-2">About Me:</p>
          
      </div>
      <div class="detail ">
         
          <span>{{$vendor['about_me']}}</span>
      </div>
       </div>
       <div class="company_image ">
          <img src="{{asset('uploads/user/'.$vendor['licenece_image'])}}" width="150rem" height="100rem" class="rounded" id="myImg">
       </div>
      
     
         
     </div>
   </div>
 </div>
</div>


<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

@endsection

@section('script')
<script type="text/javascript">
   var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
@endsection
