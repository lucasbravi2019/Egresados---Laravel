<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SolicitudService;
use App\Models\User;
use App\Events\UserSolicitudEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\Career;


class RegisteredUserController extends Controller
{

    private $solicitudService;

    public function __construct(
        SolicitudService $solicitudService,
    ) {
        $this->solicitudService = $solicitudService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $careers = Career::all();
        return view('auth.register', ['careers' => $careers]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'career' => ['required'],
            'phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'admin' => false,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);


        $user->registration_number = Str::padLeft($user->id, 5, '0');
        $user->save();


        event(new Registered($user));

        $this->solicitudService->saveSolicitud($user, $request->input('career'));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
