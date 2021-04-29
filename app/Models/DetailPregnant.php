<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $mother_id
 * @property int $pregnancy_to
 * @property boolean $status
 * @property string $hpht
 * @property string $created_at
 * @property string $updated_at
 * @property MotherPregnant $motherPregnant
 */
class DetailPregnant extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['mother_id', 'pregnancy_to', 'status', 'hpht', 'created_at', 'updated_at'];
    protected $dates = ['hpht'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pregnant()
    {
        return $this->belongsTo('App\Models\MotherPregnant', 'mother_id');
    }
}
