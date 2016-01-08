<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateResearchGrantRequest;

use Auth;
use Flash;
use DB;
use Input;
use App\Proposal;
use App\proposal_version;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function grantsform()
    {
        return view('frontend.researchgrant.grantsform');
    }

    public function grantsform_thankyou(CreateResearchGrantRequest $request)
    {
            $this->stroreProposals();
           // dd('s');
            return "done";
    }
    private function stroreProposals()
    {            $obj=DB::transaction(function($connection) {

                $var=INPUT::all();
                $user = Auth::user()->user();

                $filename = $user['id'].'.';
                $filename.=$var['grantProposal']->getClientOriginalExtension();

                $var['grantProposal']->move(storage_path('uploads/grant_proposals'), $filename);

                $mod=new Proposal;
                $mod1=new Proposal;

                $mod::create(['field'=>$var['fieldName'],
                                  'title'=>$var['title_g'],
                                  'team_members'=>$var['teamMembers'],
                                  'research_place'=>$var['researchPlace'],
                                  'end_date_of_proposal'=>$var['duration'],
                            
                                  'proposed_amount'=>$var['grantNeeded'],
                                  'description'=>$var['propDescription'],
                                  'userid'=>$user['id']]);

                $obj=new proposal_version;
                $mod1=$mod::get()->last();
                $obj::create(['version_number'=>'1',
                                           'version_path'=>$filename,
                                           'proposal_id'=>$mod1['id']]);

    
            });

          
    }

    
}
