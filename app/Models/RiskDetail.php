<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $kspr_id
 * @property integer $risk_id
 * @property string $created_at
 * @property string $updated_at
 * @property Kspr $kspr
 * @property RiskPregnant $riskPregnant
 */
class RiskDetail extends Model
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
    protected $fillable = ['kspr_id', 'risk_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kspr()
    {
        return $this->belongsTo('App\Models\Kspr');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function riskPregnant()
    {
        return $this->belongsTo('App\Models\RiskPregnant', 'risk_id');
    }


}
