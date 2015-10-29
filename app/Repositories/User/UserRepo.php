<?php
namespace App\Repositories\Base\BaseRepo;

/**
 *
 */
class UserRepo extends BaseRepo
{
    public function getModel()
  {
    return new User();
  }
}
