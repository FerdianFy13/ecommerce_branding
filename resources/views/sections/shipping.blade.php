<div id="shipping-form" class="d-none">
    <h4 class="mb-3">Shipping Information</h4>
    
    <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="shipping_address" id="ship_address" value="{{$shipping_address}}" placeholder="1234 Main St">
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label class="form-control-label" for="country">Shipping country</label>
          <select name="shipping_country" id="shipping_country">
            @foreach ($countries as $country)
              <option value="{{$country}}" {{$shipping_country==$country?'selected':''}}>{{$country}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
          <label for="shipping_city">City</label>
          <input type="text" class="form-control" name="shipping_city" id="ship_city" value="{{$shipping_city}}" placeholder="">
        </div>
        <div class="col-md-4 mb-3">
          <label for="shipping_state">State</label>
          <input type="text" class="form-control" name="shipping_state" id="ship_state" value="{{$shipping_state}}" placeholder="">
        </div>
        <div class="col-md-4 mb-3">
          <label for="shipping_zip">Zip</label>
          <input type="number" class="form-control" name="shipping_zip" id="ship_zip" value="{{$shipping_zip}}" placeholder="">
        </div>
    </div>
</div>        
        