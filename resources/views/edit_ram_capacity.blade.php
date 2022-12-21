@extends('template')

@section('content')
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="card-title">EDIT RAM CAPACITY</h4>
				</div>
				<div class="card-body">
					<form id="formTag" method="POST" action="{{ url('ram_capacity',[$ram_capacities]) }}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="ram_capacity">RAM CAPACITY</label>
							<input type="text" class="form-control" id="ram_capacity" name="ram_capacity" placeholder="Enter Ram Capacity" value="{{$ram_capacities->ram_capacity}}" required>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<a type="button" class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
					<button type="submit" class="btn btn-primary" form="formTag"><i class="fa fa-solid fa-floppy-disk"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
@endsection