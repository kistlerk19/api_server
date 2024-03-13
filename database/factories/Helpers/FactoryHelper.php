<?php

namespace Database\Factories\Helpers;

class FactoryHelper
{
    public static function getRandomModelID(string $model)
    {
        /**
         * 1. Get model count and generate random number bwtween 1 & the model count
         *    if the model count is 0: create a new record and retrieve the record id
         * 2. get all model records and randomly get id of one of the records
         */

         $count = $model::query()->count();

         if ($count === 0) {
            return $model::factory()->create()->id;
         } else {
            return rand(1, $count);
         }
    }
}
