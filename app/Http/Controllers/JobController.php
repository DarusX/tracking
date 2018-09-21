<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index')->with([
            'statuses' => Status::whereHas('jobs')->whereNotIn('status', ['Entregado', 'Finalidazo'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create')->with([
            'clients' => User::clients()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::create($request->all());
        Session::flash('msg', 'Job saved');
        return redirect()->route('jobs.show', $job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show')->with([
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs.edit')->with([
            'job' => $job,
            'statuses' => Status::all(),
            'workers' => User::workers()->when(Auth::user()->role->role == 'Worker', function($query){
                return $query->whereId(Auth::id());
            })->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'repairer_id' => 'required'
        ]);
        DB::transaction(function() use($request, $job){
            if ($job->status_id != $request->status_id) $job->logs()->create(['status_id' => $request->status_id]);
            $job->update($request->all());
        });
        Session::flash('msg', 'Job updated');
        return redirect()->route('jobs.show', $job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        Session::flash('msg', 'Job deleted');
    }

    public function search($code)
    {
        return view('jobs.show')->with([
            'job' => Job::whereCode($code)->first()
        ]);
    }
}
