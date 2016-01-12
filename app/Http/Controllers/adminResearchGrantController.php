<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Http\Controller\Response;
use Response;
use Auth;
use DB;
use Input;
class adminResearchGrantController extends Controller
{
     public function commentsandstatus($v)
        {
            $arr=\App\Proposal::join('proposal_versions','proposals.id','=','proposal_versions.proposal_id')->whereNull('deleted_at')->where('proposals.id','=',$v)->get();
            
            return view('backend.researchgrant.verify',compact('arr','v'));
        }

        
        public function allgrants()
        {
            //$obj=new \App\Proposal;
            //$arr=$obj->all();


        $arr=\App\Proposal::join('members','proposals.userid','=','members.id')->join('proposal_versions','proposals.id','=', 'proposal_versions.proposal_id')->whereNull('proposal_versions.deleted_at')->orderby('proposals.id','DESC')->get();


            return view('backend.researchgrant.allproposals_admin',compact('arr'));
        }

       
        public function viewfile($id)
        {
            $filename = $id;
            $path = storage_path().'/uploads/grant_proposals/'.$filename;
            $response=Response::make(file_get_contents($path), 200, [
                                'Content-Type' => 'application/pdf',
                                'Content-Disposition' => 'inline; '.$filename,
                ]);
            return $response;
        }


        public function makechanges($id)
        {
              $var=INPUT::all();


                $obj=new \App\proposal_comment;
                $obj1=new \App\proposal_version;




                $mod=\App\Proposal::join('proposal_versions','proposals.id','=','proposal_versions.proposal_id')
                ->where('proposals.id','=',$id)->orderby('proposal_versions.id','DESC')
                ->select('proposal_versions.id')
                ->first();

                $obj->comments=$var['comments'];
                $obj->type=1;
                $obj->proposal_version_id=$mod->id;
                $obj->save();


                
                $obj1=$obj1::find($mod->id);
                $obj1->research_status=$var['status'];
                $obj1->save();
                

                    /*return $mod->id;
                    if($var['status'])
                    {
                        if($var['status']==0)
                         { 
                           $obj1->research_status=0;
                            //$obj1->save();
                        }
                        if($var['status']==1)
                         { 
                           $obj1->research_status=1;
                           // $obj1->save();
                        }
                      /*  if($var['status']==2)
                         { 
                           $obj1->research_status=2;
                            $obj1->save();
                        }*/
                        /*if($var['status']==3)
                         { 
                           $obj1->research_status=3;
                            $obj1->save();
                        }*/
                      //  $obj1->save();
                    
                                    return $this->allgrants();
                //return $var['status'];
    
        }
}
