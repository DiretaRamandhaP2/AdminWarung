<?php

namespace App\Services\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\Array_;

class ValidationService
{
   public function validate(Array $data,Array $rules){
    $validator = Validator::make($data, $rules);

    if ($validator->fails()) {
        throw new ValidationException($validator);
    }

    return $validator->validated();
   }
}
