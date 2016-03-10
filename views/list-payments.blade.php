@extends('app')

@section('page-header')

    <h2>Bonus Management</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Bonus Management</span></li>
            <li><span>List Payments</span></li>

        </ol>

        <div class="sidebar-right-toggle"></div>
    </div>
@endsection

@section('content')
    @if(empty($payments_approvals))
        <div class="row">
            <div class="alert alert-success">
                <p class="center">
                    Bonus Payment Processing Completed.
                    @if(count($data))
                        <a href="/bonus-management/excel/{{ $report }}/{{ $filter }}" class="btn btn-default">Get
                            Excel</a>
                    @endif
                </p>
            </div>
        </div>
    @endif
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">List Payments</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="{{isset($table_class) ? $table_class : 'table table-bordered table-striped table-condensed mb-none'}}">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Amount of Bonus</th>
                        <th>Amount of Orders</th>
                        <th>Amount of Introductions</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $itm)
                        <tr>
                            <td>@link($itm->user)</td>
                            <td>{{ $itm->bonus_payout_cash }}</td>
                            <td>{{ $itm->orders_count }}</td>
                            <td>{{ $itm->introductions_count }}</td>
                            <td>
                                <a href="/bonus-management/set-payments-approvals?status=approve&id={{ $itm->id }}&user_type={{ $user_type }}"
                                   class="set-list-payments {{ ($itm->approved_state === 'approve')? 'text-bold':'' }}">approve</a>
                                /
                                <a href="/bonus-management/set-payments-approvals?status=reject&id={{ $itm->id }}&user_type={{ $user_type }}"
                                   class="set-list-payments {{ ($itm->approved_state === 'reject')? 'text-bold':'' }}">reject</a>
                                /
                                <a href="/bonus-management/set-payments-approvals?status=not-reviewed&id={{ $itm->id }}&user_type={{ $user_type }}"
                                   class="set-list-payments {{ ($itm->approved_state === 'not-reviewed' || empty($itm->approved_state))? 'text-bold':'' }}">not
                                    reviewed</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div>
        <form action="/bonus-management/set-approvals-all" method="post">
            <button class="btn btn-success approve-all-bonuses" type="submit">Approve All</button>
            <input type="hidden" name="monthly_report_id" value="{{ $report }}">
            <input type="hidden" name="type" value="{{ $user_type }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

    </div>
@endsection