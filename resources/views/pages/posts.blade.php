@extends('layouts.app')
@section('content')
<div class="container-fluid app-body settings-page">
	<div class="card">
		<div class="card-header">
			<h2>Recent posts sent to buffer</h2>
		</div>
		<div class="filter-options">
			<div class="row">
				<form action="filtered_posts" method="post">
					{{ csrf_field() }}
					{{ method_field('GET') }}
					<div class="form-group">
						<div class="col-md-3">
							<input class="form-control" type="text" name="txtGroupName" placeholder="Search">
						</div>
						<div class="col-md-3">
							<input class="form-control" type="text" name="txtDate" value="{{ $today }}">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="cmbPostGroup">
								<option value="0">All Group</option>
								@foreach($groups as $group)
									<option value="{{ $group->group_id }}">{{ $group->group_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
			  <thead>
			    <tr class="table-active">
			      <th scope="col">Group Name</th>
			      <th scope="col">Group Type</th>
			      <th scope="col">Account Name</th>
			      <th scope="col">Post Text</th>
			      <th scope="col">Time</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($posts as $post)
			    <tr>
			      <th>{{ $post->group_name }}</th>
			      <th>{{ $post->group_type }}</th>
			      <td style="text-align: center;"><img style="width: 80px; border-radius: 50%;" src="{{ $post->social_avatar }}"></td>
			      <td>{{ $post->post_text }}</td>
			      <td>{{ $post->sent_at }}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection