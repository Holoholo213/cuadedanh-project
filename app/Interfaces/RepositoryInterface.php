<?php

namespace App\Interfaces;

interface RepositoryInterface{
	public function getAll();
	public function getById($tagId);
	public function create(array $tagDetail);
	public function destroy($tagId);
	public function update($tagId, array $tagDetail);
}