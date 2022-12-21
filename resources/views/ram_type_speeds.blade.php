@extends('template')

@section('content')
	<div class="row">
		<div class="form-group col-lg-12 col-md-12 col-xs-12">
			<h4>RAM TYPE SPEEDS</h4>
			<table id="tblSocket" width="100%" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
				<thead class="thead-dark">
					<tr class="table-dark">
						<th style="display:none;">#</th>
						<th>RAM TYPE</th>
						<th>RAM TYPE SPEED</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($ram_type_speeds as $ram_type_speed)
					<tr>
						<td style="display:none;">{{$i++}}</td>
						<td>{{$ram_type_speed->ram_types}}</td>
						<td>{{$ram_type_speed->ram_type_speeds}}</td>
						<td>
							<a href="{{ url('ram_type_speeds',[$ram_type_speed]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
						</td>
						<td>
							<form method="POST" action="{{ url('ram_type_speeds',[$ram_type_speed]) }}">
								@method('delete')
								@csrf
								<button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th style="display:none;">#</th>
						<th>RAM TYPE</th>
						<th>RAM TYPE SPEED</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</tfoot>
			</table>
			<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalNewTag"><i class="fa-solid fa-circle-plus"></i> Add New Tags</button>
		</div>
	</div>

	<div class="modal fade" id="modalNewTag" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">NEW RAM TYPE SPEED TAG</h5>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form id="formTag" method="POST" action="{{ url('ram_type_speeds') }}">
						@csrf
						<div class="form-group">
							<label for="socket">RAM TYPE SPEED</label>
							<select class="form-select" id="ram_types" name="ram_types" required>
								<option value="">Select Ram Type</option>
								@foreach($ram_types as $ram_type)
									<option value="{{$ram_type->id}}">{{$ram_type->ram_types}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="socket">RAM TYPE SPEED</label>
							<input type="text" class="form-control" id="ram_type_speeds" name="ram_type_speeds" placeholder="Enter Ram Type Speed" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="formTag"><i class="fa fa-solid fa-floppy-disk"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
@endsection