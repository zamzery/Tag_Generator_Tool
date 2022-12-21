@extends('template')

@section('content')
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="card-title">EDIT RAM TYPE SPEED</h4>
				</div>
				<div class="card-body">
					<form id="formTag" method="POST" action="{{ url('ram_type_speeds',[$ram_type_speeds]) }}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="ram_types">RAM TYPE SPEED</label>
							<select class="form-select" id="ram_types" name="ram_types" required>
								<option value="">Select Ram Type</option>
								@foreach($ram_types as $ram_type)
									<option value="{{$ram_type->id}}" {{($ram_type_speeds->ram_types==$ram_type->id)? 'selected':''}}>{{$ram_type->ram_types}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="ram_type_speeds">RAM TYPE SPEED</label>
							<input type="text" class="form-control" id="ram_type_speeds" name="ram_type_speeds" placeholder="Enter Ram Type Speed" value="{{$ram_type_speeds->ram_type_speeds}}" required>
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