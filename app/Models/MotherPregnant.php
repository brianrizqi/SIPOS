<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nik
 * @property string $name
 * @property string $husband
 * @property string $age
 * @property string $address
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property DetailPregnant[] $detailPregnants
 */
class MotherPregnant extends Model
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
    protected $fillable = ['user_id', 'nik', 'name', 'husband', 'age', 'address', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\DetailPregnant', 'mother_id');
    }
}
