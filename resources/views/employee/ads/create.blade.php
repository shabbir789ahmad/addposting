@extends('employee.admin')
		
@section('content')

<form action="{{ route('agent.ads.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row justify-content-center">
	  <div class="col-md-12 text-center">
      <i class="fas fa-boxes fa-3x icn"></i>
      <h2 class="h2 mt-3">Post Your Ads</h2>
		</div>
		<div class="col-md-11">
			<div class="card card_color shadow">
				<div class="card-body ">
					<!-- <input type="text" name="category_id" value="{{$categories->category_type}}"> -->
					<input type="hidden" name="category_id" value="{{$categories->id}}">
				
					
					<input type="text" name="labour_id" value="{{Auth::id()}}">
					<div class="row">
					 <div class="col-md-12 col-12">
                        <label for="" class="font-weight-bold mt-2">
							Ad Title here <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control input_border" name="name" placeholder="Ads Title Here" value="{{old('name')}}">
						<span class="text-danger">@error ('name') {{$message}}@enderror</span>
					 </div>
					</div>
					<div class="form-group">
						<label for="" class="font-weight-bold mt-4">
							Ad Detail <span class="text-danger">*</span>
						</label>
					 <textarea class="form-control input_border" name="detail" rows="5" placeholder="Detail here"></textarea>	
					 <span class="text-danger">@error ('detail') {{$message}}@enderror</span>
           @if($categories->category_type=='house' || $categories->category_type=='apartment' || $categories->category_type=='rooms')
					 <label for="" class="font-weight-bold mt-4">
							Furnished
						</label>
            <div class="all_checkbox">
             <div type="button" class="input_checkbox3  p-2 mt-2">
                <label>Furnished</label>
                <input type="checkbox" name="furnished" value="Furnished" class="check_btn3" >
             </div>
             <div type="button" class="input_checkbox3 ml-3 p-2 mt-2">
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
                  @foreach($areas as $area)
				         <div type="button" class="input_checkbox2 ml-3 p-2 mt-2">
                     <label >{{$area['areaunit']}}</label>
                       <input type="checkbox" name="areaunit" value="{{$area['areaunit']}}" class="check_btn2" >
                       <span class="text-danger">@error ('areaunit') {{$message}}@enderror</span>
                   </div>
                  @endforeach
			           </div>
           @if($categories->category_type=='floor' || $categories->category_type=='apartment' || $categories->category_type=='shop')
					 <div class="row">
            <div class="col-md-12">
             <label for="" class="font-weight-bold mt-4">
							   Floor Level<span class="text-danger">*</span>
						 </label>
              <select class="form-control" name="floor_level">
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


                 <label for="" class="font-weight-bold ">
							Set Price <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control mb-5 input_border" name="price" placeholder="Price" value="{{old('price')}}">
						<span class="text-danger ">@error ('price') {{$message}}@enderror</span>

       
           <label for="" class="font-weight-bold mt-3">
							Select Multiple Images <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control mb-5 input_border" name="image[]"  multiple>
						<span class="text-danger ">@error ('image') {{$message}}@enderror</span>

					
           <label for="" class="font-weight-bold ">
							Your State  <span class="text-danger">*</span>
						</label>
				    <select class="form-control mb-5" name="" id="state">
				    	<option  selected hidden disabled>Select City</option>
                 @foreach($states as $state)
                  <option value="{{$state['id']}}">{{$state['states']}}</option>
                 @endforeach
            </select>
                       
						

						<label for="" class="font-weight-bold ">
							Your City <span class="text-danger">*</span>
						</label>
				    <select class="form-control mb-5" name="location" id="city">
				    	
            </select>
                       
						<span class="text-danger ">@error ('location') {{$message}}@enderror</span>
					</div>
					<hr class="card_color2">
					<div class="">
						<button class="btn btn_ads  mt-3">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection