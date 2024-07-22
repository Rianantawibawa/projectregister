<?php 

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginGuruFilter implements FilterInterface
{
    // Rute yang dilindungi yang memerlukan login
    protected $protectedRoutes = [
        'daftarguru', // tambahkan rute daftarguru di sini
        'protected/route1',
        'protected/route2',
        // tambahkan rute lainnya di sini
    ];

    // Rute yang dikecualikan dari pengecekan login
    protected $reservedRoutes = [
        'login',
        'register',
        // tambahkan rute Myth\Auth lainnya di sini
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        // Pastikan ini bukan rute Myth\Auth.
        foreach ($this->reservedRoutes as $reservedRoute) {
            if (url_is(route_to($reservedRoute))) {
                return;
            }
        }

        // Periksa apakah rute yang diakses adalah salah satu dari rute yang dilindungi.
        $currentRoute = $request->uri->getPath();
        foreach ($this->protectedRoutes as $protectedRoute) {
            if (url_is($protectedRoute)) {
                // Jika pengguna belum login, arahkan mereka ke halaman login.
                if (! service('authentication')->check()) {
                    session()->set('redirect_url', current_url());

                    return redirect()->to(route_to('login')); // Pastikan 'login' adalah nama rute untuk halaman login
                }
                break;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah yang diperlukan.
    }
}
// https://www.blackbox.ai/share/6d6914a1-a7ad-4389-8bcc-e8ae1e5e8c54
?>