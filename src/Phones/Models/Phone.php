<?php

namespace Myrtle\Core\Phones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;
    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'deleted_at';

    protected $dates = [Model::CREATED_AT, Model::UPDATED_AT, self::DELETED_AT];

    protected $touches = ['phoneable'];

    public function phoneable()
    {
        return $this->morphTo();
    }
	protected $fillable = ['calling_code_id', 'area_code', 'subscriber_number', 'type_id'];

	public function type()
	{
		return $this->belongsTo(PhoneType::class);
	}

	public function callingCode()
	{
		return $this->belongsTo(CallingCode::class);
	}

	public function scopeByTypeId($query, $id)
	{
		if ( ! is_array($id))
		{
			$id = [$id];
		}

		return $query->whereIn('type_id', $id);
	}

	public function getNumberAttribute()
	{
		$number = $this->area_code . $this->subscriber_number;

		if ($this->callingCode)
		{
			$number = $this->callingCode->number . $number;
		}

		if ($this->extension)
		{
			$number .= 'x' . $this->extension;
		}

		return $number;
	}
}
