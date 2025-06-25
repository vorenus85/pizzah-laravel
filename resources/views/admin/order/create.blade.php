
@extends('layouts.admin')
@section('title')
    <h1 class="h4 mb-3">Új rendelés rögzítése</h1>
@endsection

@section('content')
    <div class="card mt-5">
        <form method="POST" action="{{ route('admin.order.store') }}" class="card card-body p-4">
            @csrf

            <div class="row g-3">
                <div class="col-lg-6">
                    <h6 class="border-bottom pb-2 mb-3">Vásárló adatai</h6>

                    <div class="mb-2">
                        <label class="form-label">Név</label>
                        <input  type="text" name="customer_name" required
                                class="form-control @error('customer_name') is-invalid @enderror"
                                value="{{ old('customer_name') }}">
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label">E-mail</label>
                            <input  type="email" name="customer_email" required
                                    class="form-control @error('customer_email') is-invalid @enderror"
                                    value="{{ old('customer_email') }}">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Telefon</label>
                            <input  type="text" name="customer_phone" required
                                    class="form-control @error('customer_phone') is-invalid @enderror"
                                    value="{{ old('customer_phone') }}">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Szállítási cím</label>
                        <input  type="text" name="customer_address" required
                                class="form-control @error('customer_address') is-invalid @enderror"
                                value="{{ old('customer_address') }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Megjegyzés</label>
                        <textarea name="customer_note" rows="2"
                                  class="form-control @error('customer_note') is-invalid @enderror">{{ old('customer_note') }}</textarea>
                    </div>

                    <h6 class="border-bottom pb-2 mb-3 mt-lg-4">Állapotok</h6>

                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <label class="form-label">Fizetési státusz</label>
                            <select name="payment_status" class="form-select" required>
                                @foreach (['pending','paid','failed','expired','refunded','partially_refunded','cancelled'] as $ps)
                                    <option value="{{ $ps }}" @selected(old('payment_status',$ps)==$ps)>
                                        {{ Str::title(str_replace('_',' ',$ps)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <label class="form-label">Szállítási státusz</label>
                            <select name="delivery_status" class="form-select" required>
                                @foreach (['pending','processing','shipped','delivered','cancelled'] as $ds)
                                    <option value="{{ $ds }}" @selected(old('delivery_status',$ds)==$ds)>
                                        {{ Str::title($ds) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <label class="form-label">Fizetési mód</label>
                            <select name="payment_type" class="form-select" required>
                                @foreach (['cod'] as $pt)
                                    <option value="{{ $pt }}" @selected(old('payment_type',$pt)==$pt)>
                                        {{ strtoupper($pt) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <label class="form-label">Szállítás típusa</label>
                            <select name="delivery_type" class="form-select" required>
                                @foreach (['home_delivery'] as $dt)
                                    <option value="{{ $dt }}" @selected(old('delivery_type',$dt)==$dt)>
                                        Home delivery
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- JOBB OLDAL –  pénzügyi adatok --}}
                <div class="col-lg-6">
                    <h6 class="border-bottom pb-2 mb-3">Termékek hozzáadása</h6>

                    <div class="row">
                        <div class="col-sm-8 mb-2">
                            <label class="form-label" for="search-product">Keress rá a termékekre</label>
                            <select id="search-product" class="form-select">
                                <option value="">Válassz</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-4 mb-2 d-flex justify-end align-items-end"><button type="button" id="add_to_order" class="btn btn-success">Hozzáad</button></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-sm align-middle mb-0" id="order-items">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width:72px;">Kép</th>
                                        <th>Termék</th>
                                        <th>Ára</th>
                                        <th class="text-center" style="width:150px;">Mennyiség</th>
                                        <th>Részösszeg</th>
                                        <th class="text-end" style="width:60px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- JS tölti fel --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="table-responsive">
                                <table class="table table-sm align-middle mb-0" id="order-items">
                                    <tr><td><strong>Szállítási díj:</strong> </td><td><span id="delivery-cost">1490</span><span>Ft</span></td></tr>
                                    <tr><td><strong>Fizetési díj:</strong> </td><td><span id="payment-cost">0</span><span>Ft</span></td></tr>
                                    <tr><th>Végösszeg</th><th><span id="order-grand-total">0</span><span>Ft</span></th></tr>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Rendelés mentése</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>

        @php
            $productsForJs = $products->map(fn($p) => [
                'id'    => $p->id,
                'name'  => $p->name,
                'price' => $p->price,
                'image' => $p->image,
            ]);
        @endphp

        document.addEventListener('DOMContentLoaded', () => {
            const products = @json($productsForJs);

            const makeRow = prod => `
        <tr data-product-id="${prod.id}">
            <td>
                <img src="${prod.image_url || '/images/placeholder.jpg'}"
                     alt="${prod.name}" class="img-thumbnail" style="width:60px;">
            </td>
            <td>
                ${prod.name}
                <input type="hidden"
                       name="products[${prod.id}][product_id]"
                       value="${prod.id}">
            </td>
            <td>
                ${prod.price} <span>Ft</span>
                <input type="hidden"
                       class="js-row-price"
                       value="${prod.price}">
            </td>
            <td class="text-center">
                <div class="input-group input-group-sm justify-content-center">
                    <button class="btn btn-outline-secondary btn-minus" type="button">−</button>
                    <input  type="text" readonly
                            class="form-control text-center quantity-field"
                            name="products[${prod.id}][quantity]"
                            value="1" style="max-width:55px;">
                    <button class="btn btn-outline-secondary btn-plus"  type="button">+</button>
                </div>
            </td>
            <td>
                <span class="js-row-total">${prod.price}</span> <span>Ft</span>
            </td>
            <td class="text-end">
                <button class="btn btn-sm btn-danger btn-remove" type="button">&times;</button>
            </td>
        </tr>
    `;

            function recalcGrandTotal() {
                let total = 0;
                const deliveryCost = document.getElementById("delivery-cost").textContent;
                const paymentCost = document.getElementById("payment-cost").textContent;

                document.querySelectorAll('#order-items .js-row-total').forEach(span => {
                    const value = parseFloat(span.textContent.trim()) || 0;
                    total += value;
                });

                // két tizedesre kerekítve írjuk ki (vagy hagyd fix nélkül, ha egész Ft-tal dolgozol)
                document.getElementById('order-grand-total').textContent = total + parseInt(deliveryCost, 10) + parseInt(paymentCost, 10);
            }

            document.getElementById('add_to_order').addEventListener('click', () => {

                const select   = document.getElementById('search-product');
                const prodId   = select.value;
                if (!prodId) return;

                const tbody    = document.querySelector('#order-items tbody');

                const existing = tbody.querySelector(`tr[data-product-id="${prodId}"]`);
                if (existing) {
                    const qtyInput = existing.querySelector('.quantity-field');
                    qtyInput.value = parseInt(qtyInput.value) + 1;
                    return;
                }

                const prodObj = products.find(p => p.id == prodId);
                if (prodObj) tbody.insertAdjacentHTML('beforeend', makeRow(prodObj));

                recalcGrandTotal();
            });

            document.querySelector('#order-items tbody').addEventListener('click', e => {
                const row = e.target.closest('tr');
                if (!row) return;
                const rowTotal = row.querySelector('.js-row-total');
                const rowPrice = row.querySelector('.js-row-price');

                if (e.target.classList.contains('btn-plus')) {
                    const qty = row.querySelector('.quantity-field');
                    qty.value = parseInt(qty.value) + 1;
                    rowTotal.innerHTML = qty.value * rowPrice.value;
                    recalcGrandTotal();
                }

                if (e.target.classList.contains('btn-minus')) {
                    const qty = row.querySelector('.quantity-field');
                    const current = parseInt(qty.value);
                    if (current > 1) qty.value = current - 1;
                    rowTotal.innerHTML = qty.value * rowPrice.value;
                    recalcGrandTotal();
                }

                if (e.target.classList.contains('btn-remove')) {
                    row.remove();
                    recalcGrandTotal();
                }
            });
        });
    </script>
@endsection
