<?php

namespace App\Http\Middleware;

use App\Models\CustomerAccount;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Only act if the user is a customer
        if ($user && $user->hasRole('customer')) {
            $accountId = CustomerAccount::where('email', $user->email)->value('id');

            if (!$accountId) {
                abort(404, 'Customer account not found.');
            }

            // If the current route isn't already the customer's page, redirect
            if (
                $request->route()->getName() !== 'customer-account.show'
                || $request->route()->parameter('customer_account')->id != $accountId
            ) {
                return redirect()->route('customer-account.show', $accountId);
            }
        }

        return $next($request);
    }
}
