@extends('components.layouts.app')
@section('content')
    <div class="flex-1 p-8 w-full max-w-7xl mx-auto py-16">
        <div class="flex items-center justify-between mb-6 mt-24">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">
                    Order History
                </h1>
                <p class="text-slate-500 text-sm">
                    Manage your rental orders
                </p>
            </div>
        </div>

        @php
            $filters = [
                'all' => 'All',
                'PENDING' => 'Pending',
                'PAID' => 'Paid',
                'EXPIRED' => 'Expired',
                'REFUNDED' => 'Refunded',
            ];

            $activeStatus = request('status', 'all');
        @endphp

        <div class="flex flex-col gap-3 mb-4 md:flex-row md:items-center md:justify-between">
            <!-- Search -->
            <form method="GET" action="{{ url()->current() }}" class="relative w-full md:w-64">
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode booking..."
                    class="w-full rounded-full border border-slate-200 pl-10 pr-4 py-2 text-sm text-slate-700
               focus:border-lime-500 focus:ring-lime-500">

                <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-lime-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>

            <!-- Filters -->
            <div class="flex gap-2 overflow-x-auto scrollbar-hide pb-1">
                @foreach ($filters as $value => $label)
                    <a href="{{ $value === 'all'
                        ? route('orders.index', request()->only('search'))
                        : route('orders.index', ['status' => $value] + request()->only('search')) }}"
                        class="whitespace-nowrap px-4 py-2 rounded-full text-xs font-medium transition
                {{ $activeStatus === $value
                    ? 'bg-lime-600 text-white'
                    : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-x-auto">
            <table class="w-full min-w-[700px]">
                <thead class="bg-slate-50 text-slate-600 text-sm">
                    <tr>
                        <th class="px-6 py-4 text-left">Invoice</th>
                        <th class="px-6 py-4 text-left">Customer</th>
                        <th class="px-6 py-4 text-left">Vehicle</th>
                        <th class="px-6 py-4 text-left">Rental</th>
                        <th class="px-6 py-4 text-left">Payment</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @foreach ($orders as $order)
                        @php
                            $paymentStatus = optional($order->payment)->status ?? 'pending';

                            $paymentClass = [
                                'PAID' => 'bg-lime-100 text-lime-700',
                                'SETTLED' => 'bg-lime-100 text-lime-700',
                                'PENDING' => 'bg-yellow-100 text-yellow-700',
                                'EXPIRED' => 'bg-red-100 text-red-700',
                            ];

                            $rentalClass = [
                                'booked' => 'bg-slate-100 text-slate-700',
                                'ongoing' => 'bg-blue-100 text-blue-700',
                                'completed' => 'bg-lime-100 text-lime-700',
                                'cancelled' => 'bg-red-100 text-red-700',
                            ];
                        @endphp

                        <tr class="hover:bg-slate-50 text-sm">
                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $order->booking_code }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800">
                                    {{ $order->user->name }}
                                </div>
                                <div class="text-xs text-slate-500">
                                    {{ $order->user->email }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-700">
                                {{ $order->vehicle->vehicleModel->name }}
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium
                        {{ $rentalClass[$order->rental_status] }}">
                                    {{ ucfirst($order->rental_status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium
                        {{ $paymentClass[$paymentStatus] }}">
                                    {{ ucfirst($paymentStatus) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('orders.show', $order->booking_code) }}"
                                    class="inline-flex items-center justify-center text-slate-500 hover:text-slate-700 h-8 w-8 rounded-md hover:bg-slate-300 transition-colors duration-150 ease-in-out">
                                    <i data-feather="eye" class="h-5 w-5"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $orders->links() }}
        </div>

    </div>
@endsection
