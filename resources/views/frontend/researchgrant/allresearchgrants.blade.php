@extends('frontend.master')

@section('title', 'Grants')

@section('section-after-mainMenu')

@endsection

@section('main')

	
	<!-- @if (Session::has('flash_notification.message'))
	    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	        {{ Session::get('flash_notification.message') }}
	    </div>
	@endif	-->	
	<section>
		  <div class="container-fluid">
		@if(($users))
<h3>Name of the User</h3>
			<div id="filter">
				<div class="row">
					<div class="col-md-12">
					
						
						{!! Form::open(['files' => true, 'method' => 'get', 'class' => 'form-inline']) !!}
												

							<div class="form-group">
								<div class="checkbox">
									<label>verified:
									  <input type="checkbox" name="verified" value="0"> yes
									</label>
									<label>
									  <input type="checkbox" name="not-verified" value="1"> no
									</label>
								</div>
							</div>
							<div class="form-group">
							<label>version: 
								  <input type="number" class="form-control" name="rows" id="rows" value="1">
								  </label>
							</div>
							<div class="form-group">
								<select name="cat"> <!-- search-cateria, self mapped, no db interaction -->
									<option value="0">title</option>
									<option value="1">status</option>																		
								</select>
					  
								  <input type="text" class="form-control" name="search_text" id="search_text" placeholder="Enter text">
							</div>
							<button type="submit" class="btn btn-default pull-right">Search</button>
						</form>
						{!! Form::close() !!}
					</div>
				</div>

			</div>
			<h3>Listing All Research Grant Requests</h3>
			
			
	                
	                <div class="panel panel-default panel-list">
	                	<div class="panel-heading compact-pagination ">
	                		<div class="row">
	                			<div class="col-md-9">
	                				{{-- other content --}}
	                			</div>
								<div class="col-md-3">
	                					         			</div>
	                		</div>
	                	</div>
	                    <!-- /.panel-heading -->
	                    <div class="panel-body">
               				 @foreach ($arr as $a)

               				 	
								<div class="listing-items">
		                        	<div class="row">
										<div class="col-md-8">
													<h10>Title:</h10> {{$a['title']}}
											
											<p>
												<span>
													
													Field: {{$a['field']}}
													
											</p>

											<p>version: {{$a->version_number}}
					                    </div>
										<div class="col-md-1">
											<h6>Status: 

											@if($a->research_status==0)
           										 new/pending
           									           									
           									@elseif($a->research_status==1)
            								     changes required
            								
        									
        									@elseif($a->research_status==2)
            									 accepted
            								           								
            								@elseif($a->research_status==3)
            									 rejected;
            								@endif

												<br>
												<span class="glyphicon glyphicon-remove"></span>
											</h6>
										</div>

										<div class="col-md-1">
											<h6>Rs. Grant money /-
											 
																		{{$a->granted_amount}}
																	
											</h6>
										</div>
										<div class="col-md-1">
										<!-- Version number in array-->
										<h6><a href="{{ action('ResearchGrantController@grantversions',array($a->proposal_id)) }}">Update</a>
											</h6>
										</div>
					                    
					                 </div>
		                        </div>
					                    <hr>
					                    
							@endforeach
                   
               			 </div>
	                    <!-- panel-footer -->
	                    <div class="panel-footer compact-pagination">
	                    	<div class="row">
	                			<div class="col-md-9">
	                				{{-- other content --}}
	                			</div>
								<div class="col-md-3">
	                					</div>
	                		</div>
	                    </div>
	                </div>
	                <!-- /.panel -->
	            </div>
	</section>

	        
	    @else
	    	<p>No records</p>
	    @endif          
@endsection


