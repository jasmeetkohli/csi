<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposal_version extends Model
{
protected $fillable = ['version_number','version_path','proposal_id'];

    public function proposal()
	{
		return $this->belongsTo('App\Proposal','id','proposal_id');
	}

	public function versionComments()
	{
		return $this->hasMany('App\ProposalComment','id','proposal_version_id');

	}


}
