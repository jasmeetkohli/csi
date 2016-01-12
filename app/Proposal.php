<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['field', 
                            'title', 
                            'team_members', 
                            'research_place', 
                            'end_date_of_proposal', 
                            'proposed_amount', 
                            'description', 
                            'userid',
                            'num_of_versions'
                            ];

   // protected $hidden = ['date_of_approval', 'granted_amount'];

    public function proposalVersion()
     {
        return $this->hasMany('App\ProposalVersion','proposal_id','id');
     }

     public function allottedAdmin()
	 {
		return $this->belongsTo('App\ProposalAllottedAdmin','id','proposal_id');
	 }

	 

}
