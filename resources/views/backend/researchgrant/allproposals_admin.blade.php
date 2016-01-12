@extends('backend.master')
@section('title', 'Research Grant')
@section('main')
	<section id="main">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-12">
   					<div>
					  	<h1 class="section-header-style">Research Proposals</h1>
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
					<br>
					
   					{!! Form::open(['files' => true,'method' => 'get', 'class' => 'form-inline']) !!}
					  <div class="steps">
																	
						<div class="form-group">
							<label for="title">Title: {{$a->title}}</label>
							
						</div>	
						<br>
						<div class="form-group">
							<label for="current_status">Current Status:  </label>
							@if($a->research_status==0)
           										 new/pending
           									           									
           									@elseif($a->research_status==1)
            								     changes required
            								
        									
        									@elseif($a->research_status==2)
            									 accepted
            								           								
            								@elseif($a->research_status==3)
            									 rejected;
            								@endif

							

						</div>
						<br>					
						<div class="form-group">
							<label for="member_ID">Member ID: </label> 
							{!! Form::label('memberID',$a->userid) !!}
						</div>
						<br>
						<div class="form-group">
							<label for="member_name">Member Name:  </label>
							{!! Form::label('memberName', $a->email) !!}						
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
		<button class="col-md-offset-4 btn btn-default previous">Previous</button>-->
				<br><br><a href="{{action('adminResearchGrantController@commentsandstatus',[$a->proposal_id])}}">update</a>
						
		
					  </div> 
					 


					  <hr>
					{!! Form::Close() !!}
					@endforeach
   				</div>
   			</div>
   		</div>

   	</section>
@endsection
