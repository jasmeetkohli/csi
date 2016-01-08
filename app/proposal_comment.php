<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposal_comment extends Model
{
    protected $fillable = ['comments'];

    public function commentVersion()
	{
		return $this->belongsTo('App\ProposalVersion','proposal_version_id','id');
	}

}
