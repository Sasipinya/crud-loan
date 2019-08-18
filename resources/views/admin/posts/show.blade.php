@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('flash_message'))
                <div class="col-md-12 alert alert-success">
                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h1>Loan Detail</h1></div>
                    <div class="card-body">

                        <a href="{{ url('/admin/posts') }}" title="Back">
                            <button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">


                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <th> Loan Amount</th>
                                    <td> {{ number_format(($post->loanAmount), 2) }} ฿</td>
                                </tr>

                                <tr>
                                    <th> Loan Term</th>
                                    <td> {{ $post->loanTerm }} Years</td>
                                </tr>
                                <tr>
                                    <th> Interest Rate</th>
                                    <td> {{ number_format(($post->interestRate), 2) }} %</td>
                                </tr>
                                <tr>
                                    <th> Create at</th>
                                    <td> {{ $post->created_at}} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h1>Repayment Schedules</h1>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>Payment No</th>
                                    <th>Date</th>
                                    <th>Payment Amount</th>
                                    <th>Principal</th>
                                    <th>Interest</th>
                                    <th>Balance</th>
                                </tr>
                                <?php
                                $count = $post->loanTerm;
                                $balance = $post->loanAmount;
                                $calpayamount = (
                                        $post->loanAmount * (($post->interestRate / 100) / 12))
                                    /
                                    (1 - ((1 + (($post->interestRate / 100) / 12)) ** (-12 * $post->loanTerm)));

                                for ($i = 0; $i < 12 * $count; $i++) {
                                $time = strtotime("$post->startdate_month.$post->startdate_year");
                                $calinterest = (($post->interestRate / 100) / 12) * $balance;
                                $calprin = $calpayamount - $calinterest;
                                $balance = $balance - $calprin;

                                ?>
                                <tr>
                                    <td> {{$i+1}} </td>
                                    <td> {{date('M Y', strtotime("+$i months", $time))}} </td>
                                    <td> {{number_format(($calpayamount), 2)}} </td>
                                    <td> {{number_format(($calprin), 2)}}</td>
                                    <td> {{number_format(($calinterest), 2)}}</td>
                                    <td> {{number_format(($balance), 2)}}</td>
                                </tr>
                                <?php }
                                ?>


                                </tbody>
                            </table>
                        </div>

                        <a href="{{ url('/admin/posts') }}" title="Back">
                            <button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
