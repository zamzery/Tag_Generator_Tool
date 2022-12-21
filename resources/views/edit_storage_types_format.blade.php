@extends('template')

@section('content')
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="card-title">EDIT STORAGE TYPES FORMAT</h4>
				</div>
				<div class="card-body">
					<form id="formTag" method="POST" action="{{ url('storage_types_format',[$storage_types_format]) }}">
						@method('PUT')
						@csrf
						<div class="input-group mb-3">
							<div class="form-check form-check-inline">
								<input type="hidden" name="sata" id="sata" value="{{$storage_types_format->sata}}" checked>
								<input class="form-check-input" type="radio" name="storageCheck" id="sataCheck" onclick="changeStorage('sata')" {{($storage_types_format->sata==1)? 'checked' : ''}}>
								<label class="form-check-label" for="sataCheck">SATA</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="m2" id="m2" value="{{$storage_types_format->m2}}" checked>
								<input class="form-check-input" type="radio" name="storageCheck" id="m2Check" onclick="changeStorage('m2');" {{($storage_types_format->m2==1)? 'checked' : ''}}>
								<label class="form-check-label" for="m2Check">M.2</label>
							</div>
						</div>
						<div class="form-group">
							<label for="storage_types_format">STORAGE TYPE FORMAT</label>
							<input type="text" class="form-control" id="storage_types_format" name="storage_types_format" placeholder="Enter Cooling Type" value="{{$storage_types_format->storage_types_format}}" required>
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