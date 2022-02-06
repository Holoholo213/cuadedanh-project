<?php 
namespace App\QueryFilter;

use Closure;
use Illuminate\Support\Str;

abstract class Filters{
	public function handle($request, Closure $next){
		if(!request()->has($this->filterName())){
			return $next($request);
		}
		$builder = $next($request);

		return $this->applyFilter($builder);
	}

	protected abstract function applyFilter($builder);

	protected function filterName(){
		return Str::snake(class_basename($this));
	}
}