<?php

namespace App\QueryFilter;

class Title extends Filters{
	protected function applyFilter($builder)
	{
		return $builder->where('title', 'like', '%'. request()->input('title'). '%');
	}
}