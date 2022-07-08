<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *  definition="Notebook",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="full_name",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="company",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="phone",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="email",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="date_of_birth",
 *      type="date"
 *  ),
 *  @SWG\Property(
 *      property="photo-path",
 *      type="string"
 *  )
 * )
 */
class Notebook extends Model
{
    protected $fillable = ['full_name', 'company', 'phone', 'email', 'date_of_birth', 'photo_path'];

    use HasFactory;
}
