@extends('Dashboard.admin')

@section('content')

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <h3 class="card-header header text-light">All User</h3>
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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="col-2"><img src="{{asset('uploads/img/'.$user->user_image)}}" width="50%"></td>
                                <td class="text-dark">{{ ucfirst($user->user_name )}}</td>
                                <td class="text-dark">{{ $user->email }}</td>
                                <td class="text-dark">{{ $user->phone }}</td>
                                 
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


@endsection

@section('script')
@parent
<script type="text/javascript">
	
 
</script>
@endsection