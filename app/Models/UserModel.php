<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel as MythModel;

/**
 * @method User|null first()
 */
class UserModel extends MythModel
{
}
