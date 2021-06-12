<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $mother_id
 * @property int $pregnancy_to
 * @property float $lila
 * @property float $bb
 * @property string $gestational_age
 * @property int $trimester
 * @property string $blood_booster_pills
 * @property string $immunization
 * @property string $created_at
 * @property string $updated_at
 * @property MotherPregnant $motherPregnant
 */
class ServicePregnant extends Model
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
    protected $fillable = ['user_id', 'mother_id', 'pregnancy_to', 'lila', 'bb', 'gestational_age', 'trimester', 'blood_booster_pills', 'immunization', 'visit_at','created_at', 'updated_at'];
    protected $dates = ['created_at','visit_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mother()
    {
        return $this->belongsTo('App\Models\MotherPregnant', 'mother_id');
    }
}
