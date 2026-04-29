<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // log_message('debug', '🛑 ENTERED CheckPermission filter');

        $user = session('user');
        $role = $user['role'] ?? null;

        // log_message('debug', '👤 Role from session: ' . var_export($role, true));
        // log_message('debug', '🔐 Raw $arguments: ' . var_export($arguments, true));

        if ($role === null) {
            // log_message('error', '🚪 No role in session, redirecting to login');
            return redirect()->to('/login')->with('error', 'Session habis, silakan login lagi');
        }

        // Normalize the role list
        if (!is_array($arguments)) {
            $arguments = explode(',', $arguments ?? '');
        }

        // log_message('debug', '🔓 Allowed roles: ' . implode(', ', $arguments));

        // Compare as strings to avoid int vs string mismatch
        if (!in_array((string) $role, array_map('strval', $arguments), true)) {
            // log_message('error', "🚫 Access denied for role: $role");
            return redirect()->to('/error_403');
        }

        // log_message('debug', "✅ Access granted for role: $role");
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after
    }
}
