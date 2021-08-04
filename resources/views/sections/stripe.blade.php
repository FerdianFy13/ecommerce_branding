<div id="stripe-form">
    <form role="form" action="{{ route('payment.stripe-process') }}" method="post" class="require-validation"
        data-cc-on-file="false"
        data-stripe-publishable-key="{{ env('STRIPE_PUBLISHABLE') }}"
        id="payment-form">
        @csrf

        <div class='form-row row'>
            <div class='col-md-6 col-md-12 form-group  required'>
                <label class='control-label'>Card Number</label> <input
                    autocomplete='off' class='form-control card-number' size='20'
                    type='text'>
            </div>
        </div>
        

        <div class='form-row row'>
            <div class='col-xs-12 col-md-4 form-group cvc required'>
                <label class='control-label'>CVC</label> <input autocomplete='off'
                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                    type='text'>
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Month</label> <input
                    class='form-control card-expiry-month' placeholder='MM' size='2'
                    type='text'>
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Year</label> <input
                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                    type='text'>
            </div>
        </div>

        <div class='form-row row'>
            <div class='col-md-12 error form-group d-none'>
                <div class='alert-danger alert'></div>
            </div>
        </div>

        <div class="form-row row">
            <div class="col-md-12 form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block stripe-submit">Pay with Stripe</button>
            </div>
        </div> 
    </form>
</div>