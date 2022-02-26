<?php
namespace App\Services;

use App\Models\ErrorMessage;

class ErrorMessageService {
	public function makeError($data){
		return ErrorMessage::create([
			"message" => $data->getMessage(),
			"file_name" => $data->getFile(),
			"line" => $data->getLine(),
			"fixed" => "0"
		]);
	}
}

