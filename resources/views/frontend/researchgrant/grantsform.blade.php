@extends('frontend.master')
@section('title', 'Research Grant')
@section('main')
	<section id="main">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-12">
   					<div>
					  	<h1 class="section-header-style">research grant form</h1>
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
					  <div class="col-md-4">
					  	<p class="pull-right" style="    font-size: 14px;    margin: 35px 15px; color: RED;font-weight: bold;letter-spacing: 1px;">field with * are required</p>
					  </div>
					</div>
   					{!! Form::open(['url'=>'grantsform','files' => true]) !!}
					  <div class="steps">
																	
						<div class="form-group">
							<label for="team_members" class="req">Number of Team Members*</label>
							{!! Form::text('teamMembers', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
						</div>						
						<div class="form-group">
							<label for="research_place" class="req">Place of Research</label>
							{!! Form::text('researchPlace', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
						</div>
						<div class="form-group">
							<label for="duration_period" class="req">Duration of Research*</label>
							{!! Form::text('duration', null, ['class' => 'form-control', 'id' => 'grantDuration','placeholder'=>'dd/mm/yy']) !!}
							<p class="help-block">Tentative Date</p>						
						</div>
						<div class="form-group">
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
					  </div> 
					 



					{!! Form::Close() !!}
   				</div>
   			</div>
   		</div>

   	</section>
@endsection


