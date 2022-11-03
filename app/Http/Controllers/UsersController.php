<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Student;
use App\Model\Teacher;
use App\Model\Course;
use App\Model\Certificate;
use App\Model\Schedule;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth')->except(['login']);
        $this->middleware('admin')->only(['index', 'create', 'delete']);
        $this->middleware('guest')->only(['login']);
    }

    public function index() {

        $data = User::notdeleted()->get();

        return view('admin.users.index', compact('data'));
    }

    public function login() {
        //ovde vrsimo validaciju samo ako je rikvest post tj ako je korisnik uneo podatke i stisnuo submit
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            //ako je validacija prosla uspesno
            //poskusaj da ulogujes korisnika
            if (Auth::attempt([
                        'email' => request('email'),
                        'password' => request('password'),
                        'active' => 1,
                        'deleted' => 0
                    ])) {

                return redirect()->intended(route('users-welcome')); //
                //uspesno ulogovan korisnik, uz pomoc intended() metode redirektovati ga na zahtevanu stranu tj na stranu 
                //kojoj je zeleo pristupiti pre logovanja, ako nema ove metode navede u redirektu onda ga redirektuje na neku 
                //difotnu stranu na koju mi odredimo, ako nema prava pristupa salji ga da se uloguje
            } else {
                //losi podaci

                return back()->withErrors([//back() metoda sluzi da nas vrati na predhodni url i GET zahtev je u pitanju
                                    //zato moramo da prosledimo podatke sa forme ukoliko dodje do greske jer na taj nacin vracamo podatke getom 
                                    //koji su dosli sa posta, na neki nacin simuliramo post zahtev
                                    'email' => 'Email or password does not match records!!!'
                                ])
                                ->withInput([
                                    //ova metoda nam sluzi da prenosimo vrednosti nazad na formu ako dodje do greske
                                    'email' => request('email'),
                                        //'password'=>request('password')
                ]);
            }
        }
        //ovo je vju za get zahtev, tj kad korisnik dodje na stranicu  login
        return view('admin.users.login');
    }

    public function welcome() {
        $users = User::notdeleted()->get();
        $students = Student::notdeleted()->get();
        $teachers = Teacher::notdeleted()->get();
        $courses= Course::notdeleted()->get();
        $certificates= Certificate::all();
        $schedules= Schedule::select('schedules.*')
                        ->orderBy('id', 'asc')
                        ->get();
        
        return view('admin.users.welcome', compact('users', 'students', 'teachers','courses','certificates','schedules'));
    }

    public function create() {
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required|string|in:administrator,moderator',
            ]);
            $newRow = new User();
            $newRow->name = request('name');
            $newRow->address = request('address');
            $newRow->phone = request('phone');
            $newRow->role = request('role');
            $newRow->active = 1;
            $newRow->email = request('email');
            $newRow->password = bcrypt(request('password'));

            $newRow->save();

            //session()->flash('message','Korisnik uspesno kreiran!!!');jedan od nacina
            session()->flash('message', [
                'type' => 'success',
                'message' => "Korisnik $newRow->name uspesno kreiran!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti

            return redirect(route('users'));
        }
        return view('admin.users.create');
    }

    public function edit(User $user) {
        if (auth()->user()->role != 'administrator' && auth()->user()->id != $user->id) {
            abort(401, "Unauthorized action");
        }
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:191',
                'phone' => 'required|string|max:191',
                'role' => 'required|string|in:administrator,moderator',
            ]);

            $user->name = request('name');
            $user->address = request('address');
            $user->phone = request('phone');

            //$user->active = 1;
            //$user->email = request('email');
            if (auth()->user()->role != 'administrator' && auth()->user()->role != request('role')) {
                abort(401, "Unauthorized action");
            } else {
                $user->role = request('role');
            }
            $user->save();
            session()->flash('message', [
                'type' => 'success',
                'message' => "Korisnik $user->name uspesno izmenjen!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
            if (auth()->user()->role == 'administrator') {
                return redirect(route('users'));
            } else {
                return redirect(route('users-welcome'));
            }
        }
        return view('admin.users.edit', compact('user'));
    }

    public function changePassword(User $user) {
        if (auth()->user()->role != 'administrator' && auth()->user()->id != $user->id) {
            abort(401, "Unauthorized action");
        }
        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'password' => 'required|string|min:5|confirmed',
                'password_confirmation' => 'required',
            ]);
            //$user->active = 1;
            $user->password = bcrypt(request('password'));

            $user->save();
            session()->flash('message', [
                'type' => 'success',
                'message' => "Korisnik $user->name uspesno izmenjen!!!"
            ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
            if (auth()->user()->role == 'administrator') {
                return redirect(route('users'));
            } else {
                return redirect(route('users-welcome'));
            }
        }
        return view('admin.users.change-password', compact('user'));
    }

    public function delete(User $user) {
        $user->deleted = 1;
        $user->deleted_by = auth()->user()->id;
        $user->save();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Korisnik $user->name uspesno uklonjen !!!"
        ]); //drugi nacin gde mozemo u jednoj sesiji kreirati vise vrednosti
        return redirect(route('users'));
    }

    public function logout() {
        Auth::logout();
        session()->flash('message', [
            'type' => 'success',
            'message' => "Hvala, doviđenja!"
        ]);
        return redirect(route('users-login'));
    }

}
