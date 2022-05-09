@extends('Dashboard.admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="form-group ml-2">
			<x-btn-component route="packages.create"></x-btn-component>
		</div>
	</div>
</div>


<style type="text/css">
     
  #pricing-table {
    margin: 50px auto;
    text-align: center;
    width: 90%; /* total computed width */
    zoom: 1;
  }

  #pricing-table:before, #pricing-table:after {
    content: "";
    display: table
  }

  #pricing-table:after {
    clear: both
  }

  /* --------------- */ 

  #pricing-table .plan {
    font: 13px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;     
    background: #fff;      
    border: 1px solid #ddd;
    color: #333;
    padding: 20px;
    width: 30%;
    float: left;
    _display: inline; /* IE6 double margin fix */
    position: relative;
    margin: 0 5px;
    box-shadow: 0 2px 2px -1px rgba(0,0,0,.3);    
  }

  #pricing-table .plan:after {
    z-index: -1; 
    position: absolute; 
    content: "";
    bottom: 10px;
    right: 4px;
    width: 80%; 
    top: 80%; 
    box-shadow: 0 12px 5px rgba(0, 0, 0, .3);
    transform: rotate(3deg);  
  } 
  
  #pricing-table .popular-plan {
    top: -20px;
    padding: 40px 20px;   
  }
  
  /* --------------- */ 

  #pricing-table .header {
    position: relative;
    font-size: 20px;
    font-weight: normal;
    text-transform: uppercase;
    padding: 40px;
    margin: -20px -20px 20px -20px;
    border-bottom: 8px solid;
    background-color: #002f34;
    background-image: linear-gradient(#fff, #eee);
  }

  #pricing-table .header:after {
    position: absolute;
    bottom: -8px; left: 0;
    height: 3px; width: 100%;
    content: '';
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAADCAYAAABfwxXFAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpGOEE3MTBFRDVCQ0NFMTExODcxMEJBRjhFNUY2ODdCRSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpGMjQxOTc0MUNFNUUxMUUxQjczN0Q4QzY3MDc4MjkxOCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpGMjQxOTc0MENFNUUxMUUxQjczN0Q4QzY3MDc4MjkxOCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0RDMxQTYxREVCQ0RFMTExQUI1NjlDMTg5OTUyMzNDNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGOEE3MTBFRDVCQ0NFMTExODcxMEJBRjhFNUY2ODdCRSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqOCuVUAAAArSURBVHjaYvj//z8DFPMA8UkoDRZjQJJs/w8B7eiSKkD8Eyr5E8pnAAgwAIiWROlhTpC8AAAAAElFTkSuQmCC);
  }
  
  #pricing-table .popular-plan .header {
    margin-top: -40px;
    padding-top: 60px;    
  }

  #pricing-table .plan1 .header{
    border-bottom-color: #002f34;
  }

    
  
  /* --------------- */

  #pricing-table .price{
    font-size: 45px;
  }

  #pricing-table .monthly{
    font-size: 13px;
    margin-bottom: 20px;
    text-transform: uppercase;
    color: #999;
  }

  /* --------------- */

  #pricing-table ul {
    margin: 20px 0;
    padding: 0;
    list-style: none;
  }

  #pricing-table li {
    padding: 10px 0;
  }
  
  /* --------------- */
    
  #pricing-table .signup {
    position: relative;
    padding: 10px 20px;
    color: #fff;
    font: bold 14px Arial, Helvetica;
    text-transform: uppercase;
    text-decoration: none;
    display: inline-block;       
    background-color: #002f34;
    border-radius: 3px;     
    text-shadow: 0 -1px 0 rgba(0,0,0,.15);
    opacity: .9;       
  }

  #pricing-table .signup:hover {
    opacity: 1;       
  }

  #pricing-table .signup:active {
    box-shadow: 0 2px 2px rgba(0,0,0,.3) inset;       
  }     



  
</style>

<div class="card">
	<div class="card-body">
   <h4 class="text-dark font-weight-bold">All Packages</h4>
	</div>
</div>
<div id="pricing-table">
   @if(count($packages) > 0)
   @foreach($packages as $package)
    <div class="plan plan1">
        <div class="header">{{ucfirst($package['package_name'])}}</div>
        <div class="price">{{$package['package_price']-$package['package_discount']}} AED</div>  
        <div class="monthly">per Ads</div>      
        <ul>
          
            <li><b>Valid Till: </b>{{date('d-m-Y', strtotime($package['package_duration']))}} </li>
            <li><b>@if($package['package_discount']) {{$package['package_discount']}} @else 0 @endif AED</b> Discount</li>
          
        </ul>
        <hr class="m-2">
               <div class="text-center">
               	<button type="button" class="btn btn-xs btn-warning discount " data-id="{{$package['id']}}">
				  Discount
				  </button>
			     <a href="{{ route('packages.edit', ['id' => $package->id]) }}" type="submit" class="btn btn-xs btn-info  ">
				  Edit
				  </a>
				  <form action="{{ route('packages.destroy', ['id' => $package->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
				  @method('DELETE')
				  @csrf
				   <button type="submit" class="btn btn-xs btn-danger ">
						Delete
				   </button>
				  </form>
			   </div>	        
    </div >
   
   @endforeach
   @else
     <div class="col-12">
	  	<x-resource-empty resource="package" new="packages.create"></x-resource-empty>
	  </div>
   @endif
   
   
     
</div>





<!-- Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('packages.update2')}}" method="POST">
      	@csrf
      	@method('PUT')
      	<input type="hidden" name="id" id="did">
      	<label for="" class="font-weight-bold mt-2">
			Package Disocunt <span class="text-danger">*</span>
			</label>
			<input type="number" class="form-control" name="package_discount" placeholder="Package Discount" >
			<span class="text-danger">@error ('package_discount') {{$message}}@enderror</span>
     
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>




@endsection