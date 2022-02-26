<?php 

namespace App\Repositories;

use App\Models\SubContent;

class SubContentRepository{
	public function create($data){
		return SubContent::create($data);
	}

	public function update($id, $data){
		return SubContent::whereId($id)->update($data);
	}
}