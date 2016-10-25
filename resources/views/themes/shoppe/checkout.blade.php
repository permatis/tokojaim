@extends('themes/shoppe/partials/main')
@section('content')
<div class="header">
    @include('themes.shoppe.partials.navbar')
</div>

<main>
    <div class="basket">
        <div class="basket-module">
            <label for="promo-code">
                Enter a promotional code
            </label>
            <input class="promo-code-field" id="promo-code" maxlength="5" name="promo-code" type="text">
                <button class="promo-code-cta">
                    Apply
                </button>
            </input>
        </div>
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">
                    Item
                </li>
                <li class="price ">
                    Price
                </li>
                <li class="quantity ">
                    Quantity
                </li>
                <li class="subtotal ">
                    Subtotal
                </li>
            </ul>
        </div>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img alt="Placholder Image 2" class="product-frame" src="http://placehold.it/120x166">
                    </img>
                </div>
                <div class="product-details">
                    <h1>
                        <strong>
                            <span class="item-quantity">
                                4
                            </span>
                            x Eliza J
                        </strong>
                        Lace Sleeve Cuff Dress
                    </h1>
                    <p>
                        <strong>
                            Navy, Size 18
                        </strong>
                    </p>
                    <p>
                        Product Code - 232321939
                    </p>
                </div>
            </div>
            <div class="price">
                26.00
            </div>
            <div class="quantity">
                <input class="quantity-field" min="1" type="number" value="4">
                </input>
            </div>
            <div class="subtotal">
                104.00
            </div>
            <div class="remove">
                <button>
                    Remove
                </button>
            </div>
        </div>
        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img alt="Placholder Image 2" class="product-frame" src="http://placehold.it/120x166">
                    </img>
                </div>
                <div class="product-details">
                    <h1>
                        <strong>
                            <span class="item-quantity">
                                1
                            </span>
                            x Whistles
                        </strong>
                        Amella Lace Midi Dress
                    </h1>
                    <p>
                        <strong>
                            Navy, Size 10
                        </strong>
                    </p>
                    <p>
                        Product Code - 232321939
                    </p>
                </div>
            </div>
            <div class="price">
                26.00
            </div>
            <div class="quantity">
                <input class="quantity-field" min="1" type="number" value="1">
                </input>
            </div>
            <div class="subtotal">
                26.00
            </div>
            <div class="remove">
                <button>
                    Remove
                </button>
            </div>
        </div>
    </div>
    <aside>
        <div class="summary">
            <div class="summary-total-items">
                <span class="total-items">
                </span>
                Items in your Bag
            </div>
            <div class="summary-subtotal">
                <div class="subtotal-title">
                    Subtotal
                </div>
                <div class="subtotal-value final-value" id="basket-subtotal">
                    130.00
                </div>
                <div class="summary-promo hide">
                    <div class="promo-title">
                        Promotion
                    </div>
                    <div class="promo-value final-value" id="basket-promo">
                    </div>
                </div>
            </div>
            <div class="summary-delivery">
                <select class="summary-delivery-selection" name="delivery-collection">
                    <option selected="selected" value="0">
                        Select Collection or Delivery
                    </option>
                    <option value="collection">
                        Collection
                    </option>
                    <option value="first-class">
                        Royal Mail 1st Class
                    </option>
                    <option value="second-class">
                        Royal Mail 2nd Class
                    </option>
                    <option value="signed-for">
                        Royal Mail Special Delivery
                    </option>
                </select>
            </div>
            <div class="summary-total">
                <div class="total-title">
                    Total
                </div>
                <div class="total-value final-value" id="basket-total">
                    130.00
                </div>
            </div>
            <div class="summary-checkout">
                <button class="checkout-cta">
                    Go to Secure Checkout
                </button>
            </div>
        </div>
    </aside>
</main>
@endsection
