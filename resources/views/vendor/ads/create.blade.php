@extends('vendor.admin')
		
@section('content')

<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
	  <div class="col-md-12 text-center">
      <i class="fas fa-boxes fa-3x icn"></i>
      <h2 class="h2 mt-3">Post Your Ads</h2>
		</div>
		@if(!$ads==null)
		<div class="col-md-11">
			<div class="card card_color shadow">
				<div class="card-body ">
				 @if($categorie->property_id==1)
				  @php $pro='sale'; @endphp
         @else
          @php $pro='rent'; @endphp
         @endif
					<input type="hidden" name="category_id" value="{{$categorie->id}}">
					<input type="hidden" name="plot_type" value="{{$pro}}">
				
					<input type="hidden" name="user_id" value="{{Auth::id()}}">
					<div class="row">

					 <div class="col-md-6 col-12">
                        <label for="" class="font-weight-bold mt-2">
							Ad Title here <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control input_border" name="name" placeholder="Ads Title Here" value="{{old('name')}}">
						<span class="text-danger">@error ('name') {{$message}}@enderror</span>
					 </div>

					 <div class="col-md-6 col-12">
                        <label for="" class="font-weight-bold mt-2">
							Select Add Type <span class="text-danger">*</span>
						</label>
						 <select class="form-control input_border" name="ads_type">
						 	<option value>Free</option>
						 </select>
						<span class="text-danger">@error ('ads_type') {{$message}}@enderror</span>
					 </div>

					</div>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-4">
							Ad Detail <span class="text-danger">*</span>
						</label>
					 <textarea class="form-control input_border" name="detail" rows="5" placeholder="Detail here"></textarea>	
					 <span class="text-danger">@error ('detail') {{$message}}@enderror</span>
           @if($categorie->category_type=='house' || $categorie->category_type=='apartment' || $categorie->category_type=='rooms')
					 <label for="" class="font-weight-bold mt-4">
							Furnished
						</label>
            <div class="all_checkbox">
             <div type="button" class="input_checkbox_furnished  p-2 mt-2">
                <label>Furnished</label>
                <input type="checkbox" name="furnished" value="Furnished" class="check_btn3" >
             </div>
             <div type="button" class="input_checkbox_furnished ml-3 p-2 mt-2">
                <label>Un Furnished</label>
                <input type="checkbox" name="furnished" value="Un Furnished" class="check_btn3" >
             </div>
            </div>
                        
            <div class="row">
             <div class="col-md-6">
              <label for="" class="font-weight-bold mt-4">
							  Bedroom<span class="text-danger">*</span>
						  </label>
              <select class="form-control" name="bedroom">
                <option  selected hidden disabled>Select Number Of Bedroom</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6+</option>
              </select>
              <span class="text-danger">@error ('bedroom') {{$message}}@enderror</span>
            </div>
            <div class="col-md-6">
             <label for="" class="font-weight-bold mt-4">
							   Bathroom<span class="text-danger">*</span>
						 </label>
              <select class="form-control" name="bathroom">
               <option  selected hidden disabled>Select Number Of Bathrom</option>
               <option>1</option>
               <option>2</option>
               <option>3</option>
               <option>4</option>
               <option>5</option>
               <option>6+</option>
              </select>
              <span class="text-danger">@error ('bathroom') {{$message}}@enderror</span>
            </div>
           </div>
          @endif

          @if(count($types))
          <label for="" class="font-weight-bold mt-4">
							Type<span class="text-danger">*</span>
					</label>
          <div class="all_checkbox ">
            @foreach($types as $type)
				     <div type="button" class="input_checkbox4  p-2 ml-2 mt-2">
                <label>{{$type['type']}}</label>
                <input type="checkbox" name="type" value="{{$type['type']}}" class="check_btn4" >
                <span class="text-danger">@error ('type') {{$message}}@enderror</span>
              </div>
            @endforeach
			    </div>
          @endif
					<label for="" class="font-weight-bold mt-4">
						Feature<span class="text-danger">*</span>
					</label>
          <div class="all_checkbox ">
                      	@foreach($subcategories as $subcategory)
				         <div type="button" class="input_checkbox  p-2 ml-2 mt-2">
                          <label>{{$subcategory['sub_category_name']}}</label>
                          <input type="checkbox" name="feature[]" value="{{$subcategory['sub_category_name']}}" class="check_btn" >
                          <span class="text-danger">@error ('feature') {{$message}}@enderror</span>
                         </div>
                        @endforeach
			           </div>
			           			
						<label for="" class="font-weight-bold mt-4">
							Area Unit<span class="text-danger">*</span>
						</label>
               <div class="all_checkbox2">
				         <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >Kanal</label>
                       <input type="checkbox" name="areaunit" value="kanal" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                    <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >Marla</label>
                       <input type="checkbox" name="areaunit" value="marla" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                    <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >Square Feet</label>
                       <input type="checkbox" name="areaunit" value="square feet" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                    <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >Square Meter</label>
                       <input type="checkbox" name="areaunit" value="square meter" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                   <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >Square Yard</label>
                       <input type="checkbox" name="areaunit" value="square yard" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
			           </div>
           @if($categorie->category_type=='floor' || $categorie->category_type=='apartment' || $categorie->category_type=='shop')
					 <div class="row">
            <div class="col-md-12">
             <label for="" class="font-weight-bold mt-4">
							  Number of Floor Level<span class="text-danger">*</span>
						 </label>
              <select class="form-control input_border" name="floor_level">
               <option  selected hidden disabled>Select Floor Level</option>
               <option>0</option>
               <option>1</option>
               <option>2</option>
               <option>3</option>
               <option>4</option>
               <option>5</option>
               <option>6+</option>
              </select>
              <span class="text-danger">@error ('bathroom') {{$message}}@enderror</span>
            </div>
           </div>
          @endif

			     <label for="" class="font-weight-bold mt-2">
							Area <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control input_border" name="total_area" placeholder="Area" value="{{old('total_area')}}">
						<span class="text-danger">@error ('total_area') {{$message}}@enderror</span>

               
               <div class="row mt-3">
                @if($pro=='rent')
               	<div class="col-md-6">
               		@else
                 <div class="col-md-12">
               		@endif
                 <label for="" class="font-weight-bold ">
						       	Set Price <span class="text-danger">*</span>
						     </label>
						     <input type="text" class="form-control mb-5 input_border" name="price" placeholder="Price" value="{{old('price')}}">
						     <span class="text-danger ">@error ('price') {{$message}}@enderror</span>
                </div>
                
                @if($pro=='rent')
                <div class="col-md-6">
                 <label for="" class="font-weight-bold ">
						       	Rent Per <span class="text-danger">*</span>
						     </label>
						     <select class="form-control input_border" name="rent_per">
						     	<option>Month</option>
						     	<option>Year</option>
						     </select>
						     <span class="text-danger ">@error ('price') {{$message}}@enderror</span>
                </div>
                @endif
               </div>  
       
           <label for="" class="font-weight-bold mt-3">
							Select Multiple Images <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control mb-5 input_border" name="image[]"  multiple>
						<span class="text-danger ">@error ('image') {{$message}}@enderror</span>

					
           <label for="" class="font-weight-bold ">
							Your State  <span class="text-danger">*</span>
						</label>
				    <select class="form-control mb-2" name="" id="state">
				    	<option  selected hidden disabled>Select State</option>
                 @foreach($states as $state)
                  <option value="{{$state['id']}}">{{$state['states']}}</option>
                 @endforeach
            </select>
                       
						<label for="" class="font-weight-bold ">
							Your City <span class="text-danger">*</span>
						</label>
				    <select class="form-control mb-2" name="city" id="city">
				    	
            </select>
                       
						<span class="text-danger ">@error ('city') {{$message}}@enderror</span>
						<label for="" class="font-weight-bold ">
							Your Address <span class="text-danger">*</span>
						</label>
						<input type="text" name="location" class="form-control">
                       
						<span class="text-danger ">@error ('location') {{$message}}@enderror</span>
					</div>
					<hr class="card_color2">
					<div class="">
						<button class="btn btn_ads  mt-3">Save</button>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="card">
			<div class="card-body text-center">
        <img src="{{asset('pic/icons8-male-user-24.png')}}" width="15%">
        <h5 class="mt-2">Look like You Dont Have Ads Package </h5>
        <a href="{{route('package.index')}}" class="btn btn-warning mt-2">Click To Buy More Ads</a>
			</div>
		</div>
		@endif
	</div>
</form>

@endsection