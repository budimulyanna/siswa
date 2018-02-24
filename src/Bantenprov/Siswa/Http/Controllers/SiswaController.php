<?php namespace Bantenprov\Siswa\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Siswa\Facades\Siswa;
use Bantenprov\Siswa\Models\SiswaModel;

/**
 * The SiswaController class.
 *
 * @package Bantenprov\Siswa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SiswaController extends Controller
{
    public function demo()
    {
        return Siswa::welcome();
    }
}
