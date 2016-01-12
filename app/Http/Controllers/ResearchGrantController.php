<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use Input;
use DB;
use \App\Proposal;
use \App\proposal_version;
use Flash;
use App\Http\Requests\CreateResearchGrantRequest;



class ResearchGrantController extends Controller
{
    public function allgrants()
    {
    	$users = Auth::user()->user();

        $arr=\App\Proposal::join('proposal_versions','proposals.id','=', 'proposal_versions.proposal_id')
        ->where('proposals.userid','=',$users->id)
        ->whereNull('deleted_at')->orderby('proposals.id','DESC')->get();
 
        return view('frontend.researchgrant.allresearchgrants',compact('users','arr'));
    } 

    public function grantversions($prop_id)
    {
    		$a=new \App\Proposal;
    		//$arr=$a->where('id','=',$prop_id)->get();
      $users = Auth::user()->user();


          $arr=\App\Proposal::join('proposal_versions','proposals.id','=', 'proposal_versions.proposal_id')
                              ->join('proposal_comments','proposal_versions.id','=','proposal_comments.proposal_version_id')
        ->where('proposals.userid','=',$users->id) 
          ->whereNull('proposal_versions.deleted_at')->orderby('proposals.id','DESC')->get();

    		return view('frontend.researchgrant.grantversions',compact('arr'));
    }
    
    public function newversion($prop_id)
    {

    			// $obj=DB::transaction(function($connection) {
    			$var=INPUT::all();
                $user = Auth::user()->user();

               

                /*$mod=new Proposal;
               
               	$mod=$mod::find($prop_id);
               					$mod->field=$var['fieldName'];
                                  $mod->title>$var['title_g'];
                                  $mod->team_members=$var['teamMembers'];
                                  $mod->research_place=$var['researchPlace'];
                                  $mod->end_date_of_proposal=$var['duration'];
                                  
                                  $mod->proposed_amount=$var['grantNeeded'];
                                  $mod->description=$var['propDescription'];
                                  $mod->userid=$user['id'];

                                  $mod->save();*/


    		$ver=\App\proposal_version::where('proposal_id','=',$prop_id)->first();
    		$ver_num=$ver->version_number;
    		$ver_num+=1;
        $a=\App\Proposal::find($prop_id);
				 $filename = $user['id'].'_'.$a->title.'_'.$ver_num.'.';
                $filename.=$var['grantProposal']->getClientOriginalExtension();
                $var['grantProposal']->move(storage_path('uploads/grant_proposals'), $filename);

    		$obj=new \App\proposal_version;
              
                $obj::create(['version_number'=>$ver_num,
                                           'version_path'=>$filename,
                                           'proposal_id'=>$prop_id]);

    		$ver->destroy($ver->id);

    		//	 });

    		return $this->allgrants();
    }


    public function grantsform()
    {
    	return view('frontend.researchgrant.grantsform');
    }

    public function grantsform_thankyou(CreateResearchGrantRequest $request)
    {
    	$this->StoreProposal();

    	return $this->allgrants();
    }

    private function StoreProposal()
    {
    	 $obj=DB::transaction(function($connection) {

                $var=INPUT::all();
                $user = Auth::user()->user();
                $mod=new Proposal;
                $mod1=new Proposal;

                $filename = $user['id'].'_'.$var['title_g'].'.';
                $filename.=$var['grantProposal']->getClientOriginalExtension();

                $var['grantProposal']->move(storage_path('uploads/grant_proposals'), $filename);

                

                $mod::create(['field'=>$var['fieldName'],
                                  'title'=>$var['title_g'],
                                  'team_members'=>$var['teamMembers'],
                                  'research_place'=>$var['researchPlace'],
                                  'end_date_of_proposal'=>$var['duration'],
                                  
                                  'proposed_amount'=>$var['grantNeeded'],
                                  'description'=>$var['propDescription'],
                                  'userid'=>$user['id']]);

                $obj=new \App\proposal_version;
                $mod1=$mod::get()->last();
                $obj::create(['version_number'=>'1',
                                           'version_path'=>$filename,
                                           'proposal_id'=>$mod1['id']]);

    
            });

          
    }
}
