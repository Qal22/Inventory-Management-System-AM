<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Inventory Management System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action {{ ($active === "dashboard") ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="/products" class="list-group-item list-group-item-action {{ ($active === "product") ? 'active' : '' }}">
                <i class="bi bi-bag-dash"></i> Products
            </a>
            <a href="/stock-list" class="list-group-item list-group-item-action {{ ($active === "stock") ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Stock
            </a>
            <a href="/customer-list" class="list-group-item list-group-item-action {{ ($active === "customer") ? 'active' : '' }}">
                <i class="bi bi-person-fill"></i> Customer
            </a>
        </div>
    </div>
</div>