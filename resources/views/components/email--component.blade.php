

<!-- Modal -->
<div class="modal fade" id="emailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Email Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">

       <div class="row">
        <div class="col-md-6">
         <img width="100%" height="100rem" class="border-secondary" src="" id="product_image">
        </div>
        <div class="col-md-6">
         <h6 id="name"></h6>
         <p>Agent: <span id="agent" class="fw-bold"></span></p>
        </div>
       </div>
       <div class="row">
        <div class="col-md-12 p-1">
           <textarea class="form-control border-secondary mt-3 p-1" rows="2">Hi, I found your property on Real Estate. Please contact me. Thank you.</textarea>
         </div>
       </div>
       <div class="row">
        <div class="col-md-6 p-1">
         <input type="text" name="name" class="form-control border-secondary" value="@if(Auth::user()){{Auth::user()->user_name}}@endif">
        </div>
        <div class="col-md-6 p-1">
         <input type="text" name="email" class="form-control border-secondary" value="@if(Auth::user()){{Auth::user()->email}} @endif">
        </div>

        <div class="col-md-12 mt-1 p-1">
         <input type="text" name="phone" class="form-control border-secondary" value="@if(Auth::user()){{Auth::user()->phone}}@endif">
        </div>

       </div>
      </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn_chat w-25">Email</button>
      </div>
    </form>
    </div>
  </div>
</div>