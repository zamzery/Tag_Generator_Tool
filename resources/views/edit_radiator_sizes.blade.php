@extends('template')

@section('content')
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="card-title">EDIT RADIATOR SIZE</h4>
				</div>
				<div class="card-body">
					<form id="formTag" method="POST" action="{{ url('radiator_sizes',[$radiator_sizes]) }}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="radiator_sizes">RADIATOR SIZE</label>
							<input type="text" class="form-control" id="radiator_sizes" name="radiator_sizes" placeholder="Enter Radiator Size" value="{{$radiator_sizes->radiator_sizes}}" required>
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