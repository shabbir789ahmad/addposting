<div class="row mt-5">
	<div class="col-12">
		<div class="card">
			<div class="card-header header d-flex">
			<h3 class=" text-light">{{$data}}</h3>
			<select class="form-control w-25 ml-auto"  id="Approved">
			    <option selected disabled hidden>Sort By</option>
                <option value="1">Approved</option>
                <option value="0">Non Approved</option>
            </select>
          </div>
			<div class="card-body pb-0">
               
				@if(count($users) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Type</th>
								<th scope="col">Approve</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td class="col-2"><img src="{{asset('uploads/user/'.$user->user_image)}}" width="100%" height="70rem"></td>
								<td class="text-dark">{{ ucfirst($user->user_name )}}</td>
								<td class="text-dark">{{ $user->email }}</td>
								<td class="text-dark">{{ $user->phone }}</td>
								<td class="text-dark">{{ $user->user_type }}</td>
								 <td scope="col" >
								 	<input type="checkbox" data-id="{{$user['id']}}" name="vendor_status" class="js-switchu user" {{ $user->approve == 1 ? 'checked' : '' }} ></td>
								<td>
									
									<form action="{{ route('vendor.destroy', ['id' => $user->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-xs btn-danger">
											Delete
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				@else

				<x-resource-empty resource="{{$type}}" new="{{$type}}.index"></x-resource-empty>

				@endif
							
			</div>
		</div>
	</div>
</div>

