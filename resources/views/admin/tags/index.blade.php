@extends('admin.partials.main')

@section('content')

	<div class="box box-primary">
    	<div class="box-header with-border">
            <h3 class="box-title">List Tag</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
			<table class="table no-margin table-bordered table-hover" id="table">
            	<thead>
            		<tr>
            			<th>Nama</th>
						<th>Updated</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($tags as $tag)
            		<tr>
            			<td>{{ $tag->nama }}</td>
            			<td>{{ $tag->updated_at->diffForHumans() }}</td>
            			<td>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
								Choose Action <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ URL::to('admin/tags/'.$tag->id.'/edit') }}" title="Edit">
										<i class="fa fa-pencil-square-o"></i> Edit
									</a></li>
									<li><a href="#" title="Hapus" data-toggle="modal" data-target=".delete{{ $tag->id }}">
										<i class="fa fa-trash"></i> Delete
									</a></li>
								</ul>
							</div>

							<!-- Modal -->
							<div class="modal fade delete{{ $tag->id }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
										</div>
										<div class="modal-body" >Are you sure delete this data?</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;margin-left:10px;">No</button>
							                <form action="{{ URL::to('admin/tags/'.$tag->id) }}" method="POST">
							    				{!! csrf_field() !!}
							                    {{ method_field('DELETE') }}
							                    <button type="submit" class="btn btn-primary">Yes</button>
							                </form>
										</div>
									</div>
								</div>
							</div>
						</td>
            		</tr>
            	@endforeach
            	</tbody>
            </table>
    	</div>

        <div class="box-footer clearfix">
        {!! link_to('admin/tags/create', 'Tambah Tag', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}
        </div>
    </div>

@endsection
