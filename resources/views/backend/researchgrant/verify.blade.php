@extends('backend.master')
@section('title', 'Research Grant')
@section('main')
	<section id="main">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-12">
   					<div>
					  	<h1 class="section-header-style">Verify Version</h1>
					</div>

					@if ( $errors->any() )
   						
   						<ul class="list-unstyle">
   						<li>
   						@foreach ($errors->all() as $error)
   							<li>{{ $error }}</li>
   						@endforeach
   						</ul>
   					@endif
   					<div class="page-header">
					  <div class="col-md-8">
					  	<h1 id="stepText"> <small id="stepSubText"></small></h1>
					  </div>
					</div>
					@foreach($arr as $a)
   					{!! Form::open([ 'route' => ['makechanges', 'id'=>$a->proposal_id], 'files' => true]) !!}
					  <div class="steps">
																	
						<div class="form-group">
							<label for="title">Title: </label>
							{!! Form::label('title',$a->title) !!}
						</div>	
						<div class="form-group">
							<label for="description">Description: </label>
							{!! Form::label('description',$a->description) !!}
						</div>	



						<div class="form-group">
							<label for="file_link">File: </label>
							
							<a href="{{action('adminResearchGrantController@viewfile',[$a->version_path])}}">Click To View</a>
						

							</div>				
						<div class="form-group">
							<label for="comments">Comments: </label>
							{!! Form::textarea('comments',null,['class' => 'form-control', 'limit'=>100]) !!}
						</div>


						<div class="form-group">
							<label for="status">Change Status: </label>
							{!! Form::select('status', ['new/pending ','changes required ',' accept ', 'reject']) !!}
						</div>	

						<div class="form-group">
							<button class="btn btn-default" name="submit" id="submit">Done</button>					
						</div>
						<!--<div class="form-group">
							<label for="grant_needed" class="req">Grant needed*</label>
							{!! Form::text('grantNeeded', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
						</div>					  	
						<div class="form-group">
							<label for="field_name" class="req">Field of Research*</label>
							{!! Form::text('fieldName', null, ['class' => 'form-control', 'placeholder' => 'Field']) !!}
						</div>	
						<div class="form-group">
							<label for="grant_needed" class="req">Proposal's Description*</label>
							{!! Form::textarea('propDescription', null, ['class' => 'form-control', 'limit'=>100]) !!}
						</div>					
						<div class="form-group">
							<label for="title" class="req">Title</label>
							{!! Form::text('title_g', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
						</div>
						
					
					<div class="form-group">
						<label for="grant_file" class="req">Grant Proposal File*</label>
						<input type="file" name="grantProposal" id="grantFile">
						<p class="help-block">Please upload your Proposal.(file type allowed is pdf)</p>
					</div>
							<div class="btn-group btn-group-justified">
		<button class="col-md-offset-4 btn btn-default previous">Previous</button>
		<button class="btn btn-default" name="submit" id="submit">Submit</button>
	</div>					
	-->	
					  </div> 
					 



					{!! Form::Close() !!}
					@endforeach
   				</div>
   			</div>
   		</div>

   	</section>
@endsection
