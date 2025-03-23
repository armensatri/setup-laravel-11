<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Manageuser\User;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class LimitUserMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    $userCount = User::count();

    if ($userCount >= 4) {
      Alert::warning(
        'warning',
        'Registrasi pendaftaran masih tertutup.'
      );

      return redirect()->route('login');
    }

    return $next($request);
  }
}
