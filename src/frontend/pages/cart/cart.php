<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Shopping Cart</h1>
    <a href="/?page=store" class="btn btn-outline btn-sm">+ Add More Games</a>
</div>

<div class="grid-2" style="align-items:start;grid-template-columns:1fr 360px">

    <!-- DAFTAR ITEM -->
    <div style="display:flex;flex-direction:column;gap:8px">

        <div class="card" style="padding:20px">
            <div class="flex-between">
                <div class="flex-gap" style="gap:16px">
                    <div style="width:80px;height:60px;background:var(--bg-secondary);flex-shrink:0;display:flex;align-items:center;justify-content:center;color:var(--text-secondary);font-size:11px">
                        No Image
                    </div>
                    <div>
                        <p class="text-white" style="font-weight:600;margin-bottom:4px">Cyber Odyssey 2077</p>
                        <p class="text-secondary text-sm">Action / RPG</p>
                        <div class="flex-gap mt-8">
                            <span class="tag tag-green">-40%</span>
                            <span class="price-tag">Rp 299.000</span>
                            <span class="price-original">Rp 499.000</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm">Remove</button>
            </div>
        </div>

        <div class="card" style="padding:20px">
            <div class="flex-between">
                <div class="flex-gap" style="gap:16px">
                    <div style="width:80px;height:60px;background:var(--bg-secondary);flex-shrink:0;display:flex;align-items:center;justify-content:center;color:var(--text-secondary);font-size:11px">
                        No Image
                    </div>
                    <div>
                        <p class="text-white" style="font-weight:600;margin-bottom:4px">Iron Fortress</p>
                        <p class="text-secondary text-sm">Strategy</p>
                        <div class="flex-gap mt-8">
                            <span class="price-tag">Rp 149.000</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm">Remove</button>
            </div>
        </div>

        <div class="card" style="padding:20px">
            <div class="flex-between">
                <div class="flex-gap" style="gap:16px">
                    <div style="width:80px;height:60px;background:var(--bg-secondary);flex-shrink:0;display:flex;align-items:center;justify-content:center;color:var(--text-secondary);font-size:11px">
                        No Image
                    </div>
                    <div>
                        <p class="text-white" style="font-weight:600;margin-bottom:4px">Velocity Rush</p>
                        <p class="text-secondary text-sm">Racing / Sports</p>
                        <div class="flex-gap mt-8">
                            <span class="tag tag-green">-25%</span>
                            <span class="price-tag">Rp 112.000</span>
                            <span class="price-original">Rp 149.000</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm">Remove</button>
            </div>
        </div>

    </div>

    <!-- ORDER SUMMARY -->
    <div class="card" style="padding:24px">
        <h2 class="section-title">Order Summary</h2>

        <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:16px">
            <div class="flex-between">
                <span class="text-secondary text-sm">Cyber Odyssey 2077</span>
                <span class="text-white text-sm">Rp 299.000</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Iron Fortress</span>
                <span class="text-white text-sm">Rp 149.000</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Velocity Rush</span>
                <span class="text-white text-sm">Rp 112.000</span>
            </div>
        </div>

        <hr class="divider">

        <div class="flex-between mb-8">
            <span class="text-secondary text-sm">Subtotal</span>
            <span class="text-white text-sm">Rp 560.000</span>
        </div>
        <div class="flex-between mb-16">
            <span class="text-secondary text-sm">Diskon</span>
            <span class="text-success text-sm">- Rp 76.000</span>
        </div>

        <hr class="divider">

        <div class="flex-between mb-24">
            <span class="text-white" style="font-weight:700">Total</span>
            <span class="text-white" style="font-weight:800;font-size:18px">Rp 484.000</span>
        </div>

        <!-- Kode Promo -->
        <div class="form-group">
            <label class="form-label">Kode Promo</label>
            <div style="display:flex;gap:8px">
                <input type="text" class="form-input" placeholder="Masukkan kode...">
                <button class="btn btn-outline">Apply</button>
            </div>
        </div>

        <button class="btn btn-green btn-lg btn-block">Checkout</button>
        <a href="/?page=store" class="btn btn-outline btn-block mt-8">Lanjut Belanja</a>
    </div>

</div>
