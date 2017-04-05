<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSubmit extends Model
{
    const IN_REVIEW = 0; //审核
    const PASS = 1; //通过
    const NOT_PASS = -1; //未通过

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Administrator::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
