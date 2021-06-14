<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $number
 * @property string $factor
 * @property float $score
 * @property string $group_factor
 * @property RiskDetail[] $riskDetails
 */
class Kspr extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kspr';
    public $timestamps = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['number', 'factor', 'score', 'group_factor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riskDetails()
    {
        return $this->hasMany('App\Models\RiskDetail');
    }
}
