<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Card;
use App\Models\Template;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Auth::user()->role_id==2 ? Employee::all() : Employee::where('company_id', Auth::user()->user_linked_id)->get();
        
        if(Auth::user()->role_id==2) {
            $data['cards'] = DB::table('cards')
                            ->select(DB::raw('companies.slug as company_slug, companies.*, cards.*, employees.*'))
                            ->join('employees', 'employees.id', '=', 'cards.employee_id')
                            ->join('companies', 'companies.id', '=', 'employees.company_id')
                            ->get();
        } elseif (Auth::user()->role_id==1) {
            $data['cards'] = DB::table('cards')
                            ->select(DB::raw('companies.slug as company_slug, companies.*, cards.*, employees.*'))
                            ->join('employees', 'employees.id', '=', 'cards.employee_id')
                            ->join('companies', 'companies.id', '=', 'employees.company_id')
                            ->where('company_id', Auth::user()->id)
                            ->get();
        } 

        // $data['cards'] = DB::table('cards')
        //                     ->select(DB::raw('companies.slug as company_slug, companies.*, cards.*, employees.*'))
        //                     ->join('employees', 'employees.id', '=', 'cards.employee_id')
        //                     ->join('companies', 'companies.id', '=', 'employees.company_id')
        //                     ->get();
        $data['templates'] = Template::all();
        return view('card.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $data = $request->except(['_token']);
        $employee = Employee::find($data['employee_id']);
        $data['slug'] = $this->generateRandomString($employee->first_name.$employee->last_name);
        if(Card::create($data)) {
            return redirect()->back()->with('success', 'Card generated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardRequest  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }

    function generateRandomString($title, $length = 30, $hasNumber = true, $hasLowercase = true, $hasUppercase = true): string
    {
        $string = '';
        if ($hasNumber)
            $string .= '0123456789';
        if ($hasLowercase)
            $string .= 'abcdefghijklmnopqrstuvwxyz';
        if ($hasUppercase)
            $string .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string .=$title;
        // return $string;
        return substr(str_shuffle(str_repeat($x = $string, ceil($length / strlen($x)))), 1, $length);
    }

    public function getBCard($company_name, $id)
    {
        $data['card'] = DB::table('cards')
                            ->select(DB::raw('companies.slug as company_slug, templates.color as card_color, companies.*, cards.*, employees.*'))
                            ->join('employees', 'employees.id', '=', 'cards.employee_id')
                            ->join('companies', 'companies.id', '=', 'employees.company_id')
                            ->join('templates', 'cards.template_id', '=', 'templates.id')
                            ->where('cards.slug', $id)
                            ->get();
                            // dd($data);
        return view('employee.card_design', $data);
    }
}