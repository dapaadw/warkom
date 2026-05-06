<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pemesanan Berhasil - Invoice</title>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen p-6">
    <div class="max-w-2xl mx-auto mt-10">
        <!-- Success Banner -->
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-8 text-center flex flex-col items-center shadow-sm">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-green-800 mb-2">Pemesanan Berhasil!</h1>
            <p class="text-green-700">
                Terima kasih telah berbelanja di Warkom. Pesanan Anda akan segera diproses.
            </p>
        </div>

        <!-- Invoice Card -->
        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 mb-8">
            <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-100">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Invoice</h2>
                    <p class="text-sm text-gray-500 mt-1">Order ID: #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">Tanggal</p>
                    <p class="font-medium text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <!-- Items -->
            <div class="mb-6">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4">Rincian Barang</h3>
                <div class="space-y-4">
                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach($order->items as $item)
                    @php
                        $itemTotal = $item->price * $item->quantity;
                        $subtotal += $itemTotal;
                    @endphp
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800">{{ $item->product->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="font-medium text-gray-800">
                            Rp {{ number_format($itemTotal, 0, ',', '.') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary -->
            @php
                $ongkir = 15000;
                $ppn = $subtotal * 0.01;
            @endphp
            <div class="border-t border-gray-100 pt-6 mt-6">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Biaya Pengiriman</span>
                    <span>Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600 mb-4">
                    <span>PPN (1%)</span>
                    <span>Rp {{ number_format($ppn, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                    <span class="font-bold text-gray-800">Total Pembayaran</span>
                    <span class="text-xl font-bold text-grey-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Address -->
            <div class="border-t border-gray-100 pt-6 mt-6">
                <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-2">Alamat Pengiriman</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $order->address }}</p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('products.index') }}" class="inline-block bg-gray-600 text-white font-medium px-8 py-3 rounded-lg shadow-sm hover:bg-blue-700 transition">
                Lanjut Belanja
            </a>
        </div>
    </div>
</body>
</html>
