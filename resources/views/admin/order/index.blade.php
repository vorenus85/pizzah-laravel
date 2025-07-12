@extends('layouts.admin')

@section('title')
    <div class="container">
        <h1 class="mb-5">@lang('admin.pages.orders.title')</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-5">
            <a href="{{ route('admin.order.create') }}" class="btn btn-info">@lang('admin.pages.orders.btn.new')</a>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>@lang('admin.table.date')</th>
                    <th>@lang('admin.table.customer')</th>
                    <th class="text-end">@lang('admin.table.total')</th>
                    <th>@lang('admin.table.payment_status')</th>
                    <th>@lang('admin.table.delivery_status')</th>
                    <th class="text-end">@lang('admin.table.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index+1 }}.</td>

                        <td>{{ $order->created_at->format('Y-m-d h:m:s') }}</td>

                        <td>
                            <div class="fw-bold">{{ $order->customer_name }}</div>
                            <small class="text-muted">{{ $order->customer_email }}</small>
                        </td>

                        <td class="text-end">
                            {{ number_format($order->total, 0, ',', ' ') }} Ft
                        </td>

                        <td>
                        <span @class([
                            'bg-secondary badge'            => $order->payment_status === 'pending',
                            'bg-success badge'              => $order->payment_status === 'paid',
                            'bg-danger badge'               => in_array($order->payment_status, ['failed', 'cancelled']),
                            'bg-warning text-dark badge'    => $order->payment_status === 'expired',
                            'bg-info badge'                 => Str::startsWith($order->payment_status, 'refunded'),
                        ])>
                            {{ __('admin.payment.' . $order->payment_status) }}
                        </span>
                        </td>

                        <td>
                        <span @class([
                            'bg-secondary badge'         => $order->delivery_status === 'pending',
                            'bg-warning text-dark badge' => $order->delivery_status === 'processing',
                            'bg-primary badge'           => $order->delivery_status === 'shipped',
                            'bg-success badge'           => $order->delivery_status === 'delivered',
                            'bg-danger badge'            => $order->delivery_status === 'cancelled',
                        ])>
                            {{ __('admin.delivery.' . $order->delivery_status) }}
                        </span>
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.order.edit', $order) }}"
                               class="btn btn-sm btn-outline-primary">
                                @lang('admin.btn.more')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
