<?php

namespace App\Models\Traits;

/**
 * Implementation of users privileges.
 */
trait UserPrivileges
{
    /**
     * Users privileges
     *
     * @var array<string, int>
     */
    static $RIGHT_TYPES = [
        "admin" => 255,
        "manager" => 64,
        "user" => 0, /** default */
    ];



    /**
     * Functions to check user's privileges.
     * 
     * @example 
     *  if($user->isAdmin()){
     *      // do something
     *  }
     */
    public function isAdmin(): bool
    {
        return $this->access == self::$RIGHT_TYPES["admin"];
    }

    public function isManager(): bool
    {
        return $this->access == self::$RIGHT_TYPES["manager"]
            || $this->access == self::$RIGHT_TYPES["admin"];
    }

    /**
     * Setting access to content.
     * 
     * @param string | number $rights - число от 0-255, если строка, то смотрит по своему массиву
     */
    public function setAccess($rights): void
    {
        if (is_numeric($rights)) {
            $this->access = $rights;
        } else {
            $this->access = self::$RIGHT_TYPES[$rights];
        }

        $this->saveQuietly();
    }
}
