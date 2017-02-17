<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 2/15/17
 * Time: 2:34 PM
 */

namespace ShawnSandy\Deploykit;

use Illuminate\Database\Eloquent\Model;

class ServerDeploys extends Model
{

    public $fillable = [
        'connection', 'responses'
    ];

}
