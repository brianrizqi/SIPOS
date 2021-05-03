<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $detail_id
 * @property boolean $trimester
 * @property string $answer
 * @property int $score
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property DetailPregnant $detailPregnant
 */
class RiskPregnant extends Model
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
    protected $fillable = ['detail_id', 'trimester', 'answer', 'score', 'status', 'created_at', 'updated_at'];
    protected $casts = [
        'answer' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detail()
    {
        return $this->belongsTo('App\Models\DetailPregnant', 'detail_id');
    }
}
