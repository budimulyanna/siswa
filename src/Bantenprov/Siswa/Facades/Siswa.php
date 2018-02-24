<?php namespace Bantenprov\Siswa\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Siswa facade.
 *
 * @package Bantenprov\Siswa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Siswa extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'siswa';
    }
}
